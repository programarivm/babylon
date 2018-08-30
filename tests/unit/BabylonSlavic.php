<?php

namespace Babylon\Tests;

use Babylon\Babylon;
use Babylon\Filter;
use PHPUnit\Framework\TestCase;

class BabylonSlavicTest extends TestCase
{
    /**
     * @dataProvider cesData
     * @test
     */
    public function detect_ces($text)
    {
        $this->assertEquals('ces', (new Babylon($text))->detect();
    }

    /**
     * @dataProvider polData
     * @test
     */
    public function detect_pol($text)
    {
        $this->assertEquals('pol', (new Babylon($text))->detect();
    }

    public function cesData()
    {
        return [
            [
                "A co byste řekli názvu Osada Stepních Vlků? Stala se zdravotní sestrou. Odhrnovali vrstvu smetí tak horlivě, jako by měli objevit ukrytý poklad. Někteří byli zabiti jiní zraněni další jsou pohřešovaní po bitvě."
            ],
        ];
    }

    public function polData()
    {
        return [
            [
                "Po prostu powiedz co mam zrobić. Wolę angielskie samochody od zagranicznych. Proszę najpierw jemu podać posiłek. Anglia pewnie wygra ten mecz. On czyta teraz powieść. Jest mnóstwo rzeczy które powinniśmy przemyśleć."
            ],
            [
                "Jeśli chodzi o Boba to on wszystko przyjmie natomiast Jane jest szalenie ostrożna. Ktoś ich jeszcze używa? Nie będę z tobą więcej rozmawiać ponieważ przeszkadza mi że ciągle flirtujesz z innymi kobietami."
            ],
            [
                "Tom postanowił się nie odzywać dopóki wszyscy pozostali nie wygłoszą swoich opinii. Osobiście uważam że nie ma większej różnicy kto wygra wybory."
            ],
            [
                "Praca w grupach wielosobowych jest strasznie frustrująca. Nie ważne jak bardzo się zestarzeję wciąż będę miał siłę na grę w ping ponga."
            ],
            [
                "On spotyka się ze swoją dziewczyną co sobota. Ten nadzwyczajny wzrost objaśnia się szybkim zjednoczeniem gospodarczym który zaszedł w tym samym czasie."
            ],
        ];
    }
}
