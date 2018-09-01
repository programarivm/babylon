<?php

namespace Babylon\Tests\Unit;

use Babylon\FamilyDetector;
use Babylon\LanguageDetector;
use PHPUnit\Framework\TestCase;

class AustronesianTest extends TestCase
{
    /**
     * @dataProvider tglData
     * @test
     */
    public function family_detect_tgl($text)
    {
        $this->assertEquals('austronesian', (new FamilyDetector($text))->detect());
    }

    /**
     * @dataProvider cebData
     * @test
     */
    public function family_detect_ceb($text)
    {
        $this->assertEquals('austronesian', (new FamilyDetector($text))->detect());
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
}
