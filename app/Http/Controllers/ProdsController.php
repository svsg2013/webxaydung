<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Prods\ProdsRepositoryInterface;
use App\Http\Requests\RequestNews;

class ProdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_prods;

    public function __construct(ProdsRepositoryInterface $prodsrepositoryinterface)
    {
        $this->_prods = $prodsrepositoryinterface;
    }

    public function index()
    {
        $getProd = $this->_prods->getAll();
        return view('admin.prods.list')->with(['getData' => $getProd]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getProds = $this->_prods->getDataMenu();
        return view('admin.prods.create')->with(['getDataMenu' => $getProds]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getProds= $this->_prods->getCreateAndEdit($request->all());
        return $getProds;
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
        $getMenu = $this->_prods->getDataMenu();
        $getProd = $this->_prods->find($id);
        $getImgs = $this->_prods->imgsEdit($id);
        return view('admin.prods.edit')->with(['getPosts' => $getProd,'getDataMenu' => $getMenu,'getImages' => $getImgs]);
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
        $getProd = $this->_prods->getCreateAndEdit($request->all(),$id);
        return $getProd;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getData= $this->_prods->getDelete($id);
        return $getData;
    }
}
