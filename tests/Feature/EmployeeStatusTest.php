<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeStatusTest extends TestCase
{
    public function test_get_employees_request_status(): void
    {
        $response = $this->get('api/v1/employees');
        $response->assertStatus(405);
    }

    public function test_get_single_employee_request_status(): void
    {
        $response = $this->get('api/v1/employees/1');
        $response->assertStatus(405);
    }

    public function test_post_employees_request_status(): void
    {
        $response = $this->post('api/v1/employees');
        $response->assertStatus(422);
    }

    public function test_post_single_employee_request_status(): void
    {
        $response = $this->post('api/v1/employees/1');
        $response->assertStatus(405);
    }

    public function test_patch_employees_request_status(): void
    {
        $response = $this->patch('api/v1/employees');
        $response->assertStatus(405);
    }

    public function test_patch_single_employee_request_status(): void
    {
        $response = $this->patch('api/v1/employees/1');
        $response->assertStatus(405);
    }

    public function test_put_employees_request_status(): void
    {
        $response = $this->put('api/v1/employees');
        $response->assertStatus(405);
    }

    public function test_put_single_employee_request_status(): void
    {
        $response = $this->put('api/v1/employees/1');
        $response->assertStatus(405);
    }

    public function test_delete_employees_request_status(): void
    {
        $response = $this->delete('api/v1/employees');
        $response->assertStatus(405);
    }

    public function test_delete_single_employee_request_status(): void
    {
        $response = $this->delete('api/v1/employees/1');
        $response->assertStatus(405);
    }
}
