<?php

namespace Babylon;

use Babylon\Exception\AlphabetException;
use UnicodeRanges\Range\Cyrillic;
use UnicodeRanges\Range\CyrillicExtendedA;
use UnicodeRanges\Range\CyrillicExtendedB;
use UnicodeRanges\Range\CyrillicSupplement;
use UnicodeRanges\Range\Devanagari;
use UnicodeRanges\Range\DevanagariExtended;
use UnicodeRanges\Range\BasicLatin;
use UnicodeRanges\Range\Latin1Supplement;
use UnicodeRanges\Range\LatinExtendedA;
use UnicodeRanges\Range\LatinExtendedB;
use UnicodeRanges\Range\IpaExtensions;

class Alphabet
{
	const DEVANAGARI     = 'devanagari';
	const CYRILLIC       = 'cyrillic';
	const LATIN   		 = 'latin';

	public static function validate(string $alphabet): void
    {
        switch ($alphabet) {
            case Alphabet::CYRILLIC:
                break;
            case Alphabet::DEVANAGARI:
                break;
            case Alphabet::LATIN:
                break;
            default:
                throw new AlphabetException('Whoops! The alphabet is not valid.');
                break;
        }
    }

	public static function isCyrillic(string $unicodeRangename): bool
	{
		switch ($unicodeRangename) {
			case Cyrillic::RANGE_NAME:
				return true;
			case CyrillicExtendedA::RANGE_NAME:
				return true;
			case CyrillicExtendedB::RANGE_NAME:
				return true;
			case CyrillicSupplement::RANGE_NAME:
				return true;
			default:
				return false;
		}
	}

	public static function isDevanagari(string $unicodeRangename): bool
	{
		switch ($unicodeRangename) {
			case Devanagari::RANGE_NAME:
				return true;
			case DevanagariExtended::RANGE_NAME:
				return true;
			default:
				return false;
		}
	}

	public static function isLatin(string $unicodeRangename): bool
	{
		switch ($unicodeRangename) {
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

	public static function reveal(string $unicodeRangename)
	{
		if (self::isCyrillic($unicodeRangename)) {
			return self::CYRILLIC;
		} elseif (self::isDevanagari($unicodeRangename)) {
			return self::DEVANAGARI;
		} elseif (self::isLatin($unicodeRangename)) {
			return self::LATIN;
		} else {
			return false;
		}
	}
}
