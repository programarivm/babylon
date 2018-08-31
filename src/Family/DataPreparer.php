<?php

namespace Babylon\Family;

class DataPreparer
{
    const INPUT_FOLDER      = __DIR__ . '/../../dataset/output/iso-8859/latin';
    const OUTPUT_FOLDER     = __DIR__ . '/../../dataset/output';
    const OUTPUT_FILE       = 'iso-8859-latin-family.csv';

    protected $mssg = '';

    public function prepare(): string
    {
        $files = array_diff(scandir(self::INPUT_FOLDER), ['.', '..']);
        $csv = '';
        foreach ($files as $file) {
            $csvLine = $this->prepareCsvLine($file);
            if ($csvLine) {
                $csv .= $csvLine.PHP_EOL;
                $this->mssg .= "OK! The words in $file were successfully read...".PHP_EOL;
            } else {
                $this->mssg .= "Whoops! The words in $file could not be read...".PHP_EOL;
            }
        }
        if ($oFile = fopen(self::OUTPUT_FOLDER.'/'.self::OUTPUT_FILE, 'w')) {
            if (fwrite($oFile, $csv) !== false) {
                $this->mssg .= 'OK! '.self::OUTPUT_FILE.' was successfully written...'.PHP_EOL;
            } else {
                $this->mssg .= 'Whoops! '.self::OUTPUT_FILE.' could not be written...'.PHP_EOL;
            }
            fclose($oFile);
        }

        return $this->mssg.'Operation completed.'.PHP_EOL;
    }

    public function prepareCsvLine($file)
    {
        $csvLine = pathinfo($file, PATHINFO_FILENAME).',';
        if ($iFile = fopen(self::INPUT_FOLDER.'/'.$file, 'r')) {
            while (!feof($iFile)) {
                $exploded = explode(',', fgets($iFile));
                isset($exploded[1]) ? $csvLine .= $exploded[1].' ' : false;
            }
            fclose($iFile);
            return trim($csvLine);
        }

        return false;
    }
}
