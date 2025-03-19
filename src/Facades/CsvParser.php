<?php

namespace GitFullStacker\CsvParser\Facades;

use Illuminate\Support\Facades\Facade;

class CsvParser extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'csv-parser';
    }
}
