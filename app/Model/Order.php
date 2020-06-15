<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'status'
    ];

    public function user(){
      return $this->belongsTo("App\User");
    }
}
