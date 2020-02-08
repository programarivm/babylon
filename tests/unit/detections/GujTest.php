<?php

namespace Babylon\Tests\Unit\Detections;

use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class GujTest extends TestCase
{
    /**
     * @dataProvider gujData
     * @test
     */
    public function language_detect_kan($text)
    {
        $this->assertEquals('guj', (new LanguageDetector())->detect($text));
    }

    public function gujData()
    {
        return [
            [
                "તે પૂરતું સારું છે. મારી પાસે સામાન્ય રીતે રસાયણો હોય છે, અને પ્રસંગોપાત પ્રયોગો કરું છું. તે તમને હેરાન કરશે"
            ],
        ];
    }
}
