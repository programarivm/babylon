<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;
use UnicodeRanges\Analyzer;

class SlavicTest extends TestCase
{
    const DATA_FOLDER = __DIR__.'/../../../../dataset/input/alphabet/latin/slavic';

    /**
     * @dataProvider cesData
     * @test
     */
    public function family_detect_ces($text)
    {
        $unicodeRangename = (new Analyzer($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('slavic', $family);
    }

    /**
     * @dataProvider polData
     * @test
     */
    public function family_detect_pol($text)
    {
        $unicodeRangename = (new Analyzer($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('slavic', $family);
    }

    /**
     * @dataProvider cesData
     * @test
     */
    public function language_detect_ces($text)
    {
        $this->assertEquals('ces', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider polData
     * @test
     */
    public function language_detect_pol($text)
    {
        $this->assertEquals('pol', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider txtData
     * @test
     */
    public function language_detect($isoCode, $filename)
    {
        $text = file_get_contents(self::DATA_FOLDER."/$filename");

        $this->assertEquals($isoCode, (new LanguageDetector($text))->detect());
    }

    public function cesData()
    {
        return [
            [
                "A tak jednoho večera, když tma byla zvlášť hustá a neproniknutelná, Slávek se vydal"
            ],
        ];
    }

    public function polData()
    {
        return [
            [
                "Różni różnie opowiadają bajkę, ale my opowiemy ją tak, jak nam ją kiedyś"
            ],
        ];
    }

    public function txtData()
    {
        return [
            ['ces', 'ces.txt'],
            ['pol', 'pol.txt'],
        ];
    }
}
