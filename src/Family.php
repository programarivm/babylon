<?php

namespace Babylon;

use Babylon\Exception\LanguageFamilyException;

class Family
{
	const AUSTRONESIAN   = 'austronesian';
	const BALTIC         = 'baltic';
	const GAELIC   		 = 'gaelic';
	const GERMANIC       = 'germanic';
	const INDO_ARYAN     = 'indo-aryan';
	const IRANIAN        = 'iranian';
	const ROMANCE        = 'romance';
	const SEMITIC        = 'semitic';
	const SLAVIC         = 'slavic';
	const TURKIC         = 'turkic';
	const URALIC         = 'uralic';
	const VASCONIC       = 'vasconic';

	protected static $valid = [
		Family::AUSTRONESIAN,
		Family::BALTIC,
		Family::GAELIC,
		Family::GERMANIC,
		Family::INDO_ARYAN,
		Family::IRANIAN,
		Family::ROMANCE,
		Family::SEMITIC,
		Family::SLAVIC,
		Family::TURKIC,
		Family::URALIC,
		Family::VASCONIC,
	];

	public static function validate(string $family): void
	{
		if (!in_array($family, self::$valid)) {
			throw new LanguageFamilyException('Whoops! The language family is not valid.');
		}
	}
}
