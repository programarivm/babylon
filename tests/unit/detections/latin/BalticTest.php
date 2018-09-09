<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use Babylon\Unicode;
use PHPUnit\Framework\TestCase;

class BalticTest extends TestCase
{
    const DATA_FOLDER = __DIR__.'/../../../../dataset/input/alphabet/latin/baltic';

    /**
     * @dataProvider litData
     * @test
     */
    public function family_detect_lit($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('baltic', $family);
    }

    /**
     * @dataProvider litData
     * @test
     */
    public function language_detect_lit($text)
    {
        $this->assertEquals('lit', (new LanguageDetector($text))->detect());
    }

    public function litData()
    {
        return [
            [
                "Aš neturėjo laiko judėti, kaip mokytojas buvo wrzask į mane Jau su labai akcentas"
            ],
        ];
    }

    public function txtData()
    {
        return [
            ['lit', 'lit.txt'],
        ];
    }
}
