<?php

namespace Babylon\Cli;

use Babylon\Babylon;
use Babylon\NaiveBayesTrainer;

require_once __DIR__ . '/../vendor/autoload.php';

(new NaiveBayesTrainer(Babylon::FAMILY_AUSTRONESIAN))->train();
(new NaiveBayesTrainer(Babylon::FAMILY_GERMANIC))->train();
(new NaiveBayesTrainer(Babylon::FAMILY_ROMANCE))->train();
(new NaiveBayesTrainer(Babylon::FAMILY_SLAVIC))->train();
(new NaiveBayesTrainer(Babylon::FAMILY_URALIC))->train();
