<?php

namespace Babylon;

class Filter
{
    public static function phrase(string $phrase): string
    {
        $phrase = mb_strtolower($phrase);
        $phrase = preg_replace('/[[:punct:]]/', '', $phrase);
        $phrase = preg_replace('/(“|”)/', '', $phrase);
        $phrase = preg_replace('/(\"|\")/', '', $phrase);
        $phrase = preg_replace('/’/', "'", $phrase);
        $phrase = preg_replace('/[0-9]+/', '', $phrase);
        $phrase = preg_replace('!\s+!', ' ', $phrase);

        return $phrase;
    }
}
