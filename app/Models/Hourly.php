<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\Timecard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hourly extends Model
{
    use HasFactory;
    protected $table = 'hourly';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function timecards() {
        return $this->hasMany(Timecard::class, 'employee_id', 'employee_id');
    }
}
