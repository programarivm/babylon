<?php

namespace Babylon\Tests\Unit\Detections\Cyrillic;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;
use UnicodeRanges\Analyzer;

class IndoAryanTest extends TestCase
{
    const DATA_FOLDER = __DIR__.'/../../../../dataset/input/alphabet/devanagari/indo-aryan';

    /**
     * @dataProvider hinData
     * @test
     */
    public function family_detect_hin($text)
    {
        $unicodeRangename = (new Analyzer($text))->mostFreq();
        $family = (new FamilyDetector($text, $unicodeRangename))->detect();

        $this->assertEquals('indo-aryan', $family);
    }

    /**
     * @dataProvider hinData
     * @test
     */
    public function language_detect_hin($text)
    {
        $this->assertEquals('hin', (new LanguageDetector($text))->detect());
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

    public function hinData()
    {
        return [
            [
                'एक अच्छा चलने के बाद, जब मैं के घर में गया
                मिस्टर मेरे चाचा की कंपनी में पहले से ही था उनकी
                होस्ट.'
            ],
        ];
    }

    public function txtData()
    {
        return [
            ['hin', 'hin.txt'],
        ];
    }
}
