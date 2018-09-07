<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use Babylon\Unicode;
use PHPUnit\Framework\TestCase;

class VasconicTest extends TestCase
{
    const DATA_FOLDER = __DIR__.'/../../../../dataset/input/alphabet/latin/vasconic';

    /**
     * @dataProvider eusData
     * @test
     */
    public function family_detect_eus($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('vasconic', $family);
    }

    /**
     * @dataProvider eusData
     * @test
     */
    public function language_detect_eus($text)
    {
        $this->assertEquals('eus', (new LanguageDetector($text))->detect());
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

    public function eusData()
    {
        return [
            [
                "Ez nuen denbora mugitu irakasleek oihu egin zidaten ia ausardia azentu zorrotz batekin."
            ],
        ];
    }

    public function txtData()
    {
        return [
            ['eus', 'eus.txt'],
        ];
    }
}
