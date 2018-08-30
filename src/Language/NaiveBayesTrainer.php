<?php

namespace Babylon\Language;

use Babylon\AbstractTrainer;
use Babylon\Exception\LanguageFamilyException;
use Babylon\Validator;
use Phpml\Pipeline;
use Phpml\Classification\NaiveBayes;
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Tokenization\WordTokenizer;

class NaiveBayesTrainer extends AbstractTrainer
{
    public function __construct(string $langFamily)
    {
        Validator::langFamily($langFamily);

        parent::__construct();

        $this->trainFilepath = __DIR__ . "/../dataset/output/iso-8859/latin/$langFamily.csv";

        $this->modelFilepath = __DIR__ . "/../models/iso-8859/$langFamily/naive-bayes.txt";

        $this->pipeline = new Pipeline([
            new TokenCountVectorizer(new WordTokenizer()),
            new TfIdfTransformer(),
        ], new NaiveBayes());
    }
}
