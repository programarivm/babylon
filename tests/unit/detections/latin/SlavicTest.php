<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use Babylon\Unicode;
use PHPUnit\Framework\TestCase;

class SlavicTest extends TestCase
{
    const DATA_FOLDER = __DIR__.'/../../../../dataset/input/alphabet/latin/slavic';

    /**
     * @dataProvider cesData
     * @test
     */
    public function family_detect_ces($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('slavic', $family);
    }

    /**
     * @dataProvider polData
     * @test
     */
    public function family_detect_pol($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('slavic', $family);
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

    /**
     * @dataProvider txtData
     * @test
     */
    public function language_detect($isoCode, $filename)
    {
        $text = file_get_contents(self::DATA_FOLDER."/$filename");

        $this->assertEquals($isoCode, (new LanguageDetector($text))->detect());
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

    public function txtData()
    {
        return [
            ['ces', 'ces.txt'],
            ['pol', 'pol.txt'],
        ];
    }
}
