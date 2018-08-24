<?php

namespace App\Http\Controllers;

use App\Repositories\Slider\SliderRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\RequestSlider;
use App\Http\Requests\RequestEditSlider;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_slider;

    public function __construct(SliderRepositoryInterface $sliderRepositoryInterface)
    {
        $this->_slider = $sliderRepositoryInterface;
    }

    public function index()
    {
        $data= $this->_slider->getAll();
        return view('admin.slider.list')->with('listSlider',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestSlider $requestSlider)
    {
        $data= $this->_slider->getCreateAndEdit($requestSlider->all());
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= $this->_slider->find($id);
        return view('admin.slider.edit')->with('list',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $editSlider, $id)
    {
        $getData= $this->_slider->getCreateAndEdit($editSlider->all(),$id);
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
        $getDelete= $this->_slider->getDelete($id);
        return $getDelete;
    }
}
