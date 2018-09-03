<?php

namespace Babylon\Detector;

use Babylon\AbstractDetector;
use Babylon\Filter;
use Babylon\Detector\FamilyDetector;

class LanguageDetector extends AbstractDetector
{
    protected $text;

    protected $dataFilepath;

    protected $stats;

    public function __construct(string $text)
    {
        $this->text = Filter::text($text);
        $langFamily = (new FamilyDetector($text))->detect();
        $this->dataFilepath = __DIR__ . "/../../dataset/output/iso-8859/latin/$langFamily.csv";
        $this->stats = [];
    }
}
