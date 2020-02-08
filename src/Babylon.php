<?php

namespace Babylon;

class Babylon
{
    const OUTPUT_FOLDER = __DIR__ . '/../dataset/output';

    public $fingerprint = [];

    public $alphabet = [];

    public function __construct()
    {
        $this->fingerprint()
            ->alphabet()
            ->persist();
    }

    private function fingerprint()
    {
        $files = array_diff(scandir(self::OUTPUT_FOLDER), ['.', '..']);

        foreach ($files as $item) {
            if (substr_compare($item, '-fingerprint.csv', - strlen('-fingerprint.csv')) === 0) {
                $alphabet = substr_replace($item ,'', -16);
                $file = fopen(self::OUTPUT_FOLDER."/$item", 'r');
                while (($line = fgetcsv($file)) !== false) {
                    $this->fingerprint[$alphabet][$line[0]] = $line[1];
                }
                fclose($file);
            }
        }

        return $this;
    }

    private function alphabet()
    {
        $folders = array_diff(scandir(self::OUTPUT_FOLDER.'/alphabet'), ['.', '..']);

        foreach ($folders as $folder) {
            $files = array_diff(scandir(self::OUTPUT_FOLDER."/alphabet/$folder"), ['.', '..']);
            foreach ($files as $item) {
                $file = fopen(self::OUTPUT_FOLDER."/alphabet/$folder/$item", 'r');
                while (($line = fgetcsv($file)) !== false) {
                    $family = pathinfo($item, PATHINFO_FILENAME);
                    $this->alphabet[$folder][$family][$line[0]] = $line[1];
                }
                fclose($file);
            }
        }

        return $this;
    }

    private function persist()
    {
        file_put_contents(self::OUTPUT_FOLDER."/babylon.ser", serialize($this));
    }
}
