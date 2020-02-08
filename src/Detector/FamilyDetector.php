<?php

namespace Babylon\Detector;

use Babylon\Alphabet;
use Babylon\Babylon;
use UnicodeRanges\Analyzer;

class FamilyDetector
{
	protected $alphabet;

	protected $babylon;

	protected $text;

	public function __construct(string $text)
	{
		$this->alphabet = Alphabet::reveal((new Analyzer($text))->mostFreq());
		$this->babylon = unserialize(file_get_contents(Babylon::OUTPUT_FOLDER."/babylon.ser"));
		$this->text = $text;
	}

	public function getBabylon() {
		return $this->babylon;
	}

	public function detect(): string
	{
		$detection = [];
		if ($this->alphabet) {
			foreach ($this->babylon->fingerprint[$this->alphabet] as $key => $val) {
				$pattern = explode(' ', $val);
				$subject = explode(' ', $this->text);
				$detection[$key] = count(array_intersect($pattern, $subject));
			}
			arsort($detection);
			return key(array_slice($detection, 0, 1));
		}

		return false;
	}
}
