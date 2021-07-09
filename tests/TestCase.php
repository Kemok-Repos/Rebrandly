<?php

namespace KemokRepos\Rebrandly\Tests;

use KemokRepos\Rebrandly\Facades\Rebrandly;
use KemokRepos\Rebrandly\RebrandlyServiceProvider;
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
