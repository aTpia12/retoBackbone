<?php

namespace Tests\Feature;

use Tests\TestCase;

class ShowZipcodesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function test_show_zipcode()
    {
        $response = $this->get('api/zip-codes/91000');

        $response->assertStatus(200);
    }
}
