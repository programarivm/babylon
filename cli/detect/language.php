<?php

namespace Babylon\Cli;

use Babylon\LanguageDetector;

require_once __DIR__ . '/../../vendor/autoload.php';

$isoCode = (new LanguageDetector($argv[1]))->detect();

echo $isoCode . PHP_EOL;
