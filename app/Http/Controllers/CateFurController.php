<?php

namespace App\Http\Controllers;

//use App\Http\Requests\CateUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCate;
use App\Repositories\CateFur\CateFurRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CateFurController extends Controller
{    protected $_cate;

    public function __construct(CateFurRepositoryInterface $furnitureRepository)
    {
        $this->_cate = $furnitureRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate = $this->_cate->getDataMenu();
        return view('admin.catefur.list')->with(['cates' => $cate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = $this->_cate->getDataMenu();
        return view('admin.catefur.create')->with(['cates' => $cate]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCate $request)
    {
        $data = $this->_cate->getCreateAndEdit($request->all());
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

        $cateParent = DB::table('cate_furs')
            ->leftjoin('child_furs', 'cate_furs.id', '=', 'child_furs.cateParen_id')
            ->select('name', 'metaName', 'description', 'lvl', 'child_furs.cateParen_id')
            ->where('child_furs.cateParen_id', '=', $id)
            //first get value object
            ->get()->first();
        return view('admin.catefur.edit')->with(['datas' => $cateData, 'catePaId' => $cateParent]);
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
