<?php

namespace KemokRepos\Rebrandlyvel\Tests;

use KemokRepos\Rebrandlyvel\Facades\Rebrandly;
use KemokRepos\Rebrandlyvel\RebrandlyServiceProvider;
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
