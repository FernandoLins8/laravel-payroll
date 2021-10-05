<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commissioned extends Model
{
    use HasFactory;
    protected $table = 'commissioned';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
