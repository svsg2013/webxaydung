<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CateFur extends Model
{
    protected $table= 'cate_furs';

    public function childFur(){
        return $this->hasMany('App\ChildFur','cateParen_id','id');
    }

    public function Furniture(){
        return $this->hasMany('App\Furniture','Cate_id','id');
    }
}
