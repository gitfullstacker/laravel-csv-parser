<?php

namespace GitFullStacker\CsvParser;

use Illuminate\Support\Collection;
use League\Csv\Reader;

class CsvParser
{
    public static function parse($path, $delimiter = ';')
    {
        $rows = [];

        if (!file_exists($path) || !is_readable($path)) {
            return $rows;
        }

        if (($handle = fopen($path, 'r')) !== false) {
            $headers = fgetcsv($handle, 0, $delimiter, '"', '\\');

            while (($data = fgetcsv($handle, 0, $delimiter, '"', '\\')) !== false) {
                if (count($data) === count($headers)) {
                    $rows[] = array_combine($headers, $data);
                }
            }

            fclose($handle);
        }

        return $rows;
    }
}
