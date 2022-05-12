<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncomeConfiguration extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'save',
        'tax',
        'general_expenses',
        'extra',
        'user_id'
    ];
}
