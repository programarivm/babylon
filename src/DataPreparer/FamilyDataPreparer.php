<?php

namespace Babylon\DataPreparer;

use Babylon\Alphabet;
use Babylon\File\TxtStats;

class FamilyDataPreparer implements DataPreparerInterface
{
    protected $alphabet;

    protected $inputFolder;

    protected $outputFolder;

    protected $mssg = '';

    public function __construct(string $alphabet)
    {
        Alphabet::validate($alphabet);

        $this->alphabet = $alphabet;
        $this->inputFolder = __DIR__."/../../dataset/output/alphabet/$alphabet";
        $this->outputFile = __DIR__."/../../dataset/output/$alphabet-fingerprint.csv";
    }

    public function prepare(): string
    {
        $this->writeOutputFile($this->csv());

        return $this->mssg.'Operation completed.'.PHP_EOL;
    }

    private function csv()
    {
        $csv = '';
        $files = array_diff(scandir($this->inputFolder), ['.', '..']);
        foreach ($files as $filename) {
            $nLines = count(file("{$this->inputFolder}/$filename", FILE_SKIP_EMPTY_LINES));
            $line = pathinfo($filename, PATHINFO_FILENAME).',';
            if ($file = fopen("{$this->inputFolder}/$filename", 'r')) {
                while (!feof($file)) {
                    $exploded = explode(',', fgets($file));
                    if (isset($exploded[0]) && isset($exploded[1])) {
                        $nFirstWords = $this->nFirstWords(
                            ceil(TxtStats::N_FREQ_WORDS/$nLines),
                            preg_replace('~[[:cntrl:]]~', '', $exploded[1])
                        );
                        $line .= "$nFirstWords ";
                    }
                }
                fclose($file);
                $csv .= $this->removeDuplicateWords(trim($line)).PHP_EOL;
                $this->mssg .= "OK! The words in $filename were successfully read...".PHP_EOL;
            } else {
                $this->mssg .= "Whoops! The words in $filename could not be read...".PHP_EOL;
            }
        }

        return $csv;
    }

    private function writeOutputFile(string $csv): void
    {
        if ($file = fopen($this->outputFile, 'w')) {
            if (fwrite($file, $csv) !== false) {
                $this->mssg .= "OK! {$this->alphabet}-fingerprint.csv was successfully written...".PHP_EOL;
            } else {
                $this->mssg .= "Whoops! {$this->alphabet}-fingerprint.csv could not be written...".PHP_EOL;
            }
            fclose($file);
        }
    }

    private function removeDuplicateWords(string $text)
    {
        return implode(' ', array_unique(explode(' ', $text)));
    }

    private function nFirstWords(int $n, string $text)
    {
        return implode(' ', array_slice(explode(' ', $text), 0, $n));
    }
}
