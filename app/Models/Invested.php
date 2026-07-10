<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invested extends Model
{
  protected $fillable = [
      'amount',
      'instrument',
      'cr_dr',
      'description',
  ];
}
