<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class VasconicTest extends TestCase
{
    /**
     * @dataProvider eusData
     * @test
     */
    public function family_detect_eus($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('vasconic', $family);
    }

    /**
     * @dataProvider eusData
     * @test
     */
    public function language_detect_eus($text)
    {
        $this->assertEquals('eus', (new LanguageDetector())->detect($text));
    }

    public function eusData()
    {
        return [
            [
                "Ez nuen denbora mugitu irakasleek oihu egin zidaten ia ausardia azentu zorrotz batekin."
            ],
        ];
    }
}
