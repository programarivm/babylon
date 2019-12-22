<?php

namespace Babylon\Tests\Unit\Detections\Arabic;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;
use UnicodeRanges\Analyzer;

class IndoAryanTest extends TestCase
{
    const DATA_FOLDER = __DIR__.'/../../../../dataset/input/alphabet/arabic/indo-aryan';

    /**
     * @dataProvider urdData
     * @test
     */
    public function family_detect_urd($text)
    {
        $unicodeRangename = (new Analyzer($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('indo-aryan', $family);
    }

    /**
     * @dataProvider urdData
     * @test
     */
    public function language_detect_urd($text)
    {
        $this->assertEquals('urd', (new LanguageDetector($text))->detect());
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

    public function urdData()
    {
        return [
            [
                'میں اپنی گفتگو کا اہنکاری طرز پر اب بھی ناراض تھی ۔ میرا یہ خیال تھا کہ
                اس موضوع کو تبدیل کرنے کے لیے بہترین ہے ۔'
            ],
        ];
    }

    public function txtData()
    {
        return [
            ['urd', 'urd.txt'],
        ];
    }
}
