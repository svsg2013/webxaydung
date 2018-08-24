<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use  App\System;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    public function store(Request $request)
    {
        $getInput= new Contact();
        $getInput->name= $request->txtName;
        $getInput->email= $request->txtEmail;
        $getInput->content= $request->txtContent;
        $getInput->save();
        return redirect()->route('contactShow')->with('thongbao','E-mail đăng ký thành công');
    }

    public function index()
    {
        $email= DB::table('contacts')->get();
        return view('admin.contact.list')->with(['cates'=>$email]);
    }

}
