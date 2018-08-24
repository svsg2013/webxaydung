<?php

namespace App\Http\Controllers;

use App\BagiaTudu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCate;
use App\Repositories\TuDu\TuduRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TuyendungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_tudu;
    public function __construct(TuduRepositoryInterface $repository)
    {
        $this->_tudu= $repository;
    }

    public function index()
    {
        $getData= DB::table('bagia_tudus')
            //BAOGIA =0
            ->where('postType','TUYENDUNG')
            ->get();
        return view('admin.tuyendung.list')->with('dataPage',$getData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tuyendung.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pushCode= $this->_tudu->getCreateAndEdit($request->all());
        return $pushCode;
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
        $getData= BagiaTudu::find($id);
        return view('admin.tuyendung.edit')->with('dataPage',$getData);
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
        $pushCode= $this->_tudu->getCreateAndEdit($request->all(),$id);
        return $pushCode;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete= $this->_tudu->getDelete($id);
        return $delete;
    }
}
