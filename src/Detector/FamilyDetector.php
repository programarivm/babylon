<?php

namespace Babylon\Detector;

use Babylon\Filter;

class FamilyDetector
{
	protected $text;

	protected $detection;

	public function __construct(string $text)
	{
		$this->text = Filter::text($text);
		$this->detection = [];
	}

	public function detect(): string
	{
		$dataFilepath = __DIR__ . "/../../dataset/output/latin-family.csv";
		if ($file = fopen($dataFilepath, 'r')) {
			while (!feof($file)) {
				$line = fgetcsv($file);
				if (!empty($line[0]) && !empty($line[1])) {
					$words = explode(' ', $line[1]);
					$textWords = explode(' ', $this->text);
					$this->detection[$line[0]] = count(array_intersect($words, $textWords));
				}
			}
			fclose($file);
		}
		arsort($this->detection);

		return key(array_slice($this->detection, 0, 1));
	}
}
