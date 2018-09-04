<?php

namespace Babylon\Tests\Unit\Detections;

use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class AraTest extends TestCase
{
    /**
     * @dataProvider araData
     * @test
     */
    public function language_detect_ara($text)
    {
        $this->assertEquals('ara', (new LanguageDetector($text))->detect());
    }

    public function araData()
    {
        return [
            [
                "إن مشروع غوتنبرغ هو كما وصفها هارت: مؤسسة غير ربحية تهدف الى"
            ],
        ];
    }
}
