<?php

namespace Babylon;

use Phpml\ModelManager;
use Phpml\Pipeline;
use Phpml\Classification\NaiveBayes;
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Tokenization\WordTokenizer;

class Trainer
{
    const MODEL_FILEPATH = __DIR__ . '/../models/naive-bayes.txt';

    protected $filepath;

    protected $samples;

    protected $labels;

    protected $pipeline;

    protected $modelManager;

    public function __construct(string $filepath)
    {
        $this->filepath = $filepath;
        $this->samples = [];
        $this->labels = [];
        $this->modelManager = new ModelManager();
        $this->pipeline = new Pipeline([
            new TokenCountVectorizer(new WordTokenizer()),
            new TfIdfTransformer(),
        ], new NaiveBayes());
    }

    public function train(): void
    {
        $this->prepare();
        $this->pipeline->train($this->samples, $this->labels);
        $this->modelManager->saveToFile($this->pipeline, self::MODEL_FILEPATH);
    }

    private function prepare(): Trainer
    {
        if ($file = fopen($this->filepath, 'r')) {
            while (!feof($file)) {
                $exploded = explode(',', fgets($file));
                $this->samples[] = $exploded[1]; // phrase
                $this->labels[] = $exploded[0]; // lang
            }
            fclose($file);
        }

        return $this;
    }
}
