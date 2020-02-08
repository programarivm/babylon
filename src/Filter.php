<?php

namespace Babylon;

class Filter
{
    public static function text(string $text): string
    {
        $text = mb_strtolower($text);

        $patterns = [
            '/\'/',
            '/(“|”)/',
            '/(«|»)/',
            '/(\"|\")/',
            '/’/',
            '/…/',
            '/[[:punct:]]/',
            '#\p{Pd}#u',
            '/[0-9]+/',
            '!\s+!',
        ];

        $text = preg_replace($patterns, ' ', $text);

        return $text;
    }
}
