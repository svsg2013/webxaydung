<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\System;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData= DB::table('systems')
            ->first();
        return view('admin.system.list')->with(['dataSystem'=>$getData]);
    }

    public function edit($id)
    {
        $getData= System::find($id);
        return view('admin.system.list')->with(['dataSystem'=>$getData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $system= System::find($id);
        $system->address= $request->txtAddress;
        $system->phone= $request->txtPhone;
        $system->info= $request->txtFooter;
        $system->email= $request->txtEmail;
        $system->analytic= $request->txtAna;
        $system->livechat= $request->txtLivechat;
        //TODO logo
        if (Input::hasFile('fileImg')) {
            $file = Input::file('fileImg');
            $name = $file->getClientOriginalName();
            $file->move('uploads/thumbnail/', $name);
            $system->logo = $name;
        }
        $system->save();
        return redirect()->route('system.index')->with('thongbao','Cập nhật thành công');
    }
}
