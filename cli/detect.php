<?php

namespace Babylon\Cli;

use Babylon\Babylon;

require_once __DIR__ . '/../vendor/autoload.php';

$isoCode = (new Babylon($argv[1]))->detect();

echo $isoCode . PHP_EOL;
