<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'product_name','category_id','subcategory_id','brand_id','product_code','product_quantity','selling_price','discount_price','product_color','porduct_size','thambnail_picture','product_details','video_link','main_slider','hot_deal','best_rated','mid_slider','hot_new','trend','status',
    ];

    public function category(){
      return $this->belongsTo("App\Model\Category");
    }

    public function subcategory(){
      return $this->belongsTo("App\Model\Subcategory");
    }

    public function brand(){
      return $this->belongsTo("App\Model\Brand");
    }

    public function muli_pictures(){
      return $this->hasMany("App\Model\Multiple_product_picture");
    }
}
