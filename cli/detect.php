<?php

namespace Babylon\Cli;

use Babylon\Babylon;

require_once __DIR__ . '/../vendor/autoload.php';

$babylon = new Babylon;

echo $babylon->detect($argv[1]) . PHP_EOL;
