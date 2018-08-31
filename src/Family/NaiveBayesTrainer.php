<?php

namespace Babylon\Family;

use Babylon\AbstractTrainer;
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

        $this->trainFilepath = __DIR__ . "/../dataset/output/iso-8859-latin-family.csv";

        $this->modelFilepath = __DIR__ . "/../models/iso-8859-latin-family.txt";

        $this->pipeline = new Pipeline([
            new TokenCountVectorizer(new WordTokenizer()),
            new TfIdfTransformer(),
        ], new NaiveBayes());
    }
}
