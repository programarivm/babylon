<?php

use Babylon\NaiveBayesTrainer as NaiveBayesTrainer;

require_once __DIR__ . '/../vendor/autoload.php';

(new NaiveBayesTrainer)->train();
