<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table= 'roles';
    public function user_roles(){
        return $this->hasMany('App\User_role','role_id','id');
    }
}
