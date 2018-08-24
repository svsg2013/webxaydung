<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CateProd extends Model
{
    protected $table= 'cate_prods';

    public function childcate(){
        return $this->hasMany('App\ChildProd','cateParen_id','id');
    }

    public function news(){
        return $this->hasMany('App\Products','Cate_id','id');
    }

}
