<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $data = [
            'employee_id' => $this->employee_id,
            'hours' => $this->hours,
        ];

        if ($request->method() == 'POST') {
            $data['created_at'] = $this->created_at;
        }

        return $data;
    }
}
