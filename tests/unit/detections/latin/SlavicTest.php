<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class SlavicTest extends TestCase
{
    /**
     * @dataProvider cesData
     * @test
     */
    public function family_detect_ces($text)
    {
        $this->assertEquals('slavic', (new FamilyDetector($text))->detect());
    }

    /**
     * @dataProvider polData
     * @test
     */
    public function family_detect_pol($text)
    {
        $this->assertEquals('slavic', (new FamilyDetector($text))->detect());
    }

    /**
     * @dataProvider cesData
     * @test
     */
    public function language_detect_ces($text)
    {
        $this->assertEquals('ces', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider polData
     * @test
     */
    public function language_detect_pol($text)
    {
        $this->assertEquals('pol', (new LanguageDetector($text))->detect());
    }

    public function cesData()
    {
        return [
            [
                "A tak jednoho večera, když tma byla zvlášť hustá a neproniknutelná,
                Slávek se vydal na cestu k Dolině. Přehoupl se přes návrší, jež
                odděluje Spěchalovo údolí od silnice, minul Kubišův hostinec a
                pěšinkou se blížil k domovu."
            ],
        ];
    }

    public function polData()
    {
        return [
            [
                "Lecz o czem? -- o czem ona mówić mogła, pogrążona cała w drobnych
                kłopotach swego nędznego gospodarstwa, pomiędzy imbrykiem melisy
                a wiązką rzodkiewki. Instynktem zgadywała, że podobne przedmioty nie
                są odpowiednie dla jej eleganckiego koteczka, który w tej chwili
                tak delikatnie, tak ślicznie mieszał łyżeczką herbatę."
            ],
        ];
    }
}
