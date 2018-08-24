<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    public function cateProds()
    {
        return $this->belongsTo('App\CateProd', 'Cate_id', 'id');
    }

    public function imgProds()
    {
        return $this->hasMany('App\ImagesProd', 'Prod_id', 'id');
    }
}
