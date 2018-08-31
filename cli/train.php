<?php

namespace Babylon\Cli;

use Babylon\Family\Family;
use Babylon\Family\NaiveBayesTrainer as FamilyTrainer;
use Babylon\Language\NaiveBayesTrainer as LanguageTrainer;

require_once __DIR__ . '/../vendor/autoload.php';

(new LanguageTrainer(Family::AUSTRONESIAN))->train();
(new LanguageTrainer(Family::GERMANIC))->train();
(new LanguageTrainer(Family::ROMANCE))->train();
(new LanguageTrainer(Family::SLAVIC))->train();
(new LanguageTrainer(Family::URALIC))->train();

(new FamilyTrainer())->train();
