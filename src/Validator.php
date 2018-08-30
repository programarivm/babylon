<?php

namespace Babylon;

class Validator
{
    public static function langFamily(string $langFamily): string
    {
        switch ($langFamily) {
            case Babylon::FAMILY_AUSTRONESIAN:
                break;
            case Babylon::FAMILY_GERMANIC:
                break;
            case Babylon::FAMILY_ROMANCE:
                break;
            case Babylon::FAMILY_SLAVIC:
                break;
            case Babylon::FAMILY_URALIC:
                break;
            default:
                throw new LanguageFamilyException('Whoops! The language family is not valid.');
                break;
        }

        return $langFamily;
    }
}
