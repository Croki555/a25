<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class TransactionStoreRequest extends FormRequest
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
            'employee_id' => ['required', 'integer'],
            'hours' => ['required', 'integer',  'min:0']
        ];
    }

    public function messages(): array
    {
        return [
            'employee_id.required' => 'Пожалуйста, укажите id сотрудника (employee_id).',
            'employee_id.integer' => 'ID - сотрудника должно быть числом.',
            'hours.required' => 'Пожалуйста, укажите кол-во отработанных часов за день сотрудника (hours).',
            'hours.integer' => 'Отработанные часы работы - должны быть целым числом.',
            'hours.min' => 'Значение отработанных часов должно быть не менее нуля.'
        ];
    }
}
