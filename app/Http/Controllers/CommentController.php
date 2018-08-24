<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;
use App\Comment;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData= DB::table('comments')->orDerBy('id','DESC')->get();
        return view('admin.faqs.list')->with('Faqs',$getData);
    }

    public function store(CommentRequest $request)
    {
        $pushCode= new Comment();
        $pushCode->name= $request->txtName;
        $pushCode->phone= $request->txtPhone;
        $pushCode->email= $request->txtEmail;
        $pushCode->content= $request->txtContent;
        $pushCode->save();
        return ['msg'=>'Gửi thông tin thành công'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getDelete= Comment::find($id);
        $getDelete->delete();
        return redirect()->route('comment.index')->with('thongbao','Nội dung đã xóa');
    }
}
