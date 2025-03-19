<?php

namespace GitFullStacker\CsvParser;

use Illuminate\Support\Collection;
use League\Csv\Reader;

class CsvParser
{
    public static function parse(string $filePath, string $delimiter = ','): Collection
    {
        if (!file_exists($filePath)) {
            throw new \Exception("CSV file not found: " . $filePath);
        }

        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setDelimiter($delimiter);
        $csv->setHeaderOffset(0);

        return collect(iterator_to_array($csv->getRecords()));
    }
}
