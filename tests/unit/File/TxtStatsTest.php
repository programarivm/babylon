<?php

namespace Babylon\Tests\File;

use Babylon\File\TxtStats;
use PHPUnit\Framework\TestCase;

class TxtStatsTest extends TestCase
{
    const DATA_FOLDER = __DIR__.'/data';

    /**
     * @dataProvider txtData
     * @test
     */
    public function freq_words($filename, $freqWords)
    {
        $txtStats = new TxtStats(self::DATA_FOLDER."/$filename");

        $this->assertEquals($freqWords, array_slice($txtStats->freqWords(), 0, 10));
    }

    public function txtData()
    {
        return [
            ['eng.txt', [
                'the' => 2538,
                'and' => 1363,
                'of' => 1211,
                'to' => 1101,
                'a' => 1007,
                'i' => 930,
                'he' => 802,
                'in' => 732,
                'that' => 673,
                'was' => 651,
            ]],
        ];
    }
}
