<?php

namespace Babylon\Language;

use Babylon\Family\Family;
use Babylon\Filter;
use Phpml\ModelManager;

class Language
{
    protected $text;

    protected $modelFilepath;

    protected $restoredClassifier;

    protected $modelManager;

    public function __construct(string $text)
    {
        $this->text = Filter::phrase($text);
        $langFamily = $this->langFamily($this->text);
        $this->modelFilepath = __DIR__ . "/../../models/iso-8859/$langFamily.txt";
        $this->modelManager = new ModelManager();

        $this->restoredClassifier = $this->modelManager->restoreFromFile($this->modelFilepath);
    }

    public function detect(): string
    {
        $isoCode = current($this->restoredClassifier->predict([$this->text]));

        return $isoCode;
    }

    private function langFamily(string $text): string
    {
        return (new Family($text))->detect();
    }
}
