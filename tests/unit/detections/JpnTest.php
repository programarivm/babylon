<?php

namespace Babylon\Tests\Unit\Detections;

use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class JpnTest extends TestCase
{
    /**
     * @dataProvider jpnData
     * @test
     */
    public function language_detect_jpn($text)
    {
        $this->assertEquals('jpn', (new LanguageDetector())->detect($text));
    }

    public function jpnData()
    {
        return [
            [
                "どうにもならない事を、どうにかする為には、手段を選んでいる遑（いとま）はない。"
            ],
        ];
    }
}
