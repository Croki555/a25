<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UnpaidSalaryJsonFormatMessageTest extends TestCase
{
    public function test_get_transactions_json_format_message(): void
    {
        $response = $this->get('api/v1/unpaid-salaries');
        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonStructure([
                "data" => [
                    [
                        "employee_id",
                        "amount"
                    ]
                ]
            ]);
    }
}
