<?php

namespace Babylon\File;

use Babylon\Exception\FileExtensionException;
use Babylon\Filter;

/**
 * Text stats.
 *
 * @author Jordi Bassagañas <info@programarivm.com>
 * @link https://programarivm.com
 * @license MIT
 */
class TxtStats extends AbstractFile
{
	/**
     * Words in the file (lowercased).
     *
     * Example:
     *
     *      Array
     *      (
     *          [0] => a
     *          [1] => study
     *          [2] => in
     *          [3] => scarlet
     *          [4] => by
     *          [5] => a
     *          [6] => conan
     *          [7] => doyle
     *          [8] => original
     *          [9] => transcriber's
     *          [10] => note
     *          [11] => this
     *          [12] => etext
     *          ...
     *
     * @var array
     */
	protected $words;

	/**
     * Word frequency -- number of times that the words appear in the text.
     *
     * Example:
     *
     *      Array
     *      (
	 *			[the] => 2535
     *			[and] => 1355
     *			[of] => 1210
     *			[to] => 1091
     *			[a] => 993
     *			[i] => 888
     *			[he] => 792
     *			[in] => 729
     *			[that] => 652
     *			[was] => 650
     *			[his] => 648
     *			[it] => 571
     *			[had] => 476
     *			[you] => 441
     *			[with] => 336
	 *          ...
     *      )
     *
     * @var array
     */
	protected $freq;

	/**
     * Constructor.
     *
     * @param string $filepath
     */
	public function __construct(string $filepath)
	{
		parent::__construct($filepath);

		$info = pathinfo($filepath);
		if ($info["extension"] !== "txt") {
			throw new FileExtensionException(
                "Extension detected: {$info["extension"]}. Must be txt."
            );
		}

		$this->words = [];
	}

	/**
     * The n most frequent words in the text.
     *
     * @param int $n
     * @return array
     * @throws \InvalidArgumentException
     */
	public function freqWords(int $n): array
	{
		if ($n <= 0) {
			throw new \InvalidArgumentException(
				"The number of words $n must be a positive number."
			);
		}
		$this->readWords();
		$this->freq = array_count_values($this->words);
		arsort($this->freq);

		return array_slice($this->freq, 0, $n);
	}

	/**
     * Reads the words from the text storing them into $this->words.
     */
	private function readWords(): void
	{
		if ($file = fopen($this->filepath, 'r')) {
			while (!feof($file)) {
				$exploded = explode(' ', Filter::phrase(fgets($file)));
				$this->words = array_merge($this->words, $exploded);
			}
			fclose($file);
		}

		$this->words = array_map('trim', array_filter($this->words));
	}
}
