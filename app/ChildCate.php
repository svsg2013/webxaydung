<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildCate extends Model
{
    protected $table= 'child_cates';

    public function category(){
        return $this->belongsTo('App\Category','cateParen_id','id');
    }
}
