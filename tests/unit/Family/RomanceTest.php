<?php

namespace Babylon\Tests\Unit\Family;

use Babylon\Family\Family;
use PHPUnit\Framework\TestCase;

class RomanceTest extends TestCase
{
    /**
     * @dataProvider fraData
     * @test
     */
    public function detect_fra($text)
    {
        $this->assertEquals('romance', (new Family($text))->detect());
    }

    /**
     * @dataProvider itaData
     * @test
     */
    public function detect_ita($text)
    {
        $this->assertEquals('romance', (new Family($text))->detect());
    }

    /**
     * @dataProvider porData
     * @test
     */
    public function detect_por($text)
    {
        $this->assertEquals('romance', (new Family($text))->detect());
    }

    /**
     * @dataProvider ronData
     * @test
     */
    public function detect_ron($text)
    {
        $this->assertEquals('romance', (new Family($text))->detect());
    }

    /**
     * @dataProvider spaData
     * @test
     */
    public function detect_spa($text)
    {
        $this->assertEquals('romance', (new Family($text))->detect());
    }

    public function fraData()
    {
        return [
            [
                "Entre autres, une feuille de papier, pliée avec soin, portait
                l'entête de la chancellerie danoise, avec la signature de
                M. Christiensen, consul à Hambourg et l'ami du professeur. Cela
                devait nous donner toute facilité d'obtenir à Copenhague des
                recommandations pour le gouverneur de l'Islande."
            ],
        ];
    }

    public function itaData()
    {
        return [
            [
                "— Via, mi fate perdere il filo con le vostre malignità. Che cosa
                dicevo? Ah dicevo che gli sforzi fatti per addomesticarlo erano
                falliti, che non era stato possibile di renderlo soggetto alle
                debolezze della sua età! A ventitrè anni, egli era."
            ],
        ];
    }

    public function porData()
    {
        return [
            [
                "Torvos luaceiros cardavam sobre as coisas, aspectos pardos e monacaes,
                d'esse tom vago, inquietador, inexplicavel, que permitte á imaginação
                de agigantar o que apenas entrevê."
            ],
        ];
    }

    public function ronData()
    {
        return [
            [
                "Pe pareti cu colb, pe podul cu lungi panze de painjen
                Roiesc plosnitele rosii, de ti-i drag sa te-uiti la ele!
                Greu li-i de mindir de paie, si apoi din biata-mi piele
                Nici ca au ce sa mai suga. - Intr-un roi mai de un stanjen"
            ],
        ];
    }

    public function spaData()
    {
        return [
            [
                "Mientras se hablaba de lo mucho bueno que había en la catedral y el
                lugareño se pasmaba y su señora repetía aquellas admiraciones, Obdulia
                se miraba como podía, en las altas cornucopias."
            ],
        ];
    }
}
