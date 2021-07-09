<?php

namespace KemokRepos\Rebrandly\Tests\Unit;

use Rebrandly;
use KemokRepos\Rebrandly\Tests\TestCase;

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
