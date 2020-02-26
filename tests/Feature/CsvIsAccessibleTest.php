<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CsvIsAccessibleTest extends TestCase
{
    /** @test */
    public function the_import_csv_is_accessible_via_the_inbound_disk()
    {
        $content = Storage::disk('inbound')->get('import.csv');

        $this->assertEquals(503, strlen($content));
    }
}
