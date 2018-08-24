<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestCateProd;
use App\Repositories\CateProd\CateProdRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CateProdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_cateprod;

    public function __construct(CateProdRepositoryInterface $cateProdRepositoryInterface)
    {
        $this->_cateprod = $cateProdRepositoryInterface;
    }

    public function index()
    {
        $cateProd = $this->_cateprod->getDataMenu();
        return view('admin.cateprod.list')->with(['cateProds' => $cateProd]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cateProd = $this->_cateprod->getDataMenu();
        return view('admin.cateprod.create')->with(['cateProds' => $cateProd]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCateProd $requestCateProd)
    {
        $cateProd= $this->_cateprod->getCreateAndEdit($requestCateProd->all());
        if ($cateProd){
            return $cateProd;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cateData = $this->_cateprod->getDataMenu();
        $cateParent = DB::table('cate_prods')
            ->leftjoin('child_prods', 'cate_prods.id', '=', 'child_prods.cateParen_id')
            ->select('name', 'metaName', 'description', 'lvl', 'child_prods.cateParen_id')
            ->where('child_prods.cateParen_id', '=', $id)
            //first get value object
            ->get()->first();

        return view('admin.cateprod.edit')->with(['datas' => $cateData, 'catePaId' => $cateParent]);
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
        $cateProd= $this->_cateprod->getCreateAndEdit($request->all(),$id);
        return $cateProd;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cateProd= $this->_cateprod->getDelete($id);
        return $cateProd;
    }
}
