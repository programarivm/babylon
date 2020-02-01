<?php

namespace Babylon\Detector;

use Babylon\Alphabet;

class FamilyDetector
{
	protected $text;

	protected $unicodeRangename;

	public function __construct(string $text, string $unicodeRangename)
	{
		$this->text = $text;
		$this->unicodeRangename = $unicodeRangename;
	}

	public function detect(): string
	{
		$detection = [];
		$alphabet = Alphabet::reveal($this->unicodeRangename);
		if ($alphabet) {
			if ($file = fopen(__DIR__."/../../dataset/output/$alphabet-fingerprint.csv", 'r')) {
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
