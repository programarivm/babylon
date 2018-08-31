<?php

namespace Babylon\Language;

use Phpml\ModelManager;

class Language
{
    protected $text;

    protected $langFamily;

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

    private function langFamily(string $text): string
    {
        // TODO:

        return true;
    }
}
