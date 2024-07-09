<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PaySalaryController extends Controller
{

    public function index()
    {
        return response()->json(['error' => 'Метод не разрешён'], ResponseAlias::HTTP_METHOD_NOT_ALLOWED);
    }

    public function store()
    {
        Transaction::all()->each->delete();
        return response(null, ResponseAlias::HTTP_NO_CONTENT);
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
