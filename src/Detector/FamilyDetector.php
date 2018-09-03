<?php

namespace Babylon\Detector;

use Babylon\AbstractDetector;
use Babylon\Filter;

class FamilyDetector extends AbstractDetector
{
	protected $text;

	protected $dataFilepath;

	protected $stats;

	public function __construct(string $text)
	{
		$this->text = Filter::text($text);
		$this->dataFilepath = __DIR__ . "/../../dataset/output/iso-8859-latin-family.csv";
		$this->stats = [];
	}
}
