<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionStoreRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Employee;
use App\Models\Transaction;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TransactioncController extends Controller
{
    public function store(TransactionStoreRequest $request, Transaction $transaction)
    {
        ['employee_id' => $id, 'hours' => $hours] = $request->validated();

        $employee =  Employee::find($id);
        if(!$employee) {
            return response()->json([
                'message' => "Сотрудник не найден с ID - $id",
            ], ResponseAlias::HTTP_NOT_FOUND);
        }
        $newTransaction = $transaction->createTransaction($id, $hours);

        $resource = new TransactionResource($newTransaction);

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

    public function destroy()
    {
        return response()->json(['error' => 'Метод не разрешён'], ResponseAlias::HTTP_METHOD_NOT_ALLOWED);
    }

    public function update()
    {
        return response()->json(['error' => 'Метод не разрешён'], ResponseAlias::HTTP_METHOD_NOT_ALLOWED);
    }
}
