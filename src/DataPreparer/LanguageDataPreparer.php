<?php

namespace Babylon\DataPreparer;

use Babylon\Alphabet;
use Babylon\Family;
use Babylon\Validator;
use Babylon\File\TxtStats;

class LanguageDataPreparer implements DataPreparerInterface
{
    protected $alphabet;

    protected $family ;

    protected $inputFolder;

    protected $outputFolder;

    protected $mssg = '';

    public function __construct(string $family , string $alphabet = null)
    {
        Family::validate($family);

        switch ($alphabet) {
            case Alphabet::CYRILLIC:
                $this->alphabet = Alphabet::CYRILLIC;
                break;
            case Alphabet::DEVANAGARI:
                $this->alphabet = Alphabet::DEVANAGARI;
                break;
            default:
                $this->alphabet = Alphabet::LATIN;
                break;
        }

        $this->family  = $family ;

        $this->inputFolder = [
            Alphabet::CYRILLIC => __DIR__.'/../../dataset/input/alphabet/'.Alphabet::CYRILLIC."/$family ",
            Alphabet::DEVANAGARI => __DIR__.'/../../dataset/input/alphabet/'.Alphabet::DEVANAGARI."/$family ",
            Alphabet::LATIN => __DIR__.'/../../dataset/input/alphabet/'.Alphabet::LATIN."/$family ",
        ];

        $this->outputFolder = [
            Alphabet::CYRILLIC => __DIR__.'/../../dataset/output/alphabet/'.Alphabet::CYRILLIC,
            Alphabet::DEVANAGARI => __DIR__.'/../../dataset/output/alphabet/'.Alphabet::DEVANAGARI,
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
            if ($handle = fopen("{$this->outputFolder[$this->alphabet]}/{$this->family }.csv", 'w')) {
                if (fwrite($handle, $csv) !== false) {
                    $this->mssg .= "OK! The most frequent words in $file were transformed into CSV format...".PHP_EOL;
                } else {
                    $this->mssg .= "Whoops! The most frequent words in $file could not be calculated...".PHP_EOL;
                }
                fclose($handle);
            }
        }
        $this->mssg .= 'The '.$this->family .' language family has been updated.'.PHP_EOL;

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
