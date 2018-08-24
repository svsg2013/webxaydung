<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildProd extends Model
{
    protected $table= 'child_prods';

    public function category(){
        return $this->belongsTo('App\CateProd','cateParen_id','id');
    }
}
