<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use Babylon\Unicode;
use PHPUnit\Framework\TestCase;

class AustronesianTest extends TestCase
{
    /**
     * @dataProvider tglData
     * @test
     */
    public function family_detect_tgl($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('austronesian', $family);
    }

    /**
     * @dataProvider cebData
     * @test
     */
    public function family_detect_ceb($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('austronesian', $family);
    }

    /**
     * @dataProvider vieData
     * @test
     */
    public function family_detect_vie($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('austronesian', $family);
    }

    /**
     * @dataProvider tglData
     * @test
     */
    public function language_detect_tgl($text)
    {
        $this->assertEquals('tgl', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider cebData
     * @test
     */
    public function language_detect_ceb($text)
    {
        $this->assertEquals('ceb', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider vieData
     * @test
     */
    public function language_detect_vie($text)
    {
        $this->assertEquals('vie', (new LanguageDetector($text))->detect());
    }

    public function tglData()
    {
        return [
            [
                "Sa pamamagitan ng mga paunang talatang itó ay sukat nang mahinuha
                ng sinomán ang nilalaman ng Bulalakaw ng Pag-asa: Pag-asa sa isang
                Bayang matibay na mapapatayo at hindi sa isang Pag-ibig na balót ng
                mga pagpapakunwari."
            ],
        ];
    }

    public function cebData()
    {
        return [
            [
                "Sa usá ka bangko, naglingkod ang duhá ka tawo. Babaye ang usá
                nga nagmaskará ug lalake ang ikaduhá nga waláy maskará. Ang lake
                nagkanayón:"
            ],
        ];
    }

    public function vieData()
    {
        return [
            [
                "Như những tuần đã đi theo, quan tâm của tôi trong anh ta và tò mò của tôi như để ông
                nhằm mục đích trong cuộc sống, từng bước sâu sắc và tăng lên."
            ],
        ];
    }
}
