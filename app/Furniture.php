<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    protected $table='furniture';
    public function cateFur(){
        return $this->belongsTo('App\CateFur','Cate_id','id');
    }
}
