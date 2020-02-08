<?php

namespace Babylon\Tests\Unit\Detections\Latin;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class GaelicTest extends TestCase
{
    /**
     * @dataProvider cymData
     * @test
     */
    public function family_detect_cym($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('gaelic', $family);
    }

    /**
     * @dataProvider glaData
     * @test
     */
    public function family_detect_gla($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('gaelic', $family);
    }

    /**
     * @dataProvider gleData
     * @test
     */
    public function family_detect_gle($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('gaelic', $family);
    }

    /**
     * @dataProvider cymData
     * @test
     */
    public function language_detect_cym($text)
    {
        $this->assertEquals('cym', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider glaData
     * @test
     */
    public function language_detect_gla($text)
    {
        $this->assertEquals('gla', (new LanguageDetector())->detect($text));
    }

    /**
     * @dataProvider gleData
     * @test
     */
    public function language_detect_gle($text)
    {
        $this->assertEquals('gle', (new LanguageDetector())->detect($text));
    }

    public function cymData()
    {
        return [
            [
                "Yr wyf yn eistedd mewn ystafell hirgul, gyda nenfwd isel, a ffenestri yn edrych"
            ],
        ];
    }

    public function glaData()
    {
        return [
            [
                "B'iomadh neach 'n am measg nach do leag craobh riamh, agus a bha ni b'eòlaiche air"
            ],
        ];
    }

    public function gleData()
    {
        return [
            [
                "Ach do críochnuigheadh an dínnér agus tháinig deire na cainte agus d’eirigh an"
            ],
        ];
    }
}
