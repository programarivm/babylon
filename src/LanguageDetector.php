<?php

namespace Babylon;

class LanguageDetector extends Detector
{
    protected $text;

    protected $dataFilepath;

    protected $stats;

    public function __construct(string $text)
    {
        $this->text = Filter::text($text);
        $langFamily = (new FamilyDetector($text))->detect();
        $this->dataFilepath = __DIR__ . "/../dataset/output/iso-8859/latin/$langFamily.csv";
        $this->stats = [];
    }

    public function detect(): string
	{
		if ($file = fopen($this->dataFilepath, 'r')) {
			while (!feof($file)) {
				$line = fgetcsv($file);
				if (!empty($line[0]) && !empty($line[1])) {
					$langWords = explode(' ', $line[1]);
					$textWords = explode(' ', $this->text);
					$this->stats[$line[0]] = count(array_intersect($langWords, $textWords));
				}
			}
			fclose($file);
		}
		arsort($this->stats);

		return key(array_slice($this->stats, 0, 1));
	}
}
