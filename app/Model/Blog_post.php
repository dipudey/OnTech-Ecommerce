<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog_post extends Model
{
    protected $fillable = [
      'blog_category_id','post_title_en','post_title_bn','post_picture','post_details_en','post_details_bn'
    ];

    public function blogcategory(){
      return $this->hasOne("App\Model\Blog_category",'id','blog_category_id');
    }
}
