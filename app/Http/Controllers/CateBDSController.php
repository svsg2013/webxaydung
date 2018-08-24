<?php

namespace App\Http\Controllers;

use App\Http\Requests\CateUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCate;
use App\Repositories\CateBDS\CateBDSRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CateBDSController extends Controller
{
    protected $_cate;

    public function __construct(CateBDSRepositoryInterface $cateRepositoryInterface)
    {
        $this->_cate = $cateRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$cate= DB::table('categories')->get();
        $cate = $this->_cate->getDataMenu();
        return view('admin.cate.list')->with(['cates' => $cate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = $this->_cate->getDataMenu();
        return view('admin.cate.create')->with(['cates' => $cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
//    public function store(RequestCate $requestcate)
    public function store(Request $requestcate)
    {
        $data = $this->_cate->getCreateAndEdit($requestcate->all());
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cateData = $this->_cate->getDataMenu();

        $cateParent = DB::table('categories')
            ->where([
                ['id',$id],
                ['cateType','BDS']
            ])
            ->first();
        return view('admin.cate.edit')->with(['datas' => $cateData, 'catePaId' => $cateParent]);
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
        $data = $this->_cate->getCreateAndEdit($request->all(), $id);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tienVong = $this->_cate->getDelete($id);
        return $tienVong;
    }
}
