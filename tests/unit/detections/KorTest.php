<?php

namespace Babylon\Tests\Unit\Detections;

use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class KorTest extends TestCase
{
    /**
     * @dataProvider korData
     * @test
     */
    public function language_detect_kor($text)
    {
        $this->assertEquals('kor', (new LanguageDetector())->detect($text));
    }

    public function korData()
    {
        return [
            [
                "나는 정구 치는것을 좋아한다 좋아하-, 좋아하나요, 좋아합니다"
            ],
        ];
    }
}
