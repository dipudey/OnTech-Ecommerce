<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog_category extends Model
{
    protected $fillable = [
      'category_name_en','category_name_bn'
    ];
}
