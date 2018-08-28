<?php

use Babylon\Trainer as BabylonTrainer;

// ini_set('memory_limit', '128M');

require_once __DIR__ . '/../vendor/autoload.php';

const DATA_FILE = __DIR__ . '/../dataset/output.csv';

(new BabylonTrainer(DATA_FILE))->train();
