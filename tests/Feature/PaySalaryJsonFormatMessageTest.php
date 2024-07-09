<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PaySalaryJsonFormatMessageTest extends TestCase
{
    public function test_post_pay_salaries_json_format_message(): void
    {
        $response = $this->post('api/v1/pay-salaries');
        $response->assertStatus(204)
            ->assertHeaderMissing('Content-Type');
    }
}
