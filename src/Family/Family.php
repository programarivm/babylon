<?php

namespace Babylon\Family;

use Babylon\Filter;
use Phpml\ModelManager;

class Family
{
    const AUSTRONESIAN   = 'austronesian';
    const GERMANIC       = 'germanic';
    const ROMANCE        = 'romance';
    const SLAVIC         = 'slavic';
    const URALIC         = 'uralic';

    protected $text;

    protected $modelFilepath;

    protected $restoredClassifier;

    protected $modelManager;

    public function __construct(string $text)
    {
        $this->text = Filter::phrase($text);
        $this->modelFilepath = __DIR__ . "/../../models/iso-8859-latin-family.txt";
        $this->modelManager = new ModelManager();

        $this->restoredClassifier = $this->modelManager->restoreFromFile($this->modelFilepath);
    }

    public function detect(): string
    {
        $langFamily = current($this->restoredClassifier->predict([$this->text]));

        return $langFamily;
    }
}
