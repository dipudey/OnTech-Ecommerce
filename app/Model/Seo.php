<?php

namespace App\MOdel;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = [
      'meta_title','meta_author','meta_tag','meta_description','google_analytics','bing_analytics'
    ];
}
