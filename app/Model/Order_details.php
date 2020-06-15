<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    protected $fillable = [

    ];

    public function product(){
      return $this->belongsTo("App\Model\Product");
    }
}
