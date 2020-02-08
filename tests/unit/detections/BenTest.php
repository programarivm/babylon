<?php

namespace Babylon\Tests\Unit\Detections;

use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class BenTest extends TestCase
{
    /**
     * @dataProvider benData
     * @test
     */
    public function language_detect_ben($text)
    {
        $this->assertEquals('ben', (new LanguageDetector())->detect($text));
    }

    public function benData()
    {
        return [
            [
                "আমি জিজ্ঞাসা করলাম, আমি কি সেই লোক খুঁজছি?
                ধীরে ধীরে, স্পষ্টভাবে পরিহিত ব্যক্তি যিনি ধীরে ধীরে হেঁটে হেঁটে যাচ্ছিলেন"
            ],
        ];
    }
}
