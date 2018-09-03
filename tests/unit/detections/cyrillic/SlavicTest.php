<?php

namespace Babylon\Tests\Unit\Detections\Cyrillic;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class SlavicTest extends TestCase
{
    /**
     * @dataProvider bulData
     * @test
     */
    public function family_detect_bul($text)
    {
        $this->assertEquals('slavic', (new FamilyDetector($text))->detect());
    }

    /**
     * @dataProvider hrvData
     * @test
     */
    public function family_detect_hrv($text)
    {
        $this->assertEquals('slavic', (new FamilyDetector($text))->detect());
    }

    /**
     * @dataProvider rusData
     * @test
     */
    public function family_detect_rus($text)
    {
        $this->assertEquals('slavic', (new FamilyDetector($text))->detect());
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

    public function bulData()
    {
        return [
            [
                'И ето и до днес кръвта на тези мъченици не е още засъхнала по бащините ни
                полета; сенките им бродят денем и нощем и чакат онези, кои от Петрушан им
                пожелаха "добър час и добра стига!'
            ],
        ];
    }

    public function hrvData()
    {
        return [
            [
                'Онако насмешено, танких на лук обрва, крупних детињских очију што
                га испод трепавица као свежина бистра извора разгаљиваху, нагла
                се она над његовом постељом, дотиче га увојцима бујне косе и
                страсно му шапуће.'
            ],
        ];
    }

    public function rusData()
    {
        return [
            [
                'Женщине тут же мудрый обычай говорит: знай только три вещи: кухню,
                постель, а по воскресеньям—церковь. Счастливая Австралия кроме этик
                трех позволенных вещей дала женщине и четвертую—право голоса.'
            ],
        ];
    }
}
