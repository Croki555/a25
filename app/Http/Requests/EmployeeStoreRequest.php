<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class EmployeeStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = new JsonResponse([
            'message' => 'Ошибка валидации',
            'errors' => $validator->errors()
        ], 422);

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }


    public function rules(): array
    {
        return [
            'email' => ['required', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', 'unique:employees,email'],
            'password' => ['required', 'min:5', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/u']
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Пожалуйста, укажите свой адрес электронной почты (email).',
            'email.regex' => 'Неверный формат электронной почты (email).',
            'email.unique' => 'Данный электронной адрес занят.',
            'password.required' => 'Пожалуйста, заполните пароль (password).',
            'password.min' => 'Минимальная длина пароля 5 символов.',
            'password.regex' => 'Пароль должен состоять из латинских букв и цифр. Иметь как минимум одну прописную букву, одну заглавную букву и одну цифру.'
        ];
    }
}
