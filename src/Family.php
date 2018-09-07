<?php

namespace Babylon;

use Babylon\Exception\LanguageFamilyException;

class Family
{
	const AUSTRONESIAN   = 'austronesian';
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
			case Family::IRANIAN:
				break;
			case Family::ROMANCE:
				break;
			case Family::SEMITIC:
				break;
			case Family::SLAVIC:
				break;
			case Family::TURKIC:
				break;
			case Family::URALIC:
				break;
			case Family::VASCONIC:
				break;
			default:
				throw new LanguageFamilyException('Whoops! The language family is not valid.');
				break;
		}
	}
}
