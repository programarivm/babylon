<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class GermanicTest extends TestCase
{
    /**
     * @dataProvider afrData
     * @test
     */
    public function family_detect_afr($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('germanic', $family);
    }

    /**
     * @dataProvider danData
     * @test
     */
    public function family_detect_dan($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('germanic', $family);
    }

    /**
     * @dataProvider deuData
     * @test
     */
    public function family_detect_deu($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('germanic', $family);
    }

    /**
     * @dataProvider engData
     * @test
     */
    public function family_detect_eng($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('germanic', $family);
    }

    /**
     * @dataProvider islData
     * @test
     */
    public function family_detect_isl($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('germanic', $family);
    }

    /**
     * @dataProvider nldData
     * @test
     */
    public function family_detect_nld($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('germanic', $family);
    }

    /**
     * @dataProvider nobData
     * @test
     */
    public function family_detect_nob($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('germanic', $family);
    }

    /**
     * @dataProvider sweData
     * @test
     */
    public function family_detect_swe($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('germanic', $family);
    }

    /**
     * @dataProvider afrData
     * @test
     */
    public function language_detect_afr($text)
    {
        $this->assertEquals('afr', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider danData
     * @test
     */
    public function language_detect_dan($text)
    {
        $this->assertEquals('dan', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider deuData
     * @test
     */
    public function language_detect_deu($text)
    {
        $this->assertEquals('deu', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider engData
     * @test
     */
    public function language_detect_eng($text)
    {
        $this->assertEquals('eng', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider islData
     * @test
     */
    public function language_detect_isl($text)
    {
        $this->assertEquals('isl', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider nldData
     * @test
     */
    public function language_detect_nld($text)
    {
        $this->assertEquals('nld', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider nobData
     * @test
     */
    public function language_detect_nob($text)
    {
        $this->assertEquals('nob', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider sweData
     * @test
     */
    public function language_detect_swe($text)
    {
        $this->assertEquals('swe', (new LanguageDetector())->detect($text));
    }

    public function afrData()
    {
        return [
            [
                "Verder word bo aan iedere bladsy die naam van die bundel vermeld, waaraan die gedigte"
            ],
        ];
    }

    public function danData()
    {
        return [
            [
                "Hun var et af Jomfru Buxboms allerinteressanteste og paa en vis Maade allerfineste"
            ],
        ];
    }

    public function deuData()
    {
        return [
            [
                "Und wenn alles nach Euren Spitzen schrie, was nicht mehr sein kann und niemals"
            ],
        ];
    }

    public function engData()
    {
        return [
            [
                "As he spoke, his nimble fingers were flying here, there, and everywhere"
            ],
        ];
    }

    public function islData()
    {
        return [
            [
                "Þú hefir nú heyrt, hversu mentun og víðsýni eru gott vopn í höndum karlmanna"
            ],
        ];
    }

    public function nldData()
    {
        return [
            [
                "Dat Maximus inzonderheid door magische kunsten zulk een ontzaglijken invloed op"
            ],
        ];
    }

    public function nobData()
    {
        return [
            [
                "Oline syntes vel ikke at Stunden var til at spøke i, aa hun selv var blit saa snytt og"
            ],
        ];
    }

    public function sweData()
    {
        return [
            [
                "Han steg upp. Då först märkte han att han hade ett täcke över sig som ej funnits där"
            ],
        ];
    }
}
