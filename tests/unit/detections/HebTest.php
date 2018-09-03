<?php

namespace Babylon\Tests\Unit\Detections;

use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class HebTest extends TestCase
{
    /**
     * @dataProvider hebData
     * @test
     */
    public function language_detect_heb($text)
    {
        $this->assertEquals('heb', (new LanguageDetector($text))->detect());
    }

    public function hebData()
    {
        return [
            [
                "בדיתי עוד איזה ענינים מעין אלה, ובקולי קולות החלותי להוכיח לו, כי זה
                האיש _הפפולטי_ היה במשך תשע שנים משנה למלך פרס."
            ],
        ];
    }
}
