<?php

namespace Babylon\Cli;

use Babylon\Family\Family;
use Babylon\Language\NaiveBayesTrainer;

require_once __DIR__ . '/../vendor/autoload.php';

(new NaiveBayesTrainer(Family::AUSTRONESIAN))->train();
(new NaiveBayesTrainer(Family::GERMANIC))->train();
(new NaiveBayesTrainer(Family::ROMANCE))->train();
(new NaiveBayesTrainer(Family::SLAVIC))->train();
(new NaiveBayesTrainer(Family::URALIC))->train();
