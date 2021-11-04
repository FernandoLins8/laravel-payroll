<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnionRegistration extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['id', 'union_tax'];

    public function employee() {
        return $this->hasOne(Employee::class, 'union_id', 'id');
    }
    
    public function services() {
        return $this->hasMany(UnionService::class, 'union_id', 'id');
    }
}
