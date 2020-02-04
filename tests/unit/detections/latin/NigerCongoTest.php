<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class NigerCongoTest extends TestCase
{
    /**
     * @dataProvider zulData
     * @test
     */
    public function family_detect_zul($text)
    {
        $family = (new FamilyDetector($text))->detect();

        $this->assertEquals('niger-congo', $family);
    }

    /**
     * @dataProvider zulData
     * @test
     */
    public function language_detect_zul($text)
    {
        $this->assertEquals('zul', (new LanguageDetector($text))->detect());
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
