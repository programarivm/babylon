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

    protected $text;

    protected $langFamily

    protected $modelFilepath;

    protected $restoredClassifier;

    protected $modelManager;

    public function __construct(string $text)
    {
        $this->text = Filter::phrase($text);
        $this->langFamily = $this->langFamily($this->text);
        $this->modelFilepath = __DIR__ . "/../models/iso-8859/$langFamily/naive-bayes.txt";
        $this->modelManager = new ModelManager();

        $this->restoredClassifier = $this->modelManager->restoreFromFile($this->modelFilepath);
    }

    public function detect(): string
    {
        $isoCode = $this->restoredClassifier->predict([$this->text]);

        return $isoCode;
    }

    private function langFamily()
    {
        // TODO:

        return true;
    }
}
