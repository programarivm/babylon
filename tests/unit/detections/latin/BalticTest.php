<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
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
        $family = (new FamilyDetector($text))->detect();

        $this->assertEquals('baltic', $family);
    }

    /**
     * @dataProvider lvsData
     * @test
     */
    public function family_detect_lvs($text)
    {
        $family = (new FamilyDetector($text))->detect();

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

    /**
     * @dataProvider lvsData
     * @test
     */
    public function language_detect_lvs($text)
    {
        $this->assertEquals('lvs', (new LanguageDetector($text))->detect());
    }

    public function litData()
    {
        return [
            [
                "Aš neturėjo laiko judėti, kaip mokytojas buvo wrzask į mane Jau su labai akcentas"
            ],
        ];
    }

    public function lvsData()
    {
        return [
            [
                "vai tu nekad lūgt viņam to, ko viņš norisinās par? Es jautāju."
            ],
        ];
    }

    public function txtData()
    {
        return [
            ['lit', 'lit.txt'],
            ['lvs', 'lvs.txt'],
        ];
    }
}
