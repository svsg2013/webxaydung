<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Tags\TagsRepositoryInterface;
use App\Http\Requests\RequestTags;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_tag;
    public function __construct(TagsRepositoryInterface $tagsRepository)
    {
        $this->_tag= $tagsRepository;
    }

    public function index()
    {
        $getTags= $this->_tag->getAll();
        return view('admin.tags.list',compact('getTags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestTags $requesttags)
    {
        $getTags= $this->_tag->getCreateAndEdit($requesttags->all());
        return $getTags;
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
        $getdata= $this->_tag->find($id);
        return view('admin.tags.edit',compact("getdata"));
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
        $editTag= $this->_tag->getCreateAndEdit($request->all(),$id);
        return $editTag;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delTag= $this->_tag->getDelete($id);
        return $delTag;
    }
}
