<?php

namespace Babylon;

use Phpml\ModelManager;
use Phpml\Pipeline;
use Phpml\Classification\NaiveBayes;
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\Tokenization\WhitespaceTokenizer;

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
            new TokenCountVectorizer(new WhitespaceTokenizer()),
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
                $line = trim(preg_replace('/[0-9]+/', '', fgets($file))); // remove numbers
                $line = preg_replace('!\s+!', ' ', $line); // remove multiple blank spaces
                $exploded = explode(' ', $line);
                $lang = $exploded[0];
                $phrase = preg_replace("/^(\w+\s)/", '', $line);
                $this->samples[] = $phrase;
                $this->labels[] = $lang;
            }
            fclose($file);
        }

        return $this;
    }
}
