<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class SlavicTest extends TestCase
{
    /**
     * @dataProvider cesData
     * @test
     */
    public function family_detect_ces($text)
    {
        $family = (new FamilyDetector($text))->detect();

        $this->assertEquals('slavic', $family);
    }

    /**
     * @dataProvider polData
     * @test
     */
    public function family_detect_pol($text)
    {
        $family = (new FamilyDetector($text))->detect();

        $this->assertEquals('slavic', $family);
    }

    /**
     * @dataProvider cesData
     * @test
     */
    public function language_detect_ces($text)
    {
        $this->assertEquals('ces', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider polData
     * @test
     */
    public function language_detect_pol($text)
    {
        $this->assertEquals('pol', (new LanguageDetector($text))->detect());
    }

    public function cesData()
    {
        return [
            [
                "A tak jednoho večera, když tma byla zvlášť hustá a neproniknutelná, Slávek se vydal"
            ],
        ];
    }

    public function polData()
    {
        return [
            [
                "Różni różnie opowiadają bajkę, ale my opowiemy ją tak, jak nam ją kiedyś"
            ],
        ];
    }
}
