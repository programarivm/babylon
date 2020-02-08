<?php

namespace Babylon\Cli;

use Babylon\Detector\LanguageDetector;

require_once __DIR__ . '/../../vendor/autoload.php';

$isoCode = (new LanguageDetector())->detect($argv[1]);

echo $isoCode . PHP_EOL;
