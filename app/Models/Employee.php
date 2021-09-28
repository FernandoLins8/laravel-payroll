<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
