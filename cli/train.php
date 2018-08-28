<?php

use Babylon\Trainer as BabylonTrainer;

// ini_set('memory_limit', '128M');

require_once __DIR__ . '/../vendor/autoload.php';

(new BabylonTrainer($argv[1]))->train();
