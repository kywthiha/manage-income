<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncomeConfiguration extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'save_money_rate',
        'tax_money_rate',
        'general_expenses_rate',
        'extra_money_rate',
    ];
}
