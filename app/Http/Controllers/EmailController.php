<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use App\Email;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    public function store(Request $request)
    {
        $pushEmail= New Email();
        $pushEmail->email= $request->txtEmail;
        $pushEmail->save();
        return ['msg'=>'Gửi E-mail thành công'];
    }

    public function index()
    {
        $email= DB::table('emails')->orDerBy('id','DESC')->get();
        return view('admin.email.list')->with('cates',$email);
    }

}
