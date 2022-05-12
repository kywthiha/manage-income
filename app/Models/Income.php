<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'income',
        'save_money',
        'tax_money',
        'general_expenses',
        'extra_money',
        'total_extra_money',
        'date',
        'user_id',
        'income_configuration_id'
    ];
}
