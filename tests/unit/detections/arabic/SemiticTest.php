<?php

namespace Babylon\Tests\Unit\Detections\Cyrillic;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use Babylon\Unicode;
use PHPUnit\Framework\TestCase;

class SemiticTest extends TestCase
{
    const DATA_FOLDER = __DIR__.'/../../../../dataset/input/alphabet/arabic/semitic';

    /**
     * @dataProvider arbData
     * @test
     */
    public function family_detect_arb($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('semitic', $family);
    }

    /**
     * @dataProvider arbData
     * @test
     */
    public function language_detect_arb($text)
    {
        $this->assertEquals('arb', (new LanguageDetector($text))->detect());
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

    public function arbData()
    {
        return [
            [
                'يميل إلى الوراء في سيارة اجره ، وهذا الدموية الهواة  بعيدا مثل
                قبره بينما كنت التامل في الكثير من التحيز للعقل البشري.'
            ],
        ];
    }

    public function txtData()
    {
        return [
            ['arb', 'arb.txt'],
        ];
    }
}
