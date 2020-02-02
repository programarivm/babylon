<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class AustronesianTest extends TestCase
{
    /**
     * @dataProvider cebData
     * @test
     */
    public function family_detect_ceb($text)
    {
        $family = (new FamilyDetector($text))->detect();

        $this->assertEquals('austronesian', $family);
    }

    /**
     * @dataProvider fijData
     * @test
     */
    public function family_detect_fij($text)
    {
        $family = (new FamilyDetector($text))->detect();

        $this->assertEquals('austronesian', $family);
    }

    /**
     * @dataProvider javData
     * @test
     */
    public function family_detect_jav($text)
    {
        $family = (new FamilyDetector($text))->detect();

        $this->assertEquals('austronesian', $family);
    }

    /**
     * @dataProvider mriData
     * @test
     */
    public function family_detect_mri($text)
    {
        $family = (new FamilyDetector($text))->detect();

        $this->assertEquals('austronesian', $family);
    }

    /**
     * @dataProvider smoData
     * @test
     */
    public function family_detect_smo($text)
    {
        $family = (new FamilyDetector($text))->detect();

        $this->assertEquals('austronesian', $family);
    }

    /**
     * @dataProvider tglData
     * @test
     */
    public function family_detect_tgl($text)
    {
        $family = (new FamilyDetector($text))->detect();

        $this->assertEquals('austronesian', $family);
    }

    /**
     * @dataProvider vieData
     * @test
     */
    public function family_detect_vie($text)
    {
        $family = (new FamilyDetector($text))->detect();

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
     * @dataProvider fijData
     * @test
     */
    public function language_detect_fij($text)
    {
        $this->assertEquals('fij', (new LanguageDetector($text))->detect());
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
     * @dataProvider mriData
     * @test
     */
    public function language_detect_mri($text)
    {
        $this->assertEquals('mri', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider smoData
     * @test
     */
    public function language_detect_smo($text)
    {
        $this->assertEquals('smo', (new LanguageDetector($text))->detect());
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

    public function cebData()
    {
        return [
            [
                "Sa usá ka bangko, naglingkod ang duhá ka tawo. Babaye ang usá"
            ],
        ];
    }

    public function fijData()
    {
        return [
            [
                "O a sega beka ni tarogi koya se cava e lako tiko kina? Au a taroga"
            ],
        ];
    }

    public function javData()
    {
        return [
            [
                "Panjenengané banget kasep ing bali - dadi pungkasan, aku ngerti yen konser"
            ],
        ];
    }

    public function mriData()
    {
        return [
            [
                "Kaore koe e pātai atu ki a ia i tana haerenga mai? I pātai mai ahau"
            ],
        ];
    }

    public function smoData()
    {
        return [
            [
                "O le tauvaga na aumaia ai le faʻaaloalo ma le faʻamalosia i le toatele"
            ],
        ];
    }

    public function tglData()
    {
        return [
            [
                "Sa pamamagitan ng mga paunang talatang itó ay sukat nang mahinuha ng sinomán"
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
}
