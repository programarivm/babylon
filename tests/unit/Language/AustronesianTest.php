<?php

namespace Babylon\Tests\Unit\Language;

use Babylon\Filter;
use Babylon\Language\Language;
use PHPUnit\Framework\TestCase;

class AustronesianTest extends TestCase
{
    /**
     * @dataProvider tglData
     * @test
     */
    public function detect_tgl($text)
    {
        $this->assertEquals('tgl', (new Language($text))->detect());
    }

    public function tglData()
    {
        return [
            [
                "Sa pamamagitan ng mga paunang talatang itó ay sukat nang mahinuha
                ng sinomán ang nilalaman ng Bulalakaw ng Pag-asa: Pag-asa sa isang
                Bayang matibay na mapapatayo at hindi sa isang Pag-ibig na balót ng
                mga pagpapakunwari. Ito'y pañgarap; ñguni't yao'y katotohanan."
            ],
        ];
    }
}
