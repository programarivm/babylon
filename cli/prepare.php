<?php

use Babylon\File\TxtStats;

require_once __DIR__ . '/../vendor/autoload.php';

const DATA_FOLDER = __DIR__ . '/../dataset';
const OUTPUT_FILE = 'output.csv';

/**
 * Returns a phrase with the most frequent words.
 *
 * @param array $freqWords
 * @return array
 */
function magicPhrase(array $freqWords): string
{
	$magicPhrase = '';
	foreach ($freqWords as $word => $freq) {
		$magicPhrase .= "$word ";
	}

	return $magicPhrase;
}

/**
 * Prepares the dataset/output.csv file with the files in the dataset/input folder.
 *
 * @param array $freqWords
 * @return array
 */
function prepare(array $files): void
{
	$csv = '';
	foreach ($files as $file) {
		$txtStats = new TxtStats(DATA_FOLDER."/input/$file");
		$freqWords = $txtStats->freqWords(100);
		$csv .= pathinfo($file, PATHINFO_FILENAME) .',' . magicPhrase($freqWords) . PHP_EOL;
        if ($handle = fopen(DATA_FOLDER.'/'.OUTPUT_FILE, 'w')) {
            if (fwrite($handle, $csv) !== false) {
                echo "OK! The most frequent words in $file were transformed into CSV format..." . PHP_EOL;
            } else {
                echo "Whoops! The most frequent words in $file could not be calculated..." . PHP_EOL;
            }
            fclose($handle);
        }
	}

	echo 'The ' . OUTPUT_FILE . ' file has been updated.' . PHP_EOL;
}

/******************************************************************************/

echo 'This will create a CSV with the most frequent words in all of the files in the dataset/input folder.' . PHP_EOL;
echo 'The operation may take a few seconds to be completed.' . PHP_EOL;
echo 'Do you want to proceed? (Y/N): ';

$handle = fopen ('php://stdin','r');
$line = fgets($handle);
if (trim($line) != 'Y' && trim($line) != 'y') {
	exit;
}
fclose($handle);

$files = array_diff(scandir(DATA_FOLDER.'/input'), ['.', '..']);

prepare($files);

exit;
