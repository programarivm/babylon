<?php

namespace Babylon\Tests\Unit\Detections\Cyrillic;

use Babylon\Detector\FamilyDetector;
use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class IndoAryanTest extends TestCase
{
    /**
     * @dataProvider hinData
     * @test
     */
    public function family_detect_hin($text)
    {
        $family = (new FamilyDetector())->detect($text);

        $this->assertEquals('indo-aryan', $family);
    }

    /**
     * @dataProvider hinData
     * @test
     */
    public function language_detect_hin($text)
    {
        $this->assertEquals('hin', (new LanguageDetector())->detect($text));
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
