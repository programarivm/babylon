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
        $this->assertEquals('ell', (new LanguageDetector($text))->detect());
    }

    public function ellData()
    {
        return [
            [
                "της οὐδὲ ἅρπαξ οὐδὲ ὑποκριτὴς οὐδὲ κακοήθης
                οὐδὲ ὑπερήφανος. Οὐ λήψῃ βουλὴν πονηρὰν
                κατὰ τοῦ πλησίον σου. Οὐ μισήσεις πάντα ἄν-
                θρωπον, ἀλλὰ οὓς μὲν ἐλέγξεις, περὶ δὲ ὧν προσ-
                εύξῃ, οὓς δὲ άγαπήσεις ὑπὲρ τὴν ψυχήν σου."
            ],
        ];
    }
}
