<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $fillable = [
        'amount',
        'cr_dr',
        'allocate',
        'allocated_purpose',
        'type',
        'category',
        'description',
        ];
}
