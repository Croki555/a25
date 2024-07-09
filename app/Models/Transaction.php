<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Transaction extends Model
{
    use HasFactory;

    public function createTransaction(int $employeeId, int $hours)
    {
        $transaction = new Transaction();
        $transaction->employee_id = $employeeId;
        $transaction->hours = $hours;
        $transaction->save();
        return $transaction;
    }
}
