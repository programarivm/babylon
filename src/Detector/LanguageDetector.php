<?php

namespace Babylon\Detector;

use Babylon\Alphabet;
use Babylon\Filter;
use Babylon\Iso639;
use Babylon\Unicode;
use Babylon\Detector\FamilyDetector;

class LanguageDetector
{
    protected $text;

    protected $sample;

    protected $unicodeRangename;

    protected $detection;

    public function __construct(string $text)
    {
        $this->text = Filter::text($text);
        $this->sample = $this->sample($this->text);
        $this->unicodeRangename = (new Unicode($this->sample))->mostFreq();
        $this->detection = [];
    }

    public function detect(): string
    {
        $family = (new FamilyDetector($this->text, $this->unicodeRangename))->detect();
        if ($family) {
            $alphabet = Alphabet::reveal($this->unicodeRangename);
            if ($file = fopen(__DIR__."/../../dataset/output/alphabet/$alphabet/$family.csv", 'r')) {
                while (!feof($file)) {
                    $line = fgetcsv($file);
                    if (!empty($line[0]) && !empty($line[1])) {
                        $words = explode(' ', $line[1]);
                        $textWords = explode(' ', $this->text);
                        $this->detection[$line[0]] = count(array_intersect($words, $textWords));
                    }
                }
                fclose($file);
            }
            arsort($this->detection);
            $this->detection = key(array_slice($this->detection, 0, 1));
        } else {
            $this->detection = Iso639::code($this->unicodeRangename);
        }

        return $this->detection;
    }

    private function sample(string $text): string
    {
        $words = explode(' ', $this->text);
        shuffle($words);

        return implode(' ', array_slice($words, 0, 40));
    }
}
