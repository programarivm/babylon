<?php

use Babylon\Trainer as BabylonTrainer;

require_once __DIR__ . '/../vendor/autoload.php';

(new BabylonTrainer($argv[1]))->train();
