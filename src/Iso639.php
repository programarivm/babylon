<?php

namespace Babylon;

use UnicodeRanges\Range\Arabic;
use UnicodeRanges\Range\ArabicMathematicalAlphabeticSymbols;
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

class Iso639
{
	const ARABIC     	= 'ara';
	const BENGALI       = 'ben';
	const GREEK   		= 'ell';
	const HEBREW   		= 'heb';
	const JAPANESE   	= 'jpn';
	const KOREAN   	    = 'kor';
	const PUNJABI   	= 'pan';
	const TAMIL   	    = 'tam';
	const TELUGU   	    = 'tel';
	const CHINESE   	= 'zho';

	public static function code(string $unicodeRangename): string
	{
		switch ($unicodeRangename) {
			case Arabic::RANGE_NAME:
				return self::ARABIC;
			case ArabicMathematicalAlphabeticSymbols::RANGE_NAME:
				return self::ARABIC;
			case Bengali::RANGE_NAME:
				return self::BENGALI;
			case GreekAndCoptic::RANGE_NAME:
				return self::GREEK;
			case Gurmukhi::RANGE_NAME:
				return self::PUNJABI;
			case Hebrew::RANGE_NAME:
				return self::HEBREW;
			case Hiragana::RANGE_NAME:
				return self::JAPANESE;
			case Katakana::RANGE_NAME:
				return self::JAPANESE;
			case KatakanaPhoneticExtensions::RANGE_NAME:
				return self::JAPANESE;
			case Kanbun::RANGE_NAME:
				return self::JAPANESE;
			case HangulCompatibilityJamo::RANGE_NAME:
				return self::KOREAN;
			case HangulJamo::RANGE_NAME:
				return self::KOREAN;
			case HangulJamoExtendedA::RANGE_NAME:
				return self::KOREAN;
			case HangulJamoExtendedB::RANGE_NAME:
				return self::KOREAN;
			case HangulSyllables::RANGE_NAME:
				return self::KOREAN;
			case Tamil::RANGE_NAME:
				return self::TAMIL;
			case Telugu::RANGE_NAME:
				return self::TELUGU;
			case CJKUnifiedIdeographs::RANGE_NAME:
				return self::CHINESE;
		}
	}
}
