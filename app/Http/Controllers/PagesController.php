<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Pages;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData = DB::table('pages')->get();
        return view('admin.pages.list')->with('dataPage', $getData);
    }

    public function edit($id)
    {
        $getData = Pages::find($id);
        return view('admin.pages.edit')->with('editPage', $getData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pushCode = Pages::find($id);
        if (Input::has('txtName')) {
            $pushCode->name = $request->txtName;
        }
        if (Input::has('txtSlug')) {
            $pushCode->slug = $request->txtSlug;
        } else {
            $pushCode->slug = changeTitle($request->txtName);
        }
        if (Input::has('txtContent')) {
            $pushCode->content = $request->txtContent;
        }
        if (Input::hasFile('fileImg')) {
            $file = Input::file('fileImg');
            $name = $file->getClientOriginalName();
            $file->move('upload/thumbnail', $name);
            $pushCode->description = $name;
        }
        if (Input::hasFile('fileBg')) {
            $file = Input::file('fileBg');
            $name = $file->getClientOriginalName();
            $file->move('upload/thumbnail', $name);
            $pushCode->background = $name;
        }
        $pushCode->save();
        return redirect()->route('pages.index')->with('thongbao', 'Cập nhật thành công');
    }


}
