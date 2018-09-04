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
        $this->assertEquals('ben', (new LanguageDetector($text))->detect());
    }

    public function benData()
    {
        return [
            [
                "আমি জিজ্ঞাসা করলাম, আমি কি সেই লোক খুঁজছি?
                ধীরে ধীরে, স্পষ্টভাবে পরিহিত ব্যক্তি যিনি ধীরে ধীরে হেঁটে হেঁটে যাচ্ছিলেন
                রাস্তার অন্য পাশে, সংখ্যাটি নিয়ে উদ্বিগ্ন। তার ছিল
                তার হাতের একটি বড় নীল লিফট, এবং স্পষ্টত একটি একটি বাহক ছিল
                বার্তা।"
            ],
        ];
    }
}
