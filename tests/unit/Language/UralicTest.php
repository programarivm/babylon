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
        $this->assertEquals('fin', (new Language($text))->detect());
    }

    /**
     * @dataProvider hunData
     * @test
     */
    public function detect_hun($text)
    {
        $this->assertEquals('hun', (new Language($text))->detect());
    }

    public function finData()
    {
        return [
            [
                "En voi! hän sanoo. En voi nyt... voimani ovat lopussa! Onneton olen!
                Ja onneton on Anna Erastovnakin! Me rakastimme toisiamme, lupauduimme
                toisillemme, mutta pahat ihmiset erottivat meidät säälittä. Menkää
                matkoihinne, Erast Ivanovitsh! Minä en voi sietää teitä!"
            ],
        ];
    }

    public function hunData()
    {
        return [
            [
                "A csillár ezer mécsese repkedő tűzcsíkokat szórt a kristály-kancsókra s
                a karcsu bronz-oszlopok árnyékából bronz szinü törpék lépkedtek elő,
                arany tálakkal a vállukon. A nagy ebédlő négy sarkában, ezüstből
                faragott póznákon, drága fűszerszámok égtek."
            ],
        ];
    }
}
