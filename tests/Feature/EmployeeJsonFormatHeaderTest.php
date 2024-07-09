<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeJsonFormatHeaderTest extends TestCase
{

    public function test_get_employees_json_format_header(): void
    {
        $response = $this->get('api/v1/employees');
        $response->assertStatus(405)
            ->assertHeader('Content-Type', 'application/json');
    }

    public function test_post_employees_json_format_header(): void
    {
        $response = $this->post('api/v1/employees');
        $response->assertStatus(422)
            ->assertHeader('Content-Type', 'application/json');
    }

    public function test_patch_employees_json_format_header(): void
    {
        $response = $this->patch('api/v1/employees/1');
        $response->assertStatus(405)
            ->assertHeader('Content-Type', 'application/json');
    }

    public function test_put_employees_json_format_header(): void
    {
        $response = $this->put('api/v1/employees/1');
        $response->assertStatus(405)
            ->assertHeader('Content-Type', 'application/json');
    }

    public function test_delete_employees_json_format_header(): void
    {
        $response = $this->delete('api/v1/employees/1');
        $response->assertStatus(405)
            ->assertHeader('Content-Type', 'application/json');
    }

}
