<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionJsonFormatMessageTest extends TestCase
{

    public function test_get_transactions_json_format_message(): void
    {
        $response = $this->get('api/v1/transactions');
        $response->assertStatus(405)
            ->assertHeader('Content-Type', 'application/json')
            ->assertExactJson([
                'error' => 'Метод не разрешён'
            ]);

        $response = $this->get('api/v1/transactions/1');
        $response->assertStatus(405)
            ->assertHeader('Content-Type', 'application/json')
            ->assertExactJson([
                'error' => 'Метод не разрешён'
            ]);
    }

    public function test_post_transactions_json_format_message(): void
    {
        $response = $this->post('api/v1/transactions');
        $response->assertStatus(422)
            ->assertHeader('Content-Type', 'application/json')
            ->assertExactJson([
                "message" => "Ошибка валидации",
                "errors" => [
                    "employee_id" => [
                        "Пожалуйста, укажите id сотрудника (employee_id)."
                    ],
                    "hours" => [
                        "Пожалуйста, укажите кол-во отработанных часов за день сотрудника (hours)."
                    ]
                ]
            ]);
    }

    public function test_post_transactions_data_json_format_message(): void
    {
        $data = [
            "employee_id" => 1,
            "hours" => fake()->numberBetween(10, 50)
        ];
        $response = $this->post('api/v1/transactions', $data);

        $response->assertStatus(201)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonStructure([
                "employee_id",
                "hours",
                "created_at"
            ]);

        $data = [
            "employee_id" => 155,
            "hours" => fake()->numberBetween(10, 50)
        ];
        $response = $this->post('api/v1/transactions', $data);

        $response->assertStatus(404)
            ->assertHeader('Content-Type', 'application/json')
            ->assertExactJson([
                "message" => "Сотрудник не найден с ID - " . $data["employee_id"]
            ]);
    }
}
