<?php

namespace Babylon;

use Babylon\Exception\LanguageFamilyException;
use Phpml\Pipeline;
use Phpml\Classification\NaiveBayes;
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Tokenization\WordTokenizer;

class NaiveBayesTrainer extends AbstractTrainer
{
    public function __construct(string $family)
    {
        switch ($family) {
            case Babylon::FAMILY_AUSTRONESIAN:
                break;
            case Babylon::FAMILY_GERMANIC:
                break;
            case Babylon::FAMILY_ROMANCE:
                break;
            case Babylon::FAMILY_SLAVIC:
                break;
            case Babylon::FAMILY_URALIC:
                break;
            default:
                throw new LanguageFamilyException('Whoops! The language family is not valid.');
                break;
        }

        parent::__construct();

        $this->trainFilepath = __DIR__ . "/../dataset/output/iso-8859/latin/$family/output.csv";

        $this->modelFilepath = __DIR__ . "/../models/iso-8859/$family/naive-bayes.txt";

        $this->pipeline = new Pipeline([
            new TokenCountVectorizer(new WordTokenizer()),
            new TfIdfTransformer(),
        ], new NaiveBayes());
    }
}
