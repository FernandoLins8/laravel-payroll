<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timecard extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'working_hours',
        'employee_id'
    ];

    public function hourly() {
        return $this->belongsTo(Hourly::class, 'employee_id', 'employee_id');
    }
}
