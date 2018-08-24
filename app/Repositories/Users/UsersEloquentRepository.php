<?php
/**
 * Created by PhpStorm.
 * User: LeThanh
 * Date: 10/19/2017
 * Time: 9:55 PM
 */

namespace App\Repositories\Users;
use App\Repositories\EloquentRepository;
use App\User;
use App\User_role;
use App\Role;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class UsersEloquentRepository extends EloquentRepository implements UsersRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\User::class;
    }
    public function getUserInfor($id=0){
        $getData=array();
        if ($id==0){
            $getUser= User::select('id','name','email','phone','remember_token')->get();
            $getRole= Role::all();
            $getData=['abc'=>$getUser,'123'=>$getRole];
            return $getData;
        }else{
            $RoleCheked= array();
            $getUser= User::find($id);
            $getRole= Role::all()->toArray();
            $getRoleChecked= User_role::select('role_id')->where('user_id',$id)->get();
            foreach ($getRole as $role){
                $RoleCheked[]= array(
                    'id'=> $role['id'],
                    'name'=> $role['portray'],
                    'chek'=> $getRoleChecked
                );
            }
            $getData=['abc'=>$getUser,'123'=>$getRole,'RolChecked'=>$RoleCheked];
            return $getData;
        }
    }
    public function getCreateAndEdit($inputFile, $id=0){
        if ($id==0) {
            $user= new User();
            $user->name= $inputFile['txtUser'];
            $user->remember_token= $inputFile['_token'];
            $user->email= $inputFile['txtEmail'];
            $user->phone= $inputFile['txtPhone'];
            if(Input::has('slRoles')){
                $user->lvl= $inputFile['slRoles'];
            }
            $user->password= bcrypt($inputFile['txtPass']);
            $user->save();
            $idUser= $user->id;
            if(Input::has('roles')){
                $getRoles= $inputFile['roles'];
                foreach ($getRoles as $role){
                    $getRole= new User_role();
                    $getRole->role_id= $role;
                    $getRole->user_id= $idUser;
                    $getRole->save();
                }
            }
            return redirect()->route('user.index')->with('thongbao','User khởi tạo thành công');
        }else{
            $user= User::find($id);
            $user->name= $inputFile['txtUser'];
            $user->remember_token= $inputFile['_token'];
            $user->email= $inputFile['txtEmail'];
            $user->phone= $inputFile['txtPhone'];
            if(Input::has('slRoles')){
                $user->lvl= $inputFile['slRoles'];
            }
            $user->password= bcrypt($inputFile['txtPass']);
            $user->save();
            if(Input::has('roles')){
                DB::table('user_roles')->where('user_id',$id)->delete();
                $getRoles= $inputFile['roles'];
                foreach ($getRoles as $role){
                    $getRole= new User_role();
                    $getRole->role_id= $role;
                    $getRole->user_id= $id;
                    $getRole->save();
                }
            }
            return redirect()->route('user.index')->with('thongbao','User khởi tạo thành công');
        }
    }

    public function getDelete($id)
    {

    }
}