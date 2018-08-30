<?php

namespace Babylon\Cli;

use Babylon\Family\Family;

require_once __DIR__ . '/../vendor/autoload.php';

$family = (new Family($argv[1]))->detect();

echo $family . PHP_EOL;
