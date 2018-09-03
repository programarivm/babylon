<?php

namespace Babylon;

use Babylon\Filter;

abstract class AbstractDetector
{
	protected $dataFilepath;

	protected $text;

	protected $stats;

	public function __construct(string $text)
	{
		$this->text = Filter::text($text);
		$this->stats = [];
	}

	public function detect(): string
	{
		if ($file = fopen($this->dataFilepath, 'r')) {
			while (!feof($file)) {
				$line = fgetcsv($file);
				if (!empty($line[0]) && !empty($line[1])) {
					$words = explode(' ', $line[1]);
					$textWords = explode(' ', $this->text);
					$this->stats[$line[0]] = count(array_intersect($words, $textWords));
				}
			}
			fclose($file);
		}
		arsort($this->stats);

		return key(array_slice($this->stats, 0, 1));
	}
}
