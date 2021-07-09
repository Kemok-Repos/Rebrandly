<?php

namespace Luisfergago\Rebrandlyvel\Tests;

use Luisfergago\Rebrandlyvel\Facades\Rebrandly;
use Luisfergago\Rebrandlyvel\RebrandlyServiceProvider;
use Orchestra\Testbench\TestCase as TestbenchTestCase;

class TestCase extends TestbenchTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            RebrandlyServiceProvider::class
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Rebrandly' => Rebrandly::class
        ];
    }
}
