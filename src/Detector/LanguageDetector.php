<?php

namespace Babylon\Detector;

use Babylon\AbstractDetector;
use Babylon\Filter;
use Babylon\UnicodeRangeStats;
use Babylon\Detector\FamilyDetector;
use UnicodeRanges\Range\BasicLatin;
use UnicodeRanges\Range\HangulCompatibilityJamo;
use UnicodeRanges\Range\HangulJamo;
use UnicodeRanges\Range\HangulJamoExtendedA;
use UnicodeRanges\Range\HangulJamoExtendedB;
use UnicodeRanges\Range\HangulSyllables;
use UnicodeRanges\Range\Hebrew;
use UnicodeRanges\Range\Hiragana;
use UnicodeRanges\Range\IpaExtensions;
use UnicodeRanges\Range\Kanbun;
use UnicodeRanges\Range\Katakana;
use UnicodeRanges\Range\KatakanaPhoneticExtensions;
use UnicodeRanges\Range\LatinExtendedA;
use UnicodeRanges\Range\LatinExtendedB;
use UnicodeRanges\Range\Latin1Supplement;
use UnicodeRanges\Range\CJKUnifiedIdeographs;

class LanguageDetector
{
    protected $text;

    protected $detection;

    public function __construct(string $text)
    {
        $this->text = $text;
        $this->detection = [];
    }

    public function detect(): string
    {
        if ($this->isLatin($this->text)) {
            $this->text = Filter::text($this->text);
            $langFamily = (new FamilyDetector($this->text))->detect();
            $dataFilepath = __DIR__."/../../dataset/output/alphabet/latin/$langFamily.csv";
            if ($file = fopen($dataFilepath, 'r')) {
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

            return key(array_slice($this->detection, 0, 1));
        } else {
            $unicodeRangename = (new UnicodeRangeStats($this->text))->mostFreq();
            $this->detection = $this->isoCodeByUnicodeRangename($unicodeRangename);

            return $this->detection;
        }
    }

    private function isLatin(string $text)
    {
        switch ((new UnicodeRangeStats($text))->mostFreq()) {
            case BasicLatin::RANGE_NAME:
                return true;
            case Latin1Supplement::RANGE_NAME:
                return true;
            case LatinExtendedA::RANGE_NAME:
                return true;
            case LatinExtendedB::RANGE_NAME:
                return true;
            case IpaExtensions::RANGE_NAME:
                return true;
            default:
                return false;
        }
    }

    private function isoCodeByUnicodeRangename(string $unicodeRangename) {
        switch ($unicodeRangename) {
            case Hebrew::RANGE_NAME:
                return 'heb'; // Hebrew
                break;
            case Hiragana::RANGE_NAME:
                return 'jpn'; // Japanese
                break;
            case Katakana::RANGE_NAME:
                return 'jpn'; // Japanese
                break;
            case KatakanaPhoneticExtensions::RANGE_NAME:
                return 'jpn'; // Japanese
                break;
            case Kanbun::RANGE_NAME:
                return 'jpn'; // Japanese
                break;
            case HangulCompatibilityJamo::RANGE_NAME:
                return 'kor'; // Korean
                break;
            case HangulJamo::RANGE_NAME:
                return 'kor'; // Korean
                break;
            case HangulJamoExtendedA::RANGE_NAME:
                return 'kor'; // Korean
                break;
            case HangulJamoExtendedB::RANGE_NAME:
                return 'kor'; // Korean
                break;
            case HangulSyllables::RANGE_NAME:
                return 'kor'; // Korean
                break;
            case CJKUnifiedIdeographs::RANGE_NAME:
                return 'zho'; // Chinese
                break;
        }
    }
}
