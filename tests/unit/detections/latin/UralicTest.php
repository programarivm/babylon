<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use Babylon\Unicode;
use PHPUnit\Framework\TestCase;

class UralicTest extends TestCase
{
    const DATA_FOLDER = __DIR__.'/../../../../dataset/input/alphabet/latin/uralic';

    /**
     * @dataProvider finData
     * @test
     */
    public function family_detect_fin($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('uralic', $family);
    }

    /**
     * @dataProvider hunData
     * @test
     */
    public function family_detect_hun($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('uralic', $family);
    }

    /**
     * @dataProvider finData
     * @test
     */
    public function language_detect_fin($text)
    {
        $this->assertEquals('fin', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider hunData
     * @test
     */
    public function language_detect_hun($text)
    {
        $this->assertEquals('hun', (new LanguageDetector($text))->detect());
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

    public function finData()
    {
        return [
            [
                "En voi! hän sanoo. En voi nyt... voimani ovat lopussa! Onneton olen!
                Ja onneton on Anna Erastovnakin! Me rakastimme toisiamme, lupauduimme
                toisillemme, mutta pahat ihmiset erottivat meidät säälittä."
            ],
        ];
    }

    public function hunData()
    {
        return [
            [
                "És szólt a kis kinai lány, olyan hangon, mint ahogy a karácsonyfák
                csengettyüje szól"
            ],
        ];
    }

    public function txtData()
    {
        return [
            ['fin', 'fin.txt'],
            ['hun', 'hun.txt'],
        ];
    }
}
