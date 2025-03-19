<?php

namespace GitFullStacker\CsvParser;

use Illuminate\Support\ServiceProvider;

class CsvParserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('csv-parser', function () {
            return new CsvParser();
        });
    }
}
