<?php

namespace Babylon\Tests\Unit\Language;

use Babylon\Filter;
use Babylon\Language\Language;
use PHPUnit\Framework\TestCase;

class UralicTest extends TestCase
{
    /**
     * @dataProvider finData
     * @test
     */
    public function detect_fin($text)
    {
        $this->assertEquals('fin', (new Language($text))->detect();
    }

    /**
     * @dataProvider hunData
     * @test
     */
    public function detect_hun($text)
    {
        $this->assertEquals('hun', (new Language($text))->detect();
    }

    public function finData()
    {
        return [
            [
                "Hyvän opettajan täytyy olla kärsivällinen oppilaidensa kanssa. Minulla on tylsää. Tehdään jotain hauskaa."
            ],
            [
                "Perinpohjainen tietokonejärjestelmien ja ohjelmointikielten tuntemus on olennainen osa Tomin työtä. Älähän nyt itke. Minuakin alkaa itkettää kun näen sinun itkevän."
            ],
            [
                "Kaiken maailman sörsseleitä täällä yritetäänkin ihmiselle syöttää! Tämä on aivan kauheaa mössöä. Minun pitää kysyä sinulta monta kysymystä."
            ],
            [
                "Turvallisuussyistä varmista että luet ohjekirjan ennen tämän tuotteen käyttämistä. Jos kyseessä on oikea kanadalainen niin hän ei varmasti sanoisi mitään tuollaista."
            ],
            [
                "Tässä on sinulle aakkosellinen luettelo kaikista niistä suomen kielen sanoista jotka eivät esiinny. Olen nälkäinen sillä en ole syönyt lounasta."
            ],
        ];
    }

    public function hunData()
    {
        return [
            [
                "Ez egy praktikus lexikon hogy utánanézzünk bizonyos dolgoknak. Úgy látszik most mindenki a tengerpartra szeretne utazni fürödni feküdni és napozni a strandon."
            ],
            [
                "Most tényleg nincs időm ilyen hosszadalmas eszmefuttatáshoz és különben sincs semmi kedvem hozzá. A szavak mint kulcsok ajtókat képesek kinyitni vagy bezárni."
            ],
            [
                "Egy olyan világban élünk ahol a rámenős emberek és az erőszakos népek jobban érvényesülnek. A Seuso-kincseket megtaláló kiskatona felaksztotta magát egy ajtókilincsre."
            ],
            [
                "Csak egy menekült vagyok aki az angol nyelvet próbálja megvédeni azoktól kiknek az az anyanyelve. Tomnak soha nem kellett volna otthagynia az állását."
            ],
            [
                "Tamás és Mária magukat liberális szülőknek tartják így a gyerekeikre bízzák a döntést. Vége lett a forró nyári napoknak és a helyükbe hűvös őszi napok léptek."
            ],
        ];
    }
}
