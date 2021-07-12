<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

/**
 * @group Dynamic Data
 */
class DynamicDataTest extends TestCase
{

    /**
     * Get dynamic data
     *
     * This is a description of a dynamic data endpoint
     *
     * @header X-Api-Version v0.1.0
     * @urlParam name string required The name of the dynamic data.
     * @dataProvider myDataProvider
     */
    public function test_dynamic_data($name)
    {
        $response = $this->get("api/dynamic_data/{$name}");

        $response
        ->assertOk()
        ->assertJson([
            'name' => $name,
        ]);
    }

    public function myDataProvider()
    {
        return [
            ['hello'],
            ['world'],
        ];
    }
}
