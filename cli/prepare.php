<?php

namespace Babylon\Cli;

use Babylon\Language\DataPreparer as LanguageDataPreparer;
use Babylon\Family\DataPreparer as FamilyDataPreparer;
use Babylon\Family\Family;

require_once __DIR__ . '/../vendor/autoload.php';

echo 'This will create a CSV with the most frequent words in all of the files in the dataset/input folder.' . PHP_EOL;
echo 'The operation may take a few seconds to be completed.' . PHP_EOL;
echo 'Do you want to proceed? (Y/N): ';

$handle = fopen ('php://stdin','r');
$line = fgets($handle);
if (trim($line) != 'Y' && trim($line) != 'y') {
	exit;
}
fclose($handle);

/*echo (new LanguageDataPreparer(Family::AUSTRONESIAN))->prepare();
echo (new LanguageDataPreparer(Family::GERMANIC))->prepare();
echo (new LanguageDataPreparer(Family::ROMANCE))->prepare();
echo (new LanguageDataPreparer(Family::SLAVIC))->prepare();
echo (new LanguageDataPreparer(Family::URALIC))->prepare();*/

echo (new FamilyDataPreparer)->prepare();
