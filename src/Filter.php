<?php

namespace Babylon;

class Filter
{
    public static function text(string $text): string
    {
        $text = mb_strtolower($text);
        $text = preg_replace('/\'/', ' ', $text);
        $text = preg_replace('/(“|”)/', ' ', $text);
        $text = preg_replace('/(«|»)/', ' ', $text);
        $text = preg_replace('/(\"|\")/', ' ', $text);
        $text = preg_replace('/’/', ' ', $text);
        $text = preg_replace('/…/', ' ', $text);
        $text = preg_replace('/[[:punct:]]/', ' ', $text);
        $text = preg_replace('#\p{Pd}#u', ' ', $text);
        $text = preg_replace('/[0-9]+/', ' ', $text);
        $text = preg_replace('!\s+!', ' ', $text);

        return $text;
    }
}
