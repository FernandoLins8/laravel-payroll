<?php

namespace App\Models;

use App\Models\Hourly;
use App\Models\Salaried;
use App\Models\Commissioned;
use App\Models\EmployeeType;
use App\Models\UnionRegistration;

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

    public function type() {
        return $this->belongsTo(EmployeeType::class, 'employee_type_id');
    }

    public function payment_method() {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function salaried() {
        return $this->hasOne(Salaried::class);
    }

    public function commissioned() {
        return $this->hasOne(Commissioned::class);
    }

    public function hourly() {
        return $this->hasOne(Hourly::class);
    }

    public function union() {
        return $this->belongsTo(UnionRegistration::class);
    }
}
