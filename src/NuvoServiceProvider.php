<?php

namespace NuvoCode\Config;

use Illuminate\Support\ServiceProvider;
use NuvoCode\Config\Commands\VersionCommand;

class NuvoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                VersionCommand::class,
            ]);
        }
    }
}
