<?php

namespace Babylon\Tests\Unit\Detections;

use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class TamTest extends TestCase
{
    /**
     * @dataProvider tamData
     * @test
     */
    public function language_detect_tam($text)
    {
        $this->assertEquals('tam', (new LanguageDetector())->detect($text));
    }

    public function tamData()
    {
        return [
            [
                "ஹாய் இன்று நீ எப்படி இருக்கிறாய்? இது தமிழ் மொழி."
            ],
        ];
    }
}
