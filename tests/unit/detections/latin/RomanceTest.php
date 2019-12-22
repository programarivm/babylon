<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;
use UnicodeRanges\Analyzer;

class RomanceFamilyTest extends TestCase
{
    const DATA_FOLDER = __DIR__.'/../../../../dataset/input/alphabet/latin/romance';

    /**
     * @dataProvider catData
     * @test
     */
    public function family_detect_cat($text)
    {
        $unicodeRangename = (new Analyzer($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('romance', $family);
    }

    /**
     * @dataProvider fraData
     * @test
     */
    public function family_detect_fra($text)
    {
        $unicodeRangename = (new Analyzer($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('romance', $family);
    }

    /**
     * @dataProvider glgData
     * @test
     */
    public function family_detect_glg($text)
    {
        $unicodeRangename = (new Analyzer($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('romance', $family);
    }

    /**
     * @dataProvider itaData
     * @test
     */
    public function family_detect_ita($text)
    {
        $unicodeRangename = (new Analyzer($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('romance', $family);
    }

    /**
     * @dataProvider porData
     * @test
     */
    public function family_detect_por($text)
    {
        $unicodeRangename = (new Analyzer($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('romance', $family);
    }

    /**
     * @dataProvider ronData
     * @test
     */
    public function family_detect_ron($text)
    {
        $unicodeRangename = (new Analyzer($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('romance', $family);
    }

    /**
     * @dataProvider spaData
     * @test
     */
    public function family_detect_spa($text)
    {
        $unicodeRangename = (new Analyzer($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('romance', $family);
    }

    /**
     * @dataProvider catData
     * @test
     */
    public function language_detect_cat($text)
    {
        $unicodeRangename = (new Analyzer($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('romance', $family);
    }

    /**
     * @dataProvider fraData
     * @test
     */
    public function language_detect_fra($text)
    {
        $this->assertEquals('fra', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider glgData
     * @test
     */
    public function language_detect_glg($text)
    {
        $this->assertEquals('glg', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider itaData
     * @test
     */
    public function language_detect_ita($text)
    {
        $this->assertEquals('ita', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider porData
     * @test
     */
    public function language_detect_por($text)
    {
        $this->assertEquals('por', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider ronData
     * @test
     */
    public function language_detect_ron($text)
    {
        $this->assertEquals('ron', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider spaData
     * @test
     */
    public function language_detect_spa($text)
    {
        $this->assertEquals('spa', (new LanguageDetector($text))->detect());
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
                "É a cousa mais condanada que se pode decir nin pensar"
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
                "Torvos luaceiros cardavam sobre as coisas, aspectos pardos e monacaes"
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

    public function txtData()
    {
        return [
            ['cat', 'cat.txt'],
            ['fra', 'fra.txt'],
            ['ita', 'ita.txt'],
            ['por', 'por.txt'],
            ['ron', 'ron.txt'],
            ['spa', 'spa.txt'],
        ];
    }
}
