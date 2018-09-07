<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use Babylon\Unicode;
use PHPUnit\Framework\TestCase;

class AustronesianTest extends TestCase
{
    const DATA_FOLDER = __DIR__.'/../../../../dataset/input/alphabet/latin/austronesian';

    /**
     * @dataProvider cebData
     * @test
     */
    public function family_detect_ceb($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('austronesian', $family);
    }

    /**
     * @dataProvider javData
     * @test
     */
    public function family_detect_jav($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('austronesian', $family);
    }

    /**
     * @dataProvider tglData
     * @test
     */
    public function family_detect_tgl($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('austronesian', $family);
    }

    /**
     * @dataProvider vieData
     * @test
     */
    public function family_detect_vie($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('austronesian', $family);
    }

    /**
     * @dataProvider cebData
     * @test
     */
    public function language_detect_ceb($text)
    {
        $this->assertEquals('ceb', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider javData
     * @test
     */
    public function language_detect_jav($text)
    {
        $this->assertEquals('jav', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider tglData
     * @test
     */
    public function language_detect_tgl($text)
    {
        $this->assertEquals('tgl', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider vieData
     * @test
     */
    public function language_detect_vie($text)
    {
        $this->assertEquals('vie', (new LanguageDetector($text))->detect());
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

    public function cebData()
    {
        return [
            [
                "Sa usá ka bangko, naglingkod ang duhá ka tawo. Babaye ang usá
                nga nagmaskará ug lalake ang ikaduhá nga waláy maskará."
            ],
        ];
    }

    public function javData()
    {
        return [
            [
                "Panjenengané banget kasep ing bali - dadi pungkasan, aku ngerti yen konser
                ora bisa ditahan ing kabeh wektu."
            ],
        ];
    }

    public function tglData()
    {
        return [
            [
                "Sa pamamagitan ng mga paunang talatang itó ay sukat nang mahinuha
                ng sinomán ang nilalaman ng Bulalakaw ng Pag-asa."
            ],
        ];
    }

    public function vieData()
    {
        return [
            [
                "Như những tuần đã đi theo, quan tâm của tôi trong anh ta và tò mò của tôi như để ông."
            ],
        ];
    }

    public function txtData()
    {
        return [
            ['ceb', 'ceb.txt'],
            ['jav', 'jav.txt'],
            ['tgl', 'tgl.txt'],
            ['vie', 'vie.txt'],
        ];
    }
}
