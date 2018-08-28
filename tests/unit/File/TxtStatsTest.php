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
     * @expectedException \Babylon\Exception\FileExtensionException
     */
    public function freq_words_throws_file_extension_exception()
    {
        (new TxtStats(self::DATA_FOLDER."/en.pdf"))->freqWords(10);
    }

    /**
     * @dataProvider txtData
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function freq_words_throws_invalid_argument_exception($filename, $freqWords)
    {
        (new TxtStats(self::DATA_FOLDER."/$filename"))->freqWords(-1);
    }

    /**
     * @dataProvider txtData
     * @test
     */
    public function freq_words($filename, $freqWords)
    {
        $txtStats = new TxtStats(self::DATA_FOLDER."/$filename");

        $this->assertEquals($freqWords, $txtStats->freqWords(15));
    }

    public function txtData()
    {
        return [
            ['en.txt', [
                'the' => 2741,
                'and' => 1428,
                'of' => 1334,
                'to' => 1172,
                'a' => 1062,
                'i' => 889,
                'in' => 804,
                'he' => 798,
                'that' => 667,
                'his' => 653,
                'was' => 651,
                'it' => 592,
                'you' => 510,
                'had' => 476,
                'with' => 391,
            ]],
        ];
    }
}
