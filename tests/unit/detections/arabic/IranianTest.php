<?php

namespace Babylon\Tests\Unit\Detections\Arabic;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class IranianTest extends TestCase
{
    /**
     * @dataProvider fasData
     * @test
     */
    public function family_detect_fas($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('iranian', $family);
    }

    /**
     * @dataProvider fasData
     * @test
     */
    public function language_detect_fas($text)
    {
        $this->assertEquals('fas', (new LanguageDetector())->detect($text));
    }

    public function fasData()
    {
        return [
            [
                'من رفتم به اتاق خواب من و به دنبال توصیه های خود را. وقتی برگشتم با
                تپانچه جدول پاک شده بود و هولمز در خود مشغول بود
                شغل مورد علاقه از تراشیدن بر او ویولن.'
            ],
        ];
    }
}
