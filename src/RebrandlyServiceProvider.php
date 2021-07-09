<?php

namespace KemokRepos\Rebrandly;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use KemokRepos\Rebrandly\Client\RebrandlyClient;

class RebrandlyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            $this->basePath('/../config/rebrandly.php') => base_path('config/rebrandly.php')
        ], 'rebrandly-config');
    }

    public function register()
    {
        $this->app->singleton('rebrandly', function () {
            return new RebrandlyClient(
                new Client(),
                $this->app->make('config')->get('rebrandly.apikey', ''),
            );
        });

        $this->mergeConfigFrom(
            $this->basePath('config/rebrandly.php'),
            'rebrandly'
        );
    }

    protected function basePath($path = '')
    {
        return __DIR__ . '/../' . $path;
    }
}
