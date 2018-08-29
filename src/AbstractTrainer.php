<?php

namespace Babylon;

use Phpml\ModelManager;

class AbstractTrainer
{
    const TRAINING_FILE = __DIR__ . '/../dataset/output.csv';

    protected $samples;

    protected $labels;

    protected $pipeline;

    protected $modelManager;

    protected $modelFilepath;

    public function __construct()
    {
        $this->samples = [];
        $this->labels = [];
        $this->modelManager = new ModelManager();
    }

    public function train(): void
    {
        $this->prepare();
        $this->pipeline->train($this->samples, $this->labels);
        $this->modelManager->saveToFile($this->pipeline, $this->modelFilepath);
    }

    private function prepare(): AbstractTrainer
    {
        $file = fopen(self::TRAINING_FILE, 'r');
        while (($line = fgetcsv($file)) !== false) {
            $this->labels[] = $line[0];
            $this->samples[] = $line[1];
        }
        fclose($file);

        return $this;
    }
}
