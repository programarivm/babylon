<?php

namespace Babylon;

use Babylon\File\TxtStats;

class DataPreparer
{
    protected $langFamily;

    protected $inputFolder;

    protected $outputFolder;

    public function __construct(string $langFamily)
    {
        Validator::langFamily($langFamily);

        $this->langFamily = $langFamily;
        $this->inputFolder = __DIR__ . "/../dataset/input/iso-8859/latin/$langFamily";
        $this->outputFolder = __DIR__ . "/../dataset/output/iso-8859/latin";
    }

    /**
     * Prepares the dataset/output files with the files in the dataset/input folder.
     *
     * @param array $files
     * @return array
     */
    public function prepare(): void
    {
        $files = array_diff(scandir($this->inputFolder), ['.', '..']);
    	$csv = '';
    	foreach ($files as $file) {
    		$txtStats = new TxtStats("{$this->inputFolder}/$file");
    		$freqWords = $txtStats->freqWords(50);
    		$csv .= pathinfo($file, PATHINFO_FILENAME) .',' . $this->magicPhrase($freqWords) . PHP_EOL;
    		if ($handle = fopen("{$this->outputFolder}/{$this->langFamily}.csv", 'w')) {
    			if (fwrite($handle, $csv) !== false) {
    				echo "OK! The most frequent words in $file were transformed into CSV format..." . PHP_EOL;
    			} else {
    				echo "Whoops! The most frequent words in $file could not be calculated..." . PHP_EOL;
    			}
    			fclose($handle);
    		}
    	}

    	echo 'The '. $this->langFamily . ' language family has been updated.' . PHP_EOL;
    }

    /**
     * Returns a phrase with the most frequent words.
     *
     * @param array $freqWords
     * @return array
     */
    private function magicPhrase(array $freqWords): string
    {
        $magicPhrase = '';
        foreach ($freqWords as $word => $freq) {
            $magicPhrase .= "$word ";
        }

        return $magicPhrase;
    }
}
