<?php

use GitFullStacker\CsvParser\CsvParser;
use PHPUnit\Framework\TestCase;

class CsvParserTest extends TestCase
{
    /** @test */
    public function it_parses_csv_with_semicolon_delimiter_correctly()
    {
        // Prepare sample CSV content with semicolon delimiter
        $csvContent = <<<CSV
Sede;Nome sede;Aperte
AG01;AGRIGENTO;0
RM02;ROMA;5
CSV;

        // Create a temp file
        $tempPath = tempnam(sys_get_temp_dir(), 'csv');
        file_put_contents($tempPath, $csvContent);

        // Call the parser
        $parsed = CsvParser::parse($tempPath, ';');

        // Assert parsed data
        $this->assertCount(2, $parsed);

        $this->assertEquals([
            'Sede' => 'AG01',
            'Nome sede' => 'AGRIGENTO',
            'Aperte' => '0',
        ], $parsed[0]);

        $this->assertEquals([
            'Sede' => 'RM02',
            'Nome sede' => 'ROMA',
            'Aperte' => '5',
        ], $parsed[1]);

        // Clean up
        unlink($tempPath);
    }
}
