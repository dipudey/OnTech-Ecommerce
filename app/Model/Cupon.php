<?php

namespace App\MOdel;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $fillable = [
      'cupon','discount','validity_till',
    ];
}
