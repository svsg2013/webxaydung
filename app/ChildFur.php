<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildFur extends Model
{
    protected $table= 'child_furs';

    public function cateFur(){
        return $this->belongsTo('App\CateFur','cateParen_id','id');
    }
}
