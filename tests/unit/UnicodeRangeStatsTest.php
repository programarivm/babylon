<?php

namespace Babylon\Tests\Unit\Unit;

use Babylon\UnicodeRangeStats;
use PHPUnit\Framework\TestCase;

class UnicodeRangeStatsTest extends TestCase
{
    /**
     * @test
     */
    public function freq()
    {
        $text = '律絕諸篇俱宇宙古今مليارات في мале,тъйжалнопе hola que tal como 토마토쥬스 estas tu hoy この平安朝の';
        $expected = [
            'Basic Latin' => 25,
            'Cyrillic' => 14,
            'CJK Unified Ideographs' => 12,
            'Arabic' => 9,
            'Hangul Syllables' => 5,
            'Hiragana' => 3,
        ];

        $this->assertEquals($expected, (new UnicodeRangeStats($text))->freq());
    }

    /**
     * @test
     */
    public function most_freq()
    {
        $text = '律絕諸篇俱宇宙古今مليارات في мале,тъйжалнопе hola que tal como 토마토쥬스 estas tu hoy この平安朝の';

        $this->assertEquals('Basic Latin', (new UnicodeRangeStats($text))->mostFreq());
    }
}
