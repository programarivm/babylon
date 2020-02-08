<?php

namespace Babylon\Tests\Unit\Detections;

use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class TelTest extends TestCase
{
    /**
     * @dataProvider telData
     * @test
     */
    public function language_detect_tel($text)
    {
        $this->assertEquals('tel', (new LanguageDetector())->detect($text));
    }

    public function telData()
    {
        return [
            [
                "తన కొడుకు చదువు కుదుటపడడం, ఎవ్వరూ వంటిమీద ఏ పెట్రోలో పోసి అగ్గిపుల్ల గియ్యకపోవడం తప్ప మరో ఆలోచనలేదు భద్రకి."
            ],
        ];
    }
}
