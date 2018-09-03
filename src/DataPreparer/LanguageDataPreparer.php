<?php

namespace Babylon\DataPreparer;

use Babylon\Alphabet;
use Babylon\Validator;
use Babylon\File\TxtStats;

class LanguageDataPreparer implements DataPreparerInterface
{
    protected $alphabet;

    protected $langFamily;

    protected $inputFolder;

    protected $outputFolder;

    protected $mssg = '';

    public function __construct(string $langFamily, string $alphabet = null)
    {
        Validator::langFamily($langFamily);

        $alphabet === Alphabet::CYRILLIC ? $this->alphabet = Alphabet::CYRILLIC : $this->alphabet = Alphabet::LATIN;

        $this->langFamily = $langFamily;

        $this->inputFolder = [
            Alphabet::CYRILLIC => __DIR__.'/../../dataset/input/alphabet/'.Alphabet::CYRILLIC."/$langFamily",
            Alphabet::LATIN => __DIR__.'/../../dataset/input/alphabet/'.Alphabet::LATIN."/$langFamily",
        ];

        $this->outputFolder = [
            Alphabet::CYRILLIC => __DIR__.'/../../dataset/output/alphabet/'.Alphabet::CYRILLIC,
            Alphabet::LATIN => __DIR__.'/../../dataset/output/alphabet/'.Alphabet::LATIN,
        ];
    }

    /**
     * Prepares the dataset/output files with the files in the dataset/input folder.
     *
     * @param array $files
     * @return array
     */
    public function prepare(): string
    {
        $csv = '';
        $files = array_diff(scandir($this->inputFolder[$this->alphabet]), ['.', '..']);
        foreach ($files as $file) {
            $txtStats = new TxtStats("{$this->inputFolder[$this->alphabet]}/$file");
            $freqWords = $txtStats->freqWords();
            $csv .= pathinfo($file, PATHINFO_FILENAME) .','.$this->magicPhrase($freqWords).PHP_EOL;
            if ($handle = fopen("{$this->outputFolder[$this->alphabet]}/{$this->langFamily}.csv", 'w')) {
                if (fwrite($handle, $csv) !== false) {
                    $this->mssg .= "OK! The most frequent words in $file were transformed into CSV format...".PHP_EOL;
                } else {
                    $this->mssg .= "Whoops! The most frequent words in $file could not be calculated...".PHP_EOL;
                }
                fclose($handle);
            }
        }
        $this->mssg .= 'The '.$this->langFamily.' language family has been updated.'.PHP_EOL;

        return $this->mssg;
    }

    /**
     * Returns a text with the most frequent words.
     *
     * @param array $freqWords
     * @return array
     */
    private function magicPhrase(array $freqWords): string
    {
        $magicPhrase = '';
        foreach ($freqWords as $word => $freq) {
            $magicPhrase .= "$word ";
        }

        return $magicPhrase;
    }
}
