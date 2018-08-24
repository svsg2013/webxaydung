<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table= 'tags';

    public function news_tag(){
        return $this->hasMany('App\News_tag','news_id','id');
    }
}
