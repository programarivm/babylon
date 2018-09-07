<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use Babylon\Unicode;
use PHPUnit\Framework\TestCase;

class GaelicTest extends TestCase
{
    const DATA_FOLDER = __DIR__.'/../../../../dataset/input/alphabet/latin/gaelic';

    /**
     * @dataProvider cymData
     * @test
     */
    public function family_detect_cym($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('gaelic', $family);
    }

    /**
     * @dataProvider glaData
     * @test
     */
    public function family_detect_gla($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('gaelic', $family);
    }

    /**
     * @dataProvider gleData
     * @test
     */
    public function family_detect_gle($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('gaelic', $family);
    }

    /**
     * @dataProvider cymData
     * @test
     */
    public function language_detect_cym($text)
    {
        $this->assertEquals('cym', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider glaData
     * @test
     */
    public function language_detect_gla($text)
    {
        $this->assertEquals('gla', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider gleData
     * @test
     */
    public function language_detect_gle($text)
    {
        $this->assertEquals('gle', (new LanguageDetector($text))->detect());
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

    public function cymData()
    {
        return [
            [
                "Daeth mam y penteulu yno, a bu farw dan y clefyd."
            ],
        ];
    }

    public function glaData()
    {
        return [
            [
                "Tha bàrdachd Oisein luchdaichte le trom thùrsa airson nam marbh gaisgeil"
            ],
        ];
    }

    public function gleData()
    {
        return [
            [
                "Tá aithne mhaith ag Meargach ar Art le fada riamh."
            ],
        ];
    }

    public function txtData()
    {
        return [
            ['cym', 'cym.txt'],
            ['gla', 'gla.txt'],
            ['gle', 'gle.txt'],
        ];
    }
}
