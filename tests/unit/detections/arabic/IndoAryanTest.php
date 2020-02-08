<?php

namespace Babylon\Tests\Unit\Detections\Arabic;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class IndoAryanTest extends TestCase
{
    /**
     * @dataProvider urdData
     * @test
     */
    public function family_detect_urd($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('indo-aryan', $family);
    }

    /**
     * @dataProvider urdData
     * @test
     */
    public function language_detect_urd($text)
    {
        $this->assertEquals('urd', (new LanguageDetector())->detect($text));
    }

    public function urdData()
    {
        return [
            [
                'میں اپنی گفتگو کا اہنکاری طرز پر اب بھی ناراض تھی ۔ میرا یہ خیال تھا کہ
                اس موضوع کو تبدیل کرنے کے لیے بہترین ہے ۔'
            ],
        ];
    }
}
