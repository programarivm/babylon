<?php

namespace Babylon\Tests\Unit\Detections\Cyrillic;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class SlavicTest extends TestCase
{
    /**
     * @dataProvider belData
     * @test
     */
    public function family_detect_bel($text)
    {
        $family = (new FamilyDetector($text))->detect();

        $this->assertEquals('slavic', $family);
    }

    /**
     * @dataProvider bulData
     * @test
     */
    public function family_detect_bul($text)
    {
        $family = (new FamilyDetector($text))->detect();

        $this->assertEquals('slavic', $family);
    }

    /**
     * @dataProvider hrvData
     * @test
     */
    public function family_detect_hrv($text)
    {
        $family = (new FamilyDetector($text))->detect();

        $this->assertEquals('slavic', $family);
    }

    /**
     * @dataProvider rusData
     * @test
     */
    public function family_detect_rus($text)
    {
        $family = (new FamilyDetector($text))->detect();

        $this->assertEquals('slavic', $family);
    }

    /**
     * @dataProvider ukrData
     * @test
     */
    public function family_detect_ukr($text)
    {
        $family = (new FamilyDetector($text))->detect();

        $this->assertEquals('slavic', $family);
    }

    /**
     * @dataProvider belData
     * @test
     */
    public function language_detect_bel($text)
    {
        $this->assertEquals('bel', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider bulData
     * @test
     */
    public function language_detect_bul($text)
    {
        $this->assertEquals('bul', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider hrvData
     * @test
     */
    public function language_detect_hrv($text)
    {
        $this->assertEquals('hrv', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider rusData
     * @test
     */
    public function language_detect_rus($text)
    {
        $this->assertEquals('rus', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider ukrData
     * @test
     */
    public function language_detect_ukr($text)
    {
        $this->assertEquals('ukr', (new LanguageDetector($text))->detect());
    }

    public function belData()
    {
        return [
            [
                'На самай справе, якая карысьць ад яго разбіць стары кварта, чый таму і стравы, здавалася'
            ],
        ];
    }

    public function bulData()
    {
        return [
            [
                'И ето и до днес кръвта на тези мъченици не е още засъхнала по бащините ни полета; сенките им бродят'
            ],
        ];
    }

    public function hrvData()
    {
        return [
            [
                'Онако насмешено, танких на лук обрва, крупних детињских очију што га испод трепавица као'
            ],
        ];
    }

    public function rusData()
    {
        return [
            [
                'Женщине тут же мудрый обычай говорит: знай только три вещи: кухню, постель, а по воскресеньям—церковь.'
            ],
        ];
    }

    public function ukrData()
    {
        return [
            [
                'Я подивився на Холмса, почувши опис вбивці, який так зі своїми власними силами.'
            ],
        ];
    }
}
