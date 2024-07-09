<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class EmployeeController extends Controller
{

    public function store(EmployeeStoreRequest $request, Employee $employee)
    {
        ['email' => $email, 'password' => $password] = $request->validated();
        $newEmployee = $employee->createEmployee($email, $password);
        $resource = new EmployeeResource($newEmployee);

        return response($resource, ResponseAlias::HTTP_CREATED)
            ->header('Content-Type', 'application/json');
    }

    public function index()
    {
        return response()->json(['error' => 'Метод не разрешён'], ResponseAlias::HTTP_METHOD_NOT_ALLOWED);
    }

    public function show()
    {
        return response()->json(['error' => 'Метод не разрешён'], ResponseAlias::HTTP_METHOD_NOT_ALLOWED);
    }

    public function update(Request $request)
    {
        return response()->json(['error' => 'Метод не разрешён'], ResponseAlias::HTTP_METHOD_NOT_ALLOWED);
    }

    public function destroy()
    {
        return response()->json(['error' => 'Метод не разрешён'], ResponseAlias::HTTP_METHOD_NOT_ALLOWED);
    }
}
