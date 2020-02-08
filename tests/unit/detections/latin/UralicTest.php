<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class UralicTest extends TestCase
{
    /**
     * @dataProvider estData
     * @test
     */
    public function family_detect_est($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('uralic', $family);
    }

    /**
     * @dataProvider finData
     * @test
     */
    public function family_detect_fin($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('uralic', $family);
    }

    /**
     * @dataProvider hunData
     * @test
     */
    public function family_detect_hun($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('uralic', $family);
    }

    /**
     * @dataProvider estData
     * @test
     */
    public function language_detect_est($text)
    {
        $this->assertEquals('est', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider finData
     * @test
     */
    public function language_detect_fin($text)
    {
        $this->assertEquals('fin', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider hunData
     * @test
     */
    public function language_detect_hun($text)
    {
        $this->assertEquals('hun', (new LanguageDetector())->detect($text));
    }

    public function estData()
    {
        return [
            [
                "Ma andsin talle seiklustest lühikese joonise ja oli seda vaevalt järeldanud selleks ajaks."
            ],
        ];
    }

    public function finData()
    {
        return [
            [
                "En voi! hän sanoo. En voi nyt... voimani ovat lopussa! Onneton olen!"
            ],
        ];
    }

    public function hunData()
    {
        return [
            [
                "És szólt a kis kinai lány, olyan hangon, mint ahogy a karácsonyfák csengettyüje szól"
            ],
        ];
    }
}
