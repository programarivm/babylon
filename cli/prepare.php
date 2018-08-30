<?php

namespace Babylon\Cli;

use Babylon\Babylon;
use Babylon\DataPreparer;

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

(new DataPreparer(Babylon::FAMILY_AUSTRONESIAN))->prepare();
(new DataPreparer(Babylon::FAMILY_GERMANIC))->prepare();
(new DataPreparer(Babylon::FAMILY_ROMANCE))->prepare();
(new DataPreparer(Babylon::FAMILY_SLAVIC))->prepare();
(new DataPreparer(Babylon::FAMILY_URALIC))->prepare();
