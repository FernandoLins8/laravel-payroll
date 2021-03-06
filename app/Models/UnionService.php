<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnionService extends Model
{
    use HasFactory;
    protected $fillable = [
        'union_id',
        'description',
        'tax',
        'date'
    ];
}
