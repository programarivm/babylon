<?php

namespace Babylon\Cli;

use Babylon\Detector\FamilyDetector;

require_once __DIR__ . '/../../vendor/autoload.php';

$family = (new FamilyDetector($argv[1]))->detect();

echo $family . PHP_EOL;
