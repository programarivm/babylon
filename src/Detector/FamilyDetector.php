<?php

namespace Babylon\Detector;

use Babylon\Filter;
use Babylon\UnicodeRangeStats;
use UnicodeRanges\Range\Cyrillic;
use UnicodeRanges\Range\CyrillicExtendedA;
use UnicodeRanges\Range\CyrillicExtendedB;
use UnicodeRanges\Range\CyrillicSupplement;
use UnicodeRanges\Range\Devanagari;
use UnicodeRanges\Range\DevanagariExtended;

class FamilyDetector
{
	protected $text;

	protected $detection;

	public function __construct(string $text)
	{
		$this->text = $text;
		$this->detection = [];
	}

	public function detect(): string
	{
		$unicodeRangename = (new UnicodeRangeStats($this->text))->mostFreq();

		switch ($unicodeRangename) {
			case Cyrillic::RANGE_NAME:
				$this->compare(__DIR__.'/../../dataset/output/cyrillic-fingerprint.csv');
				break;
			case CyrillicExtendedA::RANGE_NAME:
				$this->compare(__DIR__.'/../../dataset/output/cyrillic-fingerprint.csv');
				break;
			case CyrillicExtendedB::RANGE_NAME:
				$this->compare(__DIR__.'/../../dataset/output/cyrillic-fingerprint.csv');
				break;
			case CyrillicSupplement::RANGE_NAME:
				$this->compare(__DIR__.'/../../dataset/output/cyrillic-fingerprint.csv');
				break;
			case Devanagari::RANGE_NAME:
				$this->compare(__DIR__.'/../../dataset/output/devanagari-fingerprint.csv');
				break;
			case DevanagariExtended::RANGE_NAME:
				$this->compare(__DIR__.'/../../dataset/output/devanagari-fingerprint.csv');
				break;
			default:
				$this->compare(__DIR__.'/../../dataset/output/latin-fingerprint.csv');
				break;

		}

		return key(array_slice($this->detection, 0, 1));
	}

	private function compare(string $dataFilepath): void
	{
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
	}
}
