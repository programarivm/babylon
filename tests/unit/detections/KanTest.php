<?php

namespace Babylon\Tests\Unit\Detections;

use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class KanTest extends TestCase
{
    /**
     * @dataProvider kanData
     * @test
     */
    public function language_detect_kan($text)
    {
        $this->assertEquals('kan', (new LanguageDetector())->detect($text));
    }

    public function kanData()
    {
        return [
            [
                "ಹೀಗಾಗಿ ಶೂಗಳನ್ನು ಹಾಕಲಾಗಿತ್ತು, ಸುತ್ತೆಲ್ಲ. ಮೇರಿ ಬೇಗನೆ ಮೂವರು ಮಕ್ಕಳು ಭಾನುವಾರದ ಶಾಲೆಗೆ ಹೊರಟಿದ್ದರು"
            ],
        ];
    }
}
