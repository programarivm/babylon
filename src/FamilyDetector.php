<?php

namespace Babylon;

class FamilyDetector extends Detector
{
	const AUSTRONESIAN   = 'austronesian';
	const GERMANIC       = 'germanic';
	const ROMANCE        = 'romance';
	const SLAVIC         = 'slavic';
	const URALIC         = 'uralic';

	protected $text;

	protected $dataFilepath;

	protected $stats;

	public function __construct(string $text)
	{
		$this->text = Filter::phrase($text);
		$this->dataFilepath = __DIR__ . "/../dataset/output/iso-8859-latin-family.csv";
		$this->stats = [];
	}

	public function detect(): string
	{
		if ($file = fopen($this->dataFilepath, 'r')) {
			while (!feof($file)) {
				$line = fgetcsv($file);
				if (!empty($line[0]) && !empty($line[1])) {
					$familyWords = explode(' ', $line[1]);
					$textWords = explode(' ', $this->text);
					$this->stats[$line[0]] = count(array_intersect($familyWords, $textWords));
				}
			}
			fclose($file);
		}
		arsort($this->stats);

		return key(array_slice($this->stats, 0, 1));
	}
}
