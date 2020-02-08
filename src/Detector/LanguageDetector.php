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

    protected $text;

    protected $unicode;

    protected $alphabet;

    protected $family;

    public function __construct(string $text)
    {
        $this->babylon = unserialize(file_get_contents(Babylon::OUTPUT_FOLDER."/babylon.ser"));
        $this->text = Filter::text($text);
        $this->unicode = (new Analyzer($this->sample($this->text)))->mostFreq();
        $this->alphabet = Alphabet::reveal($this->unicode);
        $this->family = (new FamilyDetector($this->text))->detect();
    }

    public function detect(): string
    {
        $detection = [];
        if ($this->family) {
            foreach ($this->babylon->alphabet[$this->alphabet][$this->family] as $key => $val) {
                $pattern = explode(' ', $val);
                $subject = explode(' ', $this->text);
                $detection[$key] = count(array_intersect($pattern, $subject));
            }
            arsort($detection);
            $detection = key(array_slice($detection, 0, 1));
        } else {
            $detection = Iso639::code($this->unicode);
        }

        return $detection;
    }

    private function sample(string $text): string
    {
        $words = explode(' ', $this->text);
        shuffle($words);

        return implode(' ', array_slice($words, 0, 30));
    }
}
