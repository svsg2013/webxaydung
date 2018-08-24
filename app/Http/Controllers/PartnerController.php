<?php

namespace App\Http\Controllers;

use App\Repositories\Partners\PartnerRepositoryInterface;
use App\Http\Requests\RequestPartner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_partner;
    public function __construct(PartnerRepositoryInterface $partnerRepositoryInterface)
    {
        $this->_partner= $partnerRepositoryInterface;
    }

    public function index()
    {
        $data= $this->_partner->getAll();
        return view('admin.partner.list')->with('listSlider',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestPartner $requestPartner)
    {
        $data= $this->_partner->getCreateAndEdit($requestPartner->all());
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
        $data= $this->_partner->find($id);
        return view('admin.partner.edit')->with('list',$data);
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
        $getData= $this->_partner->getCreateAndEdit($request->all(),$id);
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
        $getDelete= $this->_partner->getDelete($id);
        return $getDelete;
    }
}
