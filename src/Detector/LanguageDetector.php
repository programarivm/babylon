<?php

namespace Babylon\Detector;

use Babylon\Alphabet;
use Babylon\Filter;
use Babylon\Iso639;
use Babylon\Detector\FamilyDetector;
use UnicodeRanges\Analyzer;

class LanguageDetector
{
    protected $text;

    protected $alphabet;

    protected $sample;

    protected $unicodeRangename;

    public function __construct(string $text)
    {
        $this->text = Filter::text($text);
        $this->unicodeRangename = (new Analyzer($text))->mostFreq();
        $this->alphabet = Alphabet::reveal($this->unicodeRangename);
        $this->sample = $this->sample($this->text);
    }

    public function detect(): string
    {
        $detection = [];
        $family = (new FamilyDetector($this->text))->detect();
        if ($family) {
            if ($file = fopen(__DIR__."/../../dataset/output/alphabet/{$this->alphabet}/$family.csv", 'r')) {
                while (!feof($file)) {
                    $line = fgetcsv($file);
                    if (!empty($line[0]) && !empty($line[1])) {
                        $words = explode(' ', $line[1]);
                        $textWords = explode(' ', $this->text);
                        $detection[$line[0]] = count(array_intersect($words, $textWords));
                    }
                }
                fclose($file);
            }
            arsort($detection);
            $detection = key(array_slice($detection, 0, 1));
        } else {
            $detection = Iso639::code($this->unicodeRangename);
        }

        return $detection;
    }

    private function sample(string $text): string
    {
        $words = explode(' ', $this->text);
        shuffle($words);

        return implode(' ', array_slice($words, 0, 40));
    }
}
