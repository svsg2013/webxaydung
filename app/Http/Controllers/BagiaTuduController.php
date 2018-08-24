<?php

namespace App\Http\Controllers;

use App\BagiaTudu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCate;
use App\Repositories\BaTu\BatuRepositoryInterface;
use Illuminate\Support\Facades\DB;

class BagiaTuduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_baogia;

    public function __construct(BatuRepositoryInterface $batuRepository)
    {
        $this->_baogia = $batuRepository;
    }

    public function index()
    {
        $getData= DB::table('bagia_tudus')
            //BAOGIA =0
            ->where('postType','BAOGIA')
            ->get();
        return view('admin.batu.list')->with('dataPage',$getData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.batu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $this->_baogia->getCreateAndEdit($request->all());
        return $data;
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
        return view('admin.batu.edit')->with('dataPage',$getData);
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
        $pushCode= $this->_baogia->getCreateAndEdit($request->all(),$id);
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
        $delete= $this->_baogia->getDelete($id);
        return $delete;
    }
}
