<?php

namespace Babylon\Tests\Unit\Detections\Cyrillic;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use Babylon\Unicode;
use PHPUnit\Framework\TestCase;

class IndoAryanTest extends TestCase
{
    /**
     * @dataProvider hinData
     * @test
     */
    public function family_detect_hin($text)
    {
        $unicodeRangename = (new Unicode($text))->mostFreq();
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
}
