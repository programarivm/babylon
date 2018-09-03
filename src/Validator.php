<?php

namespace Babylon;

use Babylon\Exception\AlphabetException;
use Babylon\Exception\LanguageFamilyException;

class Validator
{
    public static function alphabet(string $alphabet): string
    {
        switch ($alphabet) {
            case Alphabet::CYRILLIC:
                break;
            case Alphabet::LATIN:
                break;
            default:
                throw new AlphabetException('Whoops! The alphabet is not valid.');
                break;
        }

        return $alphabet;
    }

    public static function langFamily(string $langFamily): string
    {
        switch ($langFamily) {
            case Family::AUSTRONESIAN:
                break;
            case Family::GAELIC:
                break;
            case Family::GERMANIC:
                break;
            case Family::ROMANCE:
                break;
            case Family::SLAVIC:
                break;
            case Family::URALIC:
                break;
            default:
                throw new LanguageFamilyException('Whoops! The language family is not valid.');
                break;
        }

        return $langFamily;
    }
}
