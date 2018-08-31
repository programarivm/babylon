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
                "Und wenn alles nach Euren Spitzen schrie, was nicht mehr sein kann
                und niemals mehr sein wird, weil die Maschinen da sind, so werden die
                Zwischenhändler doch fett dabei und Ihr? Die Finger klöppelt Ihr Euch
                ab, und die Augen schaut Ihr Euch aus dabei, und den Hunger werdet Ihr
                nicht los vor dem Klöppelsacke!"
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
                "Þú hefir nú heyrt, hversu mentun og víðsýni eru gott vopn í höndum
                karlmanna, þegar þeir ætla að vinna hinn ramgerva kastala: konuhjartað,
                en að endingu vil eg benda þér á, hvað mörgum hættir við að misbeita
                því. Það er t.d. ekki sjaldgæft í samkvæmum að heyra menn slá sig til
                riddara með hinum og þessum afrekssögum um sjálfa sig. Þetta hendir
                jafnvel hina gáfuðustu menn. En slíkar sögur missa marks."
            ],
        ];
    }

    public function nldData()
    {
        return [
            [
                "Dat Maximus inzonderheid door magische kunsten zulk een ontzaglijken
                invloed op Julianus heeft uitgeoefend, dat deze het Christendom den rug
                toekeerde en de oude religie in eere trachtte te herstellen, blijkt ook
                uit de verhalen die dienaangaande bij de Christenen in omloop waren. Wij
                geven hier aan een tijdgenoot, den kerkvader Gregorius van Nazianze."
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
                "Han steg upp. Då först märkte han att han hade ett täcke över sig som ej
                funnits där kvällen förut. Han tittade i Terjes säng: där fanns intet
                täcke kvar. “Husfadern“ hade kastat det över främlingen då han gick.
                David begrep att denne Terje var en beprövad man, som ögonblickligen
                kunde avgöra med vem han hade att göra. Och dock förekom denna hastiga
                bekantskap honom som ett rent under."
            ],
        ];
    }
}
