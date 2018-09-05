<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use Babylon\Unicode;
use PHPUnit\Framework\TestCase;

class GaelicTest extends TestCase
{
    const DATA_FOLDER = __DIR__.'/../../../../dataset/input/alphabet/latin/gaelic';

    /**
     * @dataProvider cymData
     * @test
     */
    public function family_detect_cym($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('gaelic', $family);
    }

    /**
     * @dataProvider glaData
     * @test
     */
    public function family_detect_gla($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('gaelic', $family);
    }

    /**
     * @dataProvider gleData
     * @test
     */
    public function family_detect_gle($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('gaelic', $family);
    }

    /**
     * @dataProvider cymData
     * @test
     */
    public function language_detect_cym($text)
    {
        $this->assertEquals('cym', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider glaData
     * @test
     */
    public function language_detect_gla($text)
    {
        $this->assertEquals('gla', (new LanguageDetector($text))->detect());
    }

    /**
     * @dataProvider gleData
     * @test
     */
    public function language_detect_gle($text)
    {
        $this->assertEquals('gle', (new LanguageDetector($text))->detect());
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

    public function cymData()
    {
        return [
            [
                "Ni ddaeth tlodi ei hun, daeth clefyd trwm i Dan y Castell.  Daeth
                mam y penteulu yno, a bu farw dan y clefyd.  Daeth chwaer Dr. Ellis
                Evans i'w gwylio y nos tra'n gweithio yn ei lle y dydd.  Gorfod troi
                at y plwy am gymorth.  Dyma ddernyn o hanes yr amser hwnnw"
            ],
        ];
    }

    public function glaData()
    {
        return [
            [
                "An deigh do theaghlach tuineachadh air an fhearann, thoisicheadh iad air
                a reiteachadh 's air a ghlanadh. Mar thug sinn fainear cheana cha b' i
                obair shocrach so, gu h-àraidh far nach robh eòlas na tuaighe aig na
                daoine. Mar tha' n sean-fhacal ag radh."
            ],
        ];
    }

    public function gleData()
    {
        return [
            [
                "Ach, a Thighearna Easboig,” arsa Colla, “ní gádh dul chun na
                trioblóide sin i n-aon chor. Tá aithne mhaith ag Meargach ar Art le
                fada riamh. Dá mb’ é Art a gheóbhadh an eochair d’ aithneóch’ Meargach
                é le linn na h-eochrach a thabhairt dó."
            ],
        ];
    }

    public function txtData()
    {
        return [
            ['cym', 'cym.txt'],
            ['gla', 'gla.txt'],
            ['gle', 'gle.txt'],
        ];
    }
}
