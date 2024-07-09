<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UnpaidSalaryResource;
use App\Models\Employee;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UnpaidSalariesController extends Controller
{
    public function index()
    {
        $employeeTotals = Employee::with('totalHours')->get();

        $response = $employeeTotals->filter(function($employee) {
            return $employee->totalHours->sum('total_hours') > 0;
        })->map(function($employee) {
            return new UnpaidSalaryResource($employee);
        })->values();

        return response()->json([
            "data" => $response->values()
        ], $response->isNotEmpty() ? 200 : ResponseAlias::HTTP_NO_CONTENT);
    }

    public function store()
    {
        return response()->json(['error' => 'Метод не разрешён'], ResponseAlias::HTTP_METHOD_NOT_ALLOWED);
    }

    public function show()
    {
        return response()->json(['error' => 'Метод не разрешён'], ResponseAlias::HTTP_METHOD_NOT_ALLOWED);
    }

    public function update()
    {
        return response()->json(['error' => 'Метод не разрешён'], ResponseAlias::HTTP_METHOD_NOT_ALLOWED);
    }

    public function destroy()
    {
        return response()->json(['error' => 'Метод не разрешён'], ResponseAlias::HTTP_METHOD_NOT_ALLOWED);
    }
}
