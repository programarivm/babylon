<?php

namespace Babylon\Tests\Unit\Detections;

use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class EllTest extends TestCase
{
    /**
     * @dataProvider ellData
     * @test
     */
    public function language_detect_ell($text)
    {
        $this->assertEquals('ell', (new LanguageDetector())->detect($text));
    }

    public function ellData()
    {
        return [
            [
                "της οὐδὲ ἅρπαξ οὐδὲ ὑποκριτὴς οὐδὲ κακοήθης
                οὐδὲ ὑπερήφανος. Οὐ λήψῃ βουλὴν πονηρὰν
                κατὰ τοῦ πλησίον σου."
            ],
        ];
    }
}
