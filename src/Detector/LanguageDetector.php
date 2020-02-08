<?php

namespace Babylon\Detector;

use Babylon\Alphabet;
use Babylon\Babylon;
use Babylon\Filter;
use Babylon\Iso639;
use Babylon\Detector\FamilyDetector;
use UnicodeRanges\Analyzer;

class LanguageDetector
{
    protected $babylon;

    public function __construct()
    {
        $this->babylon = unserialize(file_get_contents(Babylon::OUTPUT_FOLDER."/babylon.ser"));
    }

    public function detect(string $text): string
    {
        $text = Filter::text($text);
        $unicode = (new Analyzer($this->sample($text)))->mostFreq();
        $alphabet = Alphabet::reveal($unicode);
        $family = (new FamilyDetector($this->babylon))->detect($text);

        $detection = [];
        if ($family) {
            foreach ($this->babylon->alphabet[$alphabet][$family] as $key => $val) {
                $pattern = explode(' ', $val);
                $subject = explode(' ', $text);
                $detection[$key] = count(array_intersect($pattern, $subject));
            }
            arsort($detection);
            $detection = key(array_slice($detection, 0, 1));
        } else {
            $detection = Iso639::code($unicode);
        }

        return $detection;
    }

    private function sample(string $text): string
    {
        $words = explode(' ', $text);
        shuffle($words);

        return implode(' ', array_slice($words, 0, 30));
    }
}
