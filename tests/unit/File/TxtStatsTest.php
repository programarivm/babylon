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
        (new TxtStats(self::DATA_FOLDER."/eng.pdf"))->freqWords(10);
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
            ['eng.txt', [
                'the' => 2535,
                'and' => 1355,
                'of' => 1210,
                'to' => 1091,
                'a' => 993,
                'i' => 888,
                'he' => 792,
                'in' => 729,
                'that' => 652,
                'was' => 650,
                'his' => 648,
                'it' => 571,
                'had' => 476,
                'you' => 441,
                'with' => 336,
            ]],
        ];
    }
}
