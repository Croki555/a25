<?php

namespace App\Models;

use App\Http\Resources\EmployeeResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function createEmployee(string $email, string $password)
    {
        $employee = new Employee();
        $employee->email = $email;
        $employee->password = Hash::make($password);
        $employee->save();
        return $employee;
    }

    public function totalHours()
    {
        return $this->hasMany(Transaction::class, 'employee_id')
            ->selectRaw('employee_id, SUM(hours) as total_hours')
            ->groupBy('employee_id');
    }

}
