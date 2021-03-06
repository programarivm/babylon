<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class RomanceFamilyTest extends TestCase
{
    /**
     * @dataProvider catData
     * @test
     */
    public function family_detect_cat($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('romance', $family);
    }

    /**
     * @dataProvider fraData
     * @test
     */
    public function family_detect_fra($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('romance', $family);
    }

    /**
     * @dataProvider glgData
     * @test
     */
    public function family_detect_glg($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('romance', $family);
    }

    /**
     * @dataProvider itaData
     * @test
     */
    public function family_detect_ita($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('romance', $family);
    }

    /**
     * @dataProvider porData
     * @test
     */
    public function family_detect_por($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('romance', $family);
    }

    /**
     * @dataProvider ronData
     * @test
     */
    public function family_detect_ron($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('romance', $family);
    }

    /**
     * @dataProvider spaData
     * @test
     */
    public function family_detect_spa($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('romance', $family);
    }

    /**
     * @dataProvider catData
     * @test
     */
    public function language_detect_cat($text)
    {
        $this->assertEquals('cat', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider fraData
     * @test
     */
    public function language_detect_fra($text)
    {
        $this->assertEquals('fra', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider glgData
     * @test
     */
    public function language_detect_glg($text)
    {
        $this->assertEquals('glg', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider itaData
     * @test
     */
    public function language_detect_ita($text)
    {
        $this->assertEquals('ita', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider porData
     * @test
     */
    public function language_detect_por($text)
    {
        $this->assertEquals('por', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider ronData
     * @test
     */
    public function language_detect_ron($text)
    {
        $this->assertEquals('ron', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider spaData
     * @test
     */
    public function language_detect_spa($text)
    {
        $this->assertEquals('spa', (new LanguageDetector())->detect($text));
    }

    public function catData()
    {
        return [
            [
                "Els gemecs pararen, i s'esvaí el mal que sentia el dit del peu."
            ],
        ];
    }

    public function fraData()
    {
        return [
            [
                "Entre autres, une feuille de papier, pliée avec soin, portait l'entête de la chancellerie"
            ],
        ];
    }

    public function glgData()
    {
        return [
            [
                "Saber o que se deixa de comer, saber o que ten que traballar, esquecerse d'o que ten que pagar"
            ],
        ];
    }

    public function itaData()
    {
        return [
            [
                "Anche i Dareni, patrizi molto boriosi e molto bene incamminati verso il fallimento"
            ],
        ];
    }

    public function porData()
    {
        return [
            [
                "Nas férias, mal se sonhava o dia em que Ruy devia chegar, já ella não parava"
            ],
        ];
    }

    public function ronData()
    {
        return [
            [
                "Pe pareti cu colb, pe podul cu lungi panze de painjen Roiesc plosnitele rosii"
            ],
        ];
    }

    public function spaData()
    {
        return [
            [
                "Mientras se hablaba de lo mucho bueno que había en la catedral y el lugareño se pasmaba"
            ],
        ];
    }
}
