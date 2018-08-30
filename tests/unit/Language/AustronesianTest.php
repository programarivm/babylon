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
        $this->assertEquals('tgl', (new Language($text))->detect();
    }

    public function tglData()
    {
        return [
            [
                "Alam mo na mahal kita. Ano ito pala ang nata de coco na pinag-uusapan ng lahat. Kung saan may buhay may pag-asa."
            ],
            [
                "May kilala ba kayong isang G. Green? Alam ko ang marikit na kastilyo. Pinakilala niya ako sa kanyang kapatid na lalaki."
            ],
            [
                "Ngayon ang aking ikalabing-anim na kaarawan. Nagpaalam na ang mga bata sa mga matatandang galing sa ibang bayan. Bigyan mo ako ng kalahating kilo ng mansanas."
            ],
            [
                "Hindi posible ang manirahan sa pulong iyan. Wala silang magawa. Alam mo ba iyon? Nahuli siya dahil sa yelo. Napakaimportante ang guni-guni sa araw-araw na buhay."
            ],
            [
                "Talagang hindi gumagana iyan. Kailangan niyang pumunta rito. Hindi ka dapat pumunta sa paaralan. Umihi sa dayaper ang anak mo. Binigay niya sa akin lahat ng pera niya."
            ],
        ];
    }
}
