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

	public static function validate(string $alphabet): void
    {
		if (!in_array($alphabet, self::$valid)) {
			throw new AlphabetException('Whoops! The alphabet is not valid.');
		}
    }

	public static function isArabic(string $unicodeRangename): bool
	{
		return in_array($unicodeRangename, self::$arabic);
	}

	public static function isCyrillic(string $unicodeRangename): bool
	{
		return in_array($unicodeRangename, self::$cyrillic);
	}

	public static function isDevanagari(string $unicodeRangename): bool
	{
		return in_array($unicodeRangename, self::$devanagari);
	}

	public static function isLatin(string $unicodeRangename): bool
	{
		return in_array($unicodeRangename, self::$latin);
	}

	public static function reveal(string $unicodeRangename)
	{
		if (self::isArabic($unicodeRangename)) {
			return self::ARABIC;
		} elseif (self::isCyrillic($unicodeRangename)) {
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
