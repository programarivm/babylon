<?php

namespace Babylon;

use Babylon\Exception\AlphabetException;
use UnicodeRanges\Range\Arabic;
use UnicodeRanges\Range\ArabicExtendedA;
use UnicodeRanges\Range\ArabicMathematicalAlphabeticSymbols;
use UnicodeRanges\Range\ArabicPresentationFormsA;
use UnicodeRanges\Range\ArabicPresentationFormsB;
use UnicodeRanges\Range\ArabicSupplement;
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
	const ARABIC     	 = 'arabic';
	const DEVANAGARI     = 'devanagari';
	const CYRILLIC       = 'cyrillic';
	const LATIN   		 = 'latin';

	protected static $valid = [
		Alphabet::ARABIC,
		Alphabet::CYRILLIC,
		Alphabet::DEVANAGARI,
		Alphabet::LATIN,
	];

	protected static $arabic = [
		Arabic::RANGE_NAME,
		ArabicExtendedA::RANGE_NAME,
		ArabicMathematicalAlphabeticSymbols::RANGE_NAME,
		ArabicPresentationFormsA::RANGE_NAME,
		ArabicPresentationFormsB::RANGE_NAME,
		ArabicSupplement::RANGE_NAME,
	];

	protected static $cyrillic = [
		Cyrillic::RANGE_NAME,
		CyrillicExtendedA::RANGE_NAME,
		CyrillicExtendedB::RANGE_NAME,
		CyrillicSupplement::RANGE_NAME,
	];

	protected static $devanagari = [
		Devanagari::RANGE_NAME,
		DevanagariExtended::RANGE_NAME,
	];

	protected static $latin = [
		BasicLatin::RANGE_NAME,
		Latin1Supplement::RANGE_NAME,
		LatinExtendedA::RANGE_NAME,
		LatinExtendedB::RANGE_NAME,
		IpaExtensions::RANGE_NAME,
	];

	public static function validate(string $alphabet): string
    {
		if (!in_array($alphabet, self::$valid)) {
			throw new AlphabetException('Whoops! The alphabet is not valid.');
		}

		return $alphabet;
    }

	protected static function isArabic(string $rangename): bool
	{
		return in_array($rangename, self::$arabic);
	}

	protected static function isCyrillic(string $rangename): bool
	{
		return in_array($rangename, self::$cyrillic);
	}

	protected static function isDevanagari(string $rangename): bool
	{
		return in_array($rangename, self::$devanagari);
	}

	protected static function isLatin(string $rangename): bool
	{
		return in_array($rangename, self::$latin);
	}

	public static function reveal(string $rangename)
	{
		if (self::isArabic($rangename)) {
			return self::ARABIC;
		} elseif (self::isCyrillic($rangename)) {
			return self::CYRILLIC;
		} elseif (self::isDevanagari($rangename)) {
			return self::DEVANAGARI;
		} elseif (self::isLatin($rangename)) {
			return self::LATIN;
		} else {
			return false;
		}
	}
}
