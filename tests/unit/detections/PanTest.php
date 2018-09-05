<?php

namespace Babylon\Tests\Unit\Detections;

use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class PanTest extends TestCase
{
    /**
     * @dataProvider panData
     * @test
     */
    public function language_detect_pan($text)
    {
        $this->assertEquals('pan', (new LanguageDetector($text))->detect());
    }

    public function panData()
    {
        return [
            [
                "ਸਵਾਲ ਇਹ ਸੀ ਕਿ ਇੱਕ ਅਣਜਾਣ ਕੈਦੀ ਦੀ ਪਛਾਣ ਕਿਵੇਂ ਕਰਨੀ ਹੈ.
                ਮੈਂ ਚੌਵੀ ਦਰਿਆ ਵਿੱਚ ਇਹ ਕਰ ਸਕਦਾ ਸੀ ਘੰਟੇ"
            ],
        ];
    }
}
