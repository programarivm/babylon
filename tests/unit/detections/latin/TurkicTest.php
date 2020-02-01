<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class TurkicTest extends TestCase
{
    const DATA_FOLDER = __DIR__.'/../../../../dataset/input/alphabet/latin/turkic';

    /**
     * @dataProvider turData
     * @test
     */
    public function family_detect_tur($text)
    {
        $family = (new FamilyDetector($text))->detect();

        $this->assertEquals('turkic', $family);
    }

    /**
     * @dataProvider turData
     * @test
     */
    public function language_detect_tur($text)
    {
        $this->assertEquals('tur', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider txtData
     * @test
     */
    public function language_detect($isoCode, $filename)
    {
        $text = file_get_contents(self::DATA_FOLDER."/$filename");

        $this->assertEquals($isoCode, (new LanguageDetector($text))->detect());
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

    public function txtData()
    {
        return [
            ['tur', 'tur.txt'],
        ];
    }
}
