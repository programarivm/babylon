<?php

namespace Babylon\Tests\Unit\Detections;

use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class ThaTest extends TestCase
{
    /**
     * @dataProvider thaData
     * @test
     */
    public function language_detect_tha($text)
    {
        $this->assertEquals('tha', (new LanguageDetector())->detect($text));
    }

    public function thaData()
    {
        return [
            [
                "สำหรับบางเดือนเจฟเฟอร์สันหวังลอยท่ามกลางภูเขา, ชั้นนำ"
            ],
        ];
    }
}
