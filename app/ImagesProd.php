<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagesProd extends Model
{
    protected $table = 'images_prods';

    public function products()
    {
        return $this->belongsTo('App\Products', 'Prod_id', 'id');
    }
}
