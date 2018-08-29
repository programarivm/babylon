<?php

namespace Babylon;

use Phpml\Pipeline;
use Phpml\Classification\SVC;
use Phpml\SupportVectorMachine\Kernel;
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Tokenization\WordTokenizer;

class SvcTrainer extends AbstractTrainer
{
    public function __construct()
    {
        parent::__construct();

        $this->modelFilepath = __DIR__ . '/../models/svc.txt';

        $this->pipeline = new Pipeline([
            new TokenCountVectorizer(new WordTokenizer()),
            new TfIdfTransformer(),
        ], new SVC(Kernel::LINEAR, $cost = 1000));
    }
}
