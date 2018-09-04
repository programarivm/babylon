<?php

namespace Babylon;

use Babylon\Exception\LanguageFamilyException;

class Family
{
	const AUSTRONESIAN   = 'austronesian';
	const GAELIC   		 = 'gaelic';
	const GERMANIC       = 'germanic';
	const INDO_ARYAN     = 'indo-aryan';
	const ROMANCE        = 'romance';
	const SLAVIC         = 'slavic';
	const TURKIC         = 'turkic';
	const URALIC         = 'uralic';

	public static function validate(string $family): void
	{
		switch ($family) {
			case Family::AUSTRONESIAN:
				break;
			case Family::GAELIC:
				break;
			case Family::GERMANIC:
				break;
			case Family::INDO_ARYAN:
				break;
			case Family::ROMANCE:
				break;
			case Family::SLAVIC:
				break;
			case Family::TURKIC:
				break;
			case Family::URALIC:
				break;
			default:
				throw new LanguageFamilyException('Whoops! The language family is not valid.');
				break;
		}
	}
}
