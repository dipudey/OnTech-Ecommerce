<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [

    ];

    public function user(){
      return $this->belongsTo("App\User");
    }

    public function product(){
      return $this->belongsTo("App\Model\Product");
    }
}
