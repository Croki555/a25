<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UnpaidSalary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'hours',
    ];

    public static function totalUnpaidHoursByEmployee()
    {
        return static::select('employee_id', DB::raw('SUM(hours) as total_hours'))
            ->groupBy('employee_id');
    }
}
