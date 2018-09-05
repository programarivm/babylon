<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use Babylon\Unicode;
use PHPUnit\Framework\TestCase;

class GermanicTest extends TestCase
{
    const DATA_FOLDER = __DIR__.'/../../../../dataset/input/alphabet/latin/germanic';

    /**
     * @dataProvider afrData
     * @test
     */
    public function family_detect_afr($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('germanic', $family);
    }

    /**
     * @dataProvider danData
     * @test
     */
    public function family_detect_dan($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('germanic', $family);
    }

    /**
     * @dataProvider deuData
     * @test
     */
    public function family_detect_deu($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('germanic', $family);
    }

    /**
     * @dataProvider engData
     * @test
     */
    public function family_detect_eng($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('germanic', $family);
    }

    /**
     * @dataProvider islData
     * @test
     */
    public function family_detect_isl($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('germanic', $family);
    }

    /**
     * @dataProvider nldData
     * @test
     */
    public function family_detect_nld($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('germanic', $family);
    }

    /**
     * @dataProvider nobData
     * @test
     */
    public function family_detect_nob($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('germanic', $family);
    }

    /**
     * @dataProvider sweData
     * @test
     */
    public function family_detect_swe($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('germanic', $family);
    }

    /**
     * @dataProvider afrData
     * @test
     */
    public function language_detect_afr($text)
    {
        $this->assertEquals('afr', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider danData
     * @test
     */
    public function language_detect_dan($text)
    {
        $this->assertEquals('dan', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider deuData
     * @test
     */
    public function language_detect_deu($text)
    {
        $this->assertEquals('deu', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider engData
     * @test
     */
    public function language_detect_eng($text)
    {
        $this->assertEquals('eng', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider islData
     * @test
     */
    public function language_detect_isl($text)
    {
        $this->assertEquals('isl', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider nldData
     * @test
     */
    public function language_detect_nld($text)
    {
        $this->assertEquals('nld', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider nobData
     * @test
     */
    public function language_detect_nob($text)
    {
        $this->assertEquals('nob', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider sweData
     * @test
     */
    public function language_detect_swe($text)
    {
        $this->assertEquals('swe', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider txtData
     * @test
     */
    public function language_detect($isoCode, $filename)
    {
        $text = file_get_contents(self::DATA_FOLDER."/$filename");

        $this->assertEquals($isoCode, (new LanguageDetector($text))->detect());
    }

    public function afrData()
    {
        return [
            [
                "Hierdie vierde druk is dus meer dan ’n blote herdruk,
                nie alleen omdat dit ’n uitgebreider en meer
                oorsigtelike keuse bevat as die vorige drie nie, maar
                ook omdat die oorspronklike keuse hier en daar gewysig
                is volgens latere insigte."
            ],
        ];
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
                Zwischenhändler doch fett dabei und Ihr?"
            ],
        ];
    }

    public function engData()
    {
        return [
            [
                "As he spoke, his nimble fingers were flying here, there, and everywhere,
                feeling, pressing, unbuttoning, examining, while his eyes wore the same
                far-away expression which I have already remarked upon."
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
                því."
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
                uit de verhalen die dienaangaande bij de Christenen in omloop waren."
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
                hadde skrevet."
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
                David begrep att denne Terje var en beprövad man."
            ],
        ];
    }

    public function txtData()
    {
        return [
            ['afr', 'afr.txt'],
            ['dan', 'dan.txt'],
            ['deu', 'deu.txt'],
            ['eng', 'eng.txt'],
            ['isl', 'isl.txt'],
            ['nld', 'nld.txt'],
            ['nob', 'nob.txt'],
            ['swe', 'swe.txt'],
        ];
    }
}
