<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
      'category_id','subcategory_name',
    ];

    public function category(){
      return $this->belongsTo("App\Model\Category");
    }
}
