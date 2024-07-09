<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        $data = [
            'employee_id' => $this->id,
            'email' => $this->email,
        ];

        if ($request->method() == 'POST') {
            $data['created_at'] = $this->created_at;
        }

        return $data;
    }
}
