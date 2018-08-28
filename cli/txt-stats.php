<?php

use Babylon\File\TxtStats;

require_once __DIR__ . '/../vendor/autoload.php';

$txtStats = new TxtStats($argv[1]);

print_r($txtStats->freqWords(15));
