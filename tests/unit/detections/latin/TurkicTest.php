<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class TurkicTest extends TestCase
{
    /**
     * @dataProvider turData
     * @test
     */
    public function family_detect_tur($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('turkic', $family);
    }

    /**
     * @dataProvider turData
     * @test
     */
    public function language_detect_tur($text)
    {
        $this->assertEquals('tur', (new LanguageDetector())->detect($text));
    }

    public function turData()
    {
        return [
            [
                "Evet, gördüğün her şeyi biliyorum. Odaya birkaç kez yürüdün,
                ve vücut tarafından diz çöküp."
            ],
        ];
    }
}
