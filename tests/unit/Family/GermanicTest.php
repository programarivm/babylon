<?php

namespace Babylon\Tests\Unit\Family;

use Babylon\Family\Family;
use PHPUnit\Framework\TestCase;

class GermanicTest extends TestCase
{
    /**
     * @dataProvider danData
     * @test
     */
    public function detect_dan($text)
    {
        $this->assertEquals('germanic', (new Family($text))->detect());
    }

    /**
     * @dataProvider deuData
     * @test
     */
    public function detect_deu($text)
    {
        $this->assertEquals('germanic', (new Family($text))->detect());
    }

    /**
     * @dataProvider engData
     * @test
     */
    public function detect_eng($text)
    {
        $this->assertEquals('germanic', (new Family($text))->detect());
    }

    /**
     * @dataProvider islData
     * @test
     */
    public function detect_isl($text)
    {
        $this->assertEquals('germanic', (new Family($text))->detect());
    }

    /**
     * @dataProvider nldData
     * @test
     */
    public function detect_nld($text)
    {
        $this->assertEquals('germanic', (new Family($text))->detect());
    }

    /**
     * @dataProvider nobData
     * @test
     */
    public function detect_nob($text)
    {
        $this->assertEquals('germanic', (new Family($text))->detect());
    }

    /**
     * @dataProvider sweData
     * @test
     */
    public function detect_swe($text)
    {
        $this->assertEquals('germanic', (new Family($text))->detect());
    }

    public function danData()
    {
        return [
            [
                "Hun var et af Jomfru Buxboms allerinteressanteste og paa en vis Maade
                allerfineste Bekjendtskaber; hun sagde vi om Herskabet, kunde
                fortælle om Baller, hvor der kom Prinser og Prinsesser, og vidste paa
                en Prik, om Damerne for Tiden brugte rundt eller firkantet Slæb."
            ],
        ];
    }

    public function deuData()
    {
        return [
            [
                "Da schritt der Zachenhesselhans zum Hackstock, um den Fichtenstamm zur
                Stütze für die östliche Giebelwand zu glätten. Wie der Schlag der Axt
                erklang und aus dem Walde zurückrief, lief ein Lächeln über des Alten
                Gesicht:"
            ],
        ];
    }

    public function engData()
    {
        return [
            [
                "As he spoke, his nimble fingers were flying here, there, and everywhere,
                feeling, pressing, unbuttoning, examining, while his eyes wore the same
                far-away expression which I have already remarked upon. So swiftly was
                the examination made, that one would hardly have guessed the minuteness
                with which it was conducted."
            ],
        ];
    }

    public function islData()
    {
        return [
            [
                "Kurteisi er eitt af því, sem konur meta mikils. Konan krefst þess, að
                henni sé veitt eftirtekt, að tekið sé tillit til hennar og henni sýnd
                kurteisi. En of mikið af öllu má þó gera, og of mikil kurteisi er
                hlægileg. Og karlmaður má aldrei gera sig hlægilegan í konuaugum."
            ],
        ];
    }

    public function nldData()
    {
        return [
            [
                "In de tweede helft der tweede eeuw n. Chr. heeft het ongeloof nog wel
                eenige voorstanders onder de wijsgeeren, maar het moet hoe langer hoe
                meer zwichten voor de onweerstaanbare macht der pythagoreïsche en
                platonische philosophie."
            ],
        ];
    }

    public function nobData()
    {
        return [
            [
                "Oline syntes vel ikke at Stunden var til at spøke i, aa hun selv var
                blit saa snytt og endog ved Gammel-Sivert sin Kiste hadde hun opbydd al
                sin seige Kraft og graatt Taarer. Eleseus visste jo selv bedst hvad han
                hadde skrevet: saa og saa meget til Oline, en Støttestav i hendes
                Alderdom -- hvor var Staven blit av? Lagt over et Knæ og brutt."
            ],
        ];
    }

    public function sweData()
    {
        return [
            [
                "Till svar snurrade mannen nästan runt, stannade sedan och stirrade
                enfaldigt på David. Hans ansikte blev med ens mycket rött. Vem säger så?
                frågade han nära på ödmjukt, med ett steg åt sidan som om han varit
                rädd."
            ],
        ];
    }
}
