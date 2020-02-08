<?php

namespace Babylon\Tests\Unit\Detections;

use Babylon\Detector\LanguageDetector;
use PHPUnit\Framework\TestCase;

class KhmTest extends TestCase
{
    /**
     * @dataProvider khmData
     * @test
     */
    public function language_detect_kor($text)
    {
        $this->assertEquals('khm', (new LanguageDetector())->detect($text));
    }

    public function khmData()
    {
        return [
            [
                "ប្រាកដណាស់ខ្ញុំបានឆ្លើយហើយការសន្ទនាបានរសាត់ទៅជារឿងផ្សេង ឆានែល។"
            ],
        ];
    }
}
