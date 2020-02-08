<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class NigerCongoTest extends TestCase
{
    /**
     * @dataProvider swhData
     * @test
     */
    public function family_detect_swh($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('niger-congo', $family);
    }

    /**
     * @dataProvider yorData
     * @test
     */
    public function family_detect_yor($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('niger-congo', $family);
    }

    /**
     * @dataProvider zulData
     * @test
     */
    public function family_detect_zul($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('niger-congo', $family);
    }

    /**
     * @dataProvider swhData
     * @test
     */
    public function language_detect_swh($text)
    {
        $this->assertEquals('swh', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider yorData
     * @test
     */
    public function language_detect_yor($text)
    {
        $this->assertEquals('yor', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider zulData
     * @test
     */
    public function language_detect_zul($text)
    {
        $this->assertEquals('zul', (new LanguageDetector())->detect($text));
    }

    public function swhData()
    {
        return [
            [
                "Alikua na uchungu, na dhaifu kutoka kwa ugumu wa muda mrefu ambao nilikuwa nao"
            ],
        ];
    }

    public function yorData()
    {
        return [
            [
                "Nibayi ọmọ kekere ti ndagba. O si ga, siririn, atorunwa"
            ],
        ];
    }

    public function zulData()
    {
        return [
            [
                "Lo mkhankaso ulethe abaningi futhi wagqugquzela abaningi kodwa kimi wawunjalo"
            ],
        ];
    }
}
