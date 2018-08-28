<?php

namespace Babylon\File;

use Babylon\Exception\FileExtensionException;

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
     *          [0] => the
     *          [1] => project
     *          [2] => gutenberg
     *          [3] => ebook
     *          [4] => of
     *          [5] => a
     *          [6] => study
     *          [7] => in
     *          [8] => scarlet
     *          [9] => by
     *          [10] => arthur
     *          [11] => conan
     *          [12] => doyle
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
     *          [the] => 2741
     *          [and] => 1428
     *          [of] => 1334
     *          [to] => 1172
     *          [a] => 1062
     *          [i] => 889
     *          [in] => 804
     *          [he] => 798
     *          [that] => 667
     *          [his] => 653
     *          [was] => 651
     *          [it] => 592
     *          [you] => 510
     *          [had] => 476
     *          [with] => 391
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
				$line = mb_strtolower(fgets($file));
				$line = preg_replace('/[[:punct:]]/', '', $line);
				$line = preg_replace('/(“|”)/', '', $line);
				$line = preg_replace('/(\"|\")/', '', $line);
				$line = preg_replace('/’/', "'", $line);
				$line = preg_replace('/[0-9]+/', '', $line);
				$line = preg_replace('!\s+!', ' ', $line);
				$exploded = explode(' ', $line);
				$this->words = array_merge($this->words, $exploded);
			}
			fclose($file);
		}

		$this->words = array_map('trim', array_filter($this->words));
	}
}
