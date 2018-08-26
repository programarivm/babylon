<?php

namespace Babylon\Tests;

use Babylon\Babylon;
use PHPUnit\Framework\TestCase;

class BabylonTest extends TestCase
{
    /**
     * @test
     */
    public function predict_hello_there()
    {
        $prediciton = (new Babylon)->predict('hello there');

        $this->assertEquals('eng', $prediction);
    }
}
