<?php

namespace Babylon;

use Phpml\ModelManager;

class Babylon
{
    const MODEL_FILEPATH = __DIR__ . '/../models/kernel-linear-cost-1000.txt';

    protected $classifier;

    protected $modelManager;

    public function __construct()
    {
        $this->modelManager = new ModelManager();

        $this->classifier = $this->modelManager->restoreFromFile(self::MODEL_FILEPATH);
    }

    public function predict($text)
    {
        $classifier->predict($text);
    }
}
