<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_role extends Model
{

    protected $table= 'user_roles';

    public function userRoles(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function roles_userRole(){
        return $this->belongsTo('App\Role','role_id','id');
    }
}
