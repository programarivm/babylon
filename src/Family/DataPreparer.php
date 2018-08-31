<?php

namespace Babylon\Family;

use Babylon\File\TxtStats;

class DataPreparer
{
    const INPUT_FOLDER      = __DIR__ . '/../../dataset/output/iso-8859/latin';
    const OUTPUT_FOLDER     = __DIR__ . '/../../dataset/output';
    const OUTPUT_FILE       = 'iso-8859-latin-family.csv';

    protected $mssg = '';

    public function prepare(): string
    {
        $csv = $this->shuffle($this->csv());
        $this->writeOutputFile($csv);

        return $this->mssg.'Operation completed.'.PHP_EOL;
    }

    private function csv()
    {
        $csv = '';
        $files = array_diff(scandir(self::INPUT_FOLDER), ['.', '..']);
        foreach ($files as $filename) {
            $line = pathinfo($filename, PATHINFO_FILENAME).',';
            if ($file = fopen(self::INPUT_FOLDER.'/'.$filename, 'r')) {
                while (!feof($file)) {
                    $exploded = explode(',', fgets($file));
                    if (isset($exploded[0]) && isset($exploded[1])) {
                        $line .= preg_replace('~[[:cntrl:]]~', '', $exploded[1]);
                    }
                }
                fclose($file);
                $csv .= $this->removeDuplicateWords(trim($line)).PHP_EOL;
                $this->mssg .= "OK! The words in $file were successfully read...".PHP_EOL;
            } else {
                $this->mssg .= "Whoops! The words in $filename could not be read...".PHP_EOL;
            }
        }

        return $csv;
    }

    private function writeOutputFile(string $csv): void
    {
        if ($file = fopen(self::OUTPUT_FOLDER.'/'.self::OUTPUT_FILE, 'w')) {
            if (fwrite($file, $csv) !== false) {
                $this->mssg .= 'OK! '.self::OUTPUT_FILE.' was successfully written...'.PHP_EOL;
            } else {
                $this->mssg .= 'Whoops! '.self::OUTPUT_FILE.' could not be written...'.PHP_EOL;
            }
            fclose($file);
        }
    }

    private function removeDuplicateWords(string $text)
    {
        return implode(' ', array_unique(explode(' ', $text)));
    }

    private function shuffle(string $csv)
    {
        $shuffled = '';
        $line = strtok($csv, PHP_EOL);
        while ($line !== false) {
            $exploded = explode(',', $line);
            if (isset($exploded[0]) && isset($exploded[1])) {
                $shuffled .= $exploded[0] . ',' . $this->shuffleMbStr($exploded[1]) . PHP_EOL;
            }
            $line = strtok(PHP_EOL);
        }

        return $shuffled;
    }

    private function shuffleMbStr(string $text)
    {
        $words = explode(' ', $text);
        shuffle($words);
        $words = array_slice($words, 0, TxtStats::N_FREQ_WORDS);

        return implode(' ', $words);
    }
}
