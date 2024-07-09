<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'employees' => EmployeeController::class,
    'transactions' => TransactioncController::class,
    'unpaid-salaries' => UnpaidSalariesController::class,
    'pay-salaries'=> PaySalaryController::class
]);



