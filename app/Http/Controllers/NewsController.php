<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\News\NewsRepositoryInterface;
use App\Http\Requests\RequestNews;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_news;

    public function __construct(NewsRepositoryInterface $newsrepositoryinterface)
    {
        $this->_news= $newsrepositoryinterface;
    }

    public function index()
    {
        $getAll= $this->_news->getAll();
        return view('admin.news.list')->with(['getData'=>$getAll]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getMenu= $this->_news->getDataMenu();
        $getPost= $this->_news->getAll();
        return view('admin.news.create')->with(['getDataMenu'=>$getMenu,'getPosts'=>$getPost]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestNews $requestnews)
    {
        $data= $this->_news->getCreateAndEdit($requestnews->all());
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
        $getMenu= $this->_news->getDataMenu();
        $getPost= $this->_news->find($id);
        return view('admin.news.edit')->with(['getDataMenu'=>$getMenu,'getPosts'=>$getPost]);
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
        $getData= $this->_news->getCreateAndEdit($request->all(),$id);
        return $getData;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getData= $this->_news->getDelete($id);
        return $getData;
    }
}
