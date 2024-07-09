<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeJsonFormatMessageTest extends TestCase
{

    public function test_get_employees_json_format_message(): void
    {
        $response = $this->get('api/v1/employees');
        $response->assertStatus(405)
            ->assertHeader('Content-Type', 'application/json')
            ->assertExactJson([
                'error' => 'Метод не разрешён'
            ]);

        $response = $this->get('api/v1/employees/1');
        $response->assertStatus(405)
            ->assertHeader('Content-Type', 'application/json')
            ->assertExactJson([
                'error' => 'Метод не разрешён'
            ]);
    }

    public function test_post_employees_json_format_message(): void
    {
        $response = $this->post('api/v1/employees');
        $response->assertStatus(422)
            ->assertHeader('Content-Type', 'application/json')
            ->assertExactJson([
                "message" => "Ошибка валидации",
                "errors" => [
                    "email" => [
                        "Пожалуйста, укажите свой адрес электронной почты (email)."
                    ],
                    "password" => [
                        "Пожалуйста, заполните пароль (password)."
                    ]
                ]
            ]);
    }

    public function test_post_employees_data_json_format_message(): void
    {
        $data = [
            "email" => fake()->safeEmail(),
            "password" => "Password1"
        ];
        $response = $this->post('api/v1/employees', $data);

        $response->assertStatus(201)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonStructure([
                "employee_id",
                "email",
                "created_at"
        ]);

        $data = [
            "email" => 'emвфвail.ru',
            "password" => "password1"
        ];
        $response = $this->post('api/v1/employees', $data);

        $response->assertStatus(422)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonStructure([
                "message",
                "errors",
        ]);
    }
}

