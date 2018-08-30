<?php

namespace Babylon;

use Phpml\ModelManager;

class Babylon
{
    const FAMILY_AUSTRONESIAN   = 'austronesian';
    const FAMILY_GERMANIC       = 'germanic';
    const FAMILY_ROMANCE        = 'romance';
    const FAMILY_SLAVIC         = 'slavic';
    const FAMILY_URALIC         = 'uralic';

    const MODEL_FILEPATH        = __DIR__ . '/../models/naive-bayes.txt';

    protected $restoredClassifier;

    protected $modelManager;

    public function __construct()
    {
        $this->modelManager = new ModelManager();

        $this->restoredClassifier = $this->modelManager->restoreFromFile(self::MODEL_FILEPATH);
    }

    public function detect(string $text): string
    {
        $text = Filter::phrase($text);
        $lang = current($this->restoredClassifier->predict([$text]));

        return $lang;
    }
}
