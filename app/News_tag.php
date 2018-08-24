<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news_tag extends Model
{
    protected $table= 'news_tags';

    public function news(){
        return $this->belongsTo('App\News','news_id','id');
    }
    public function tags(){
        return $this->belongsTo('App\Tag','tag_id','id');
    }
}
