<?php

namespace Babylon\Detector;

use Babylon\Alphabet;
use UnicodeRanges\Analyzer;

class FamilyDetector
{
	protected $text;

	protected $alphabet;

	public function __construct(string $text)
	{
		$this->text = $text;
		$this->alphabet = Alphabet::reveal((new Analyzer($text))->mostFreq());
	}

	public function detect(): string
	{
		$detection = [];
		if ($this->alphabet) {
			if ($file = fopen(__DIR__."/../../dataset/output/{$this->alphabet}-fingerprint.csv", 'r')) {
				while (!feof($file)) {
					$line = fgetcsv($file);
					if (!empty($line[0]) && !empty($line[1])) {
						$words = explode(' ', $line[1]);
						$textWords = explode(' ', $this->text);
						$detection[$line[0]] = count(array_intersect($words, $textWords));
					}
				}
				fclose($file);
			}
			arsort($detection);
			return key(array_slice($detection, 0, 1));
		}

		return false;
	}
}
