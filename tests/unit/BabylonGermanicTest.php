<?php

namespace Babylon\Tests;

use Babylon\Babylon;
use Babylon\Filter;
use PHPUnit\Framework\TestCase;

class BabylonGermanicTest extends TestCase
{
    /**
     * @dataProvider danData
     * @test
     */
    public function detect_dan($phrase)
    {
        $this->assertEquals('dan', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider deuData
     * @test
     */
    public function detect_deu($phrase)
    {
        $this->assertEquals('deu', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider engData
     * @test
     */
    public function detect_eng($phrase)
    {
        $this->assertEquals('eng', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider islData
     * @test
     */
    public function detect_isl($phrase)
    {
        $this->assertEquals('isl', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider nldData
     * @test
     */
    public function detect_nld($phrase)
    {
        $this->assertEquals('nld', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider nobData
     * @test
     */
    public function detect_nob($phrase)
    {
        $this->assertEquals('nob', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    /**
     * @dataProvider sweData
     * @test
     */
    public function detect_swe($phrase)
    {
        $this->assertEquals('swe', (new Babylon)->detect(Filter::phrase($phrase)));
    }

    public function danData()
    {
        return [
            [
                "Du beskyldte ham for at have stjålet cyklen. Drengen har mistet sit øre i en gadekamp."
            ],
            [
                "Alle drengene løb væk. Væk! Vi har ikke brug for mennesker af din slags."
            ],
            [
                "Jeg har brug for en nedstryger for at kunne færdiggøre dette arbejde. Dine brødre er særdeles gode i skolen."
            ],
            [
                "I mit ur er fjederen gået i stykker. Vær så venlig at vise mig vejen til stationen."
            ],
            [
                "På grund af mine korte ben er jeg nødt til at lægge alle de benklæder jeg køber op. Græd ikke. Gråd løser ikke noget."
            ],
        ];
    }

    public function deuData()
    {
        return [
            [
                "Ich werde es später gründlich nachschlagen und dir mailen. Ein gutes Sonderangebot hat gewöhnlich einen guten Profit für den Verkäufer zur Folge."
            ],
            [
                "Sie nahm es mit der Wahrheit nicht so genau. Wenn es um Ernährung und Gesundheit geht gibt es keine Kompromisse."
            ],
            [
                "Tom ist ein Romantiker der zu seinem Vergnügen Käse so herstellt wie es die Großmutter tat. Sie kümmerte sich gern um die Kinder."
            ],
            [
                "Er ist ein Mann den man nicht unterschätzen sollte. Es braucht mindestens ein ganzes Dorf damit ein Kind groß wird."
            ],
            [
                "Gott ist Geist und die ihn anbeten die müssen ihn im Geist und in der Wahrheit anbeten. Warum häufst du in deiner Wohnung jedweden Abfall an?"
            ],
        ];
    }

    public function engData()
    {
        return [
            [
                "Mary thought she might not be permitted to do that at night. Even if you're going through hard times."
            ],
            [
                "He has the most international caps but there are better players in the squad. Impossible things happen."
            ],
            [
                "Have you seen Tom this morning? I tried Buddhist meditation but I fell asleep through the session."
            ],
            [
                "Sami was born and raised on the quiet streets of a small town. I already told them that."
            ],
            [
                "Close the window before you leave. Before we wrap up we'll take some questions from the audience."
            ],
        ];
    }

    public function islData()
    {
        return [
            [
                "Tókíó sem er stærsta borgin í Japan er vakandi allan sólarhringinn. Á þriðjudaginn var virkilega kalt. Það er undir stólnum."
            ],
            [
                "Hún safnaði hundrað dollurum. Tom var ekki með. Takk fyrir að hafa komið. Farðu á markaðinn! Helvítis hvað ertu að gera? Þau giftast í næsta mánuði."
            ],
            [
                "Allt sem þú sagðir í tölvupóstinum er rétt að verðinu undanskildu. Þar sem hún er skrifuð á einfaldri ensku er bókin auðlesin. Bíllinn minn fer ekki í gang."
            ],
        ];
    }

    public function nldData()
    {
        return [
            [
                "Iedere man met een haarstukje heeft angst voor winderige dagen. Ik zou graag weten hoe je aan mijn telefoonnummer geraakt bent."
            ],
            [
                "Met de ogen zien we kijken we observeren we en lezen we. Gisteren zijn mijn vrouw en ik naar het theater geweest."
            ],
            [
                "Een persoon kan een ander persoon nooit helemaal begrijpen. De politie zal straks aankomen op de plaats van de misdaad."
            ],
            [
                "Niets houdt een man zo kwiek als een jonge echtgenote en oude vijanden. Wie een hond wil slaan vindt altijd een stok."
            ],
            [
                "Ik had het gevoel dat ik moest huilen toen ik het nieuws hoorde. Het valt te betwijfelen of deze methode zal werken."
            ],
        ];
    }

    public function nobData()
    {
        return [
            [
                "Jeg var ikke lenge der. Hun tar etter sin mor. Alle guttene er jevngamle. Pennen er på pulten. Enkelte sier at dersom du tråkker på en meitemark så begynner det å regne."
            ],
            [
                "De hadde et gammeldags system som de har flikket på i årevis og det ble mer og mer vanskeligere å finne kompetansen til å videreutvikle det."
            ],
            [
                "Hva som er bra er bra og hva som er best er det beste. Jeg gjemte meg i skapet. Hva skal jeg kjøpe? Det var ingen respons. Tom døde i sin velmakt."
            ],
            [
                "Tre timer senere slentret kongen rundt om i slottet etter noe å ta opp tiden med. Faen som jeg kjeder meg klaget han fortvilet."
            ],
            [
                "En dag spurte hun om jeg ville bli med henne hjem etter skoletid."
            ],
        ];
    }

    public function sweData()
    {
        return [
            [
                "De gjorde det hett för henne. En kvinna vars man har dött är en änka. Du dricker för mycket kaffe. Hur kunde Tom veta det?"
            ],
            [
                "Det är min cd-skiva. Vi kommer aldrig att ge upp kampen om lika rättigheter. Jag tror inte att det kommer att regna i eftermiddag."
            ],
            [
                "Hur lång ledighet kommer du att ha i jul? Mary kom inte hem igår kväll. Var god fyll i enkäten och skicka in den till oss."
            ],
            [
                "Denna punkt förtjänar särskild emfas. Han gjorde det i avsaknad av bättre vetande. Denna grusväg ska inom kort asfalteras."
            ],
            [
                "Markku bestämde att han inte skulle stå till tjänst nästa gång och inte någon annan gång heller. Te är en populär dryck över hela världen."
            ],
        ];
    }
}
