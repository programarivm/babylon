<?php

namespace Babylon;

use Phpml\ModelManager;

class AbstractTrainer
{
    protected $samples;

    protected $labels;

    protected $pipeline;

    protected $modelManager;

    protected $trainFilepath;

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
        $file = fopen($this->trainFilepath, 'r');
        while (($line = fgetcsv($file)) !== false) {
            $this->labels[] = $line[0];
            $this->samples[] = $line[1];
        }
        fclose($file);

        return $this;
    }
}
