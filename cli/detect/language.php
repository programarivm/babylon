<?php

namespace Babylon\Cli;

use Babylon\Language\Language;

require_once __DIR__ . '/../../vendor/autoload.php';

$isoCode = (new Language($argv[1]))->detect();

echo $isoCode . PHP_EOL;
