<?php

namespace Babylon\Tests\Unit\Detections;

use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class ZhoTest extends TestCase
{
    /**
     * @dataProvider zhoData
     * @test
     */
    public function language_detect_zho($text)
    {
        $this->assertEquals('zho', (new LanguageDetector($text))->detect());
    }

    public function zhoData()
    {
        return [
            [
                "復疇同屠先生回到二酉堂。復疇胸中有事，睡到牀上，心頭似轆轤萬轉，哪裡睡得著。"
            ],
        ];
    }
}
