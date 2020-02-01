<?php

namespace Babylon;

use UnicodeRanges\Range\Bengali;
use UnicodeRanges\Range\CJKUnifiedIdeographs;
use UnicodeRanges\Range\GreekAndCoptic;
use UnicodeRanges\Range\Gurmukhi;
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
use UnicodeRanges\Range\Tamil;
use UnicodeRanges\Range\Telugu;
use UnicodeRanges\Range\Thai;

class Iso639
{
	const BENGALI       = 'ben';
	const GREEK   		= 'ell';
	const HEBREW   		= 'heb';
	const JAPANESE   	= 'jpn';
	const KOREAN   	    = 'kor';
	const PUNJABI   	= 'pan';
	const TAMIL   	    = 'tam';
	const TELUGU   	    = 'tel';
	const THAI   	    = 'tha';
	const CHINESE   	= 'zho';

	protected static $codes = [
		Bengali::RANGE_NAME => self::BENGALI,
		GreekAndCoptic::RANGE_NAME => self::GREEK,
		Gurmukhi::RANGE_NAME => self::PUNJABI,
		Hebrew::RANGE_NAME => self::HEBREW,
		Hiragana::RANGE_NAME => self::JAPANESE,
		Katakana::RANGE_NAME => self::JAPANESE,
		KatakanaPhoneticExtensions::RANGE_NAME => self::JAPANESE,
		Kanbun::RANGE_NAME => self::JAPANESE,
		HangulCompatibilityJamo::RANGE_NAME => self::KOREAN,
		HangulJamo::RANGE_NAME => self::KOREAN,
		HangulJamoExtendedA::RANGE_NAME => self::KOREAN,
		HangulJamoExtendedB::RANGE_NAME => self::KOREAN,
		HangulSyllables::RANGE_NAME => self::KOREAN,
		Tamil::RANGE_NAME => self::TAMIL,
		Telugu::RANGE_NAME => self::TELUGU,
		Thai::RANGE_NAME => self::THAI,
		CJKUnifiedIdeographs::RANGE_NAME => self::CHINESE,
	];

	public static function code(string $rangename): string
	{
		return self::$codes[$rangename];
	}
}
