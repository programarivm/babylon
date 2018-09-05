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

        if (isset($alphabet)) {
            Alphabet::validate($alphabet);
            $this->alphabet = $alphabet;
        } else {
            $this->alphabet = Alphabet::LATIN;
        }

        $this->family  = $family ;
        $this->inputFolder = __DIR__."/../../dataset/input/alphabet/{$this->alphabet}/$family";
        $this->outputFolder = __DIR__."/../../dataset/output/alphabet/{$this->alphabet}";
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
        $files = array_diff(scandir($this->inputFolder), ['.', '..']);
        foreach ($files as $file) {
            $txtStats = new TxtStats("{$this->inputFolder}/$file");
            $freqWords = $txtStats->freqWords();
            $csv .= pathinfo($file, PATHINFO_FILENAME) .','.$this->magicPhrase($freqWords).PHP_EOL;
            if ($handle = fopen("{$this->outputFolder}/{$this->family}.csv", 'w')) {
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
