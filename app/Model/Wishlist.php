<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [

    ];

    public function product(){
      return $this->belongsTo("App\Model\Product");
    }
}
