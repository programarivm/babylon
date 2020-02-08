<?php

namespace Babylon\Tests\Unit\Detections\Arabic;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class SemiticTest extends TestCase
{
    /**
     * @dataProvider arbData
     * @test
     */
    public function family_detect_arb($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('semitic', $family);
    }

    /**
     * @dataProvider arbData
     * @test
     */
    public function language_detect_arb($text)
    {
        $this->assertEquals('arb', (new LanguageDetector())->detect($text));
    }

    public function arbData()
    {
        return [
            [
                'يميل إلى الوراء في سيارة اجره ، وهذا الدموية الهواة  بعيدا مثل
                قبره بينما كنت التامل في الكثير من التحيز للعقل البشري.'
            ],
        ];
    }
}
