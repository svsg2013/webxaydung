<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table= 'categories';

	public function childcate(){
	    return $this->hasMany('App\ChildCate','cateParen_id','id');
    }

    public function news(){
	    return $this->hasMany('App\News','Cate_id','id');
    }
}
