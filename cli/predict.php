<?php

use Babylon\Babylon;

require_once __DIR__ . '/../vendor/autoload.php';

$babylon = new Babylon;

print_r($babylon->predict($argv[1]));
