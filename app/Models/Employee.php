<?php

namespace App\Models;

use App\Models\EmployeeType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'payment_method_id',
        'employee_type_id',
        'schedule_id',
        'union_id',
    ];

    public function type()
    {
        return $this->belongsTo(EmployeeType::class, 'employee_type_id');
    }

}
