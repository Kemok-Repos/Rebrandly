<?php

namespace Luisfergago\Rebrandlyvel\Tests\Unit;

use Rebrandly;
use Luisfergago\Rebrandlyvel\Tests\TestCase;

class GreetTest extends TestCase
{
    /** @test */
    function it_retuns_the_greeting()
    {
        $this->assertEquals(
            "Hola desde mi primer paquete, Jorge",
            Rebrandly::greet()
        );
    }
}
