<?php

namespace Babylon\Detector;

use Babylon\Alphabet;
use Babylon\Babylon;
use UnicodeRanges\Analyzer;

class FamilyDetector
{
	protected $babylon;

	public function __construct($babylon = null)
	{
		if (!isset($babylon)) {
			$this->babylon = unserialize(file_get_contents(Babylon::STORAGE_FOLDER."/babylon.ser"));
		} else {
			$this->babylon = $babylon;
		}
	}

	public function detect(string $text): string
	{
		$alphabet = Alphabet::reveal((new Analyzer($text))->mostFreq());
		$detection = [];
		if ($alphabet) {
			foreach ($this->babylon->fingerprint[$alphabet] as $key => $val) {
				$pattern = explode(' ', $val);
				$subject = explode(' ', $text);
				$detection[$key] = count(array_intersect($pattern, $subject));
			}
			arsort($detection);
			return key(array_slice($detection, 0, 1));
		}

		return false;
	}
}
