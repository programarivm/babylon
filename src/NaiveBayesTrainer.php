<?php

namespace Babylon;

use Phpml\Pipeline;
use Phpml\Classification\NaiveBayes;
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Tokenization\WordTokenizer;

class NaiveBayesTrainer extends AbstractTrainer
{
    public function __construct()
    {
        parent::__construct();

        $this->modelFilepath = __DIR__ . '/../models/naive-bayes.txt';

        $this->pipeline = new Pipeline([
            new TokenCountVectorizer(new WordTokenizer()),
            new TfIdfTransformer(),
        ], new NaiveBayes());
    }
}
