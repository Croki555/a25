<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnpaidSalaryResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            "employee_id" =>  $this->id,
            "amount" => $this->totalHours->sum('total_hours') * 200
        ];
    }
}
