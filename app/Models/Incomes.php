<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incomes extends Model
{
    protected $fillable = [
        'amount',
        'cr_dr',
        'category',
        'description',
    ];
}
