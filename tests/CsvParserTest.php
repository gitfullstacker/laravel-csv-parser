<?php

use PHPUnit\Framework\TestCase;
use GitFullStacker\CsvParser\CsvParser;

class CsvParserTest extends TestCase
{
    public function testParsesCsvFileIntoCollection()
    {
        $csvContent = <<<CSV
name,email
John Doe,john@example.com
Jane Smith,jane@example.com
CSV;

        $tempFile = tempnam(sys_get_temp_dir(), 'csv');
        file_put_contents($tempFile, $csvContent);

        $result = CsvParser::parse($tempFile);

        $this->assertInstanceOf(Illuminate\Support\Collection::class, $result);
        $this->assertCount(2, $result);

        $first = $result->first();
        var_dump($first);
        $this->assertEquals('John Doe', $first['name']);
        $this->assertEquals('john@example.com', $first['email']);

        unlink($tempFile);
    }

    public function testThrowsExceptionIfFileNotFound()
    {
        $this->expectException(Exception::class);
        CsvParser::parse('/invalid/path/to/file.csv');
    }
}
