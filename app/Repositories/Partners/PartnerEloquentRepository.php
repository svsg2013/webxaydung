<?php
/**
 * Created by PhpStorm.
 * User: LeThanh
 * Date: 10/19/2017
 * Time: 9:55 PM
 */

namespace App\Repositories\Partners;

use App\Repositories\EloquentRepository;
use App\Partner;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class PartnerEloquentRepository extends EloquentRepository implements PartnerRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\Partner::class;
    }

    public function getAll()
    {
        $getData = DB::table('partners')->select('id', 'name', 'addSlug', 'images', 'weight', 'active', 'weight')->get();
        return $getData;
    }

    public function getDataMenu()
    {
        $cate = DB::table('categories')
            ->leftjoin('child_cates', 'categories.id', '=', 'child_cates.cateParen_id')
            ->select('name', 'lvl', 'alias', 'metaName', 'description', 'weight', 'child_cates.cateParen_id')
            ->get();
        return $cate;
    }

    public function getCreateAndEdit($inputFile, $id = 0)
    {
        if ($id == 0) {
            $slider = new Partner();
            if (isset($inputFile['txtName'])){
                $slider->name= $inputFile['txtName'];
            }
            if (isset($inputFile['txtSlug'])){
                $slider->addSlug= $inputFile['txtSlug'];
            }
            if (isset($inputFile['checkActive'])) {
                $slider->active = $inputFile['checkActive'];
            } else {
                $slider->active = 0;
            }
            if (isset($inputFile['txtWeight'])) {
                $slider->weight = $inputFile['txtWeight'];
            }
            if (Input::hasFile('fileImg')) {
                $file = Input::file('fileImg');
                $name = $file->getClientOriginalName();
                $file->move('upload/partner', $name);
                $slider->images = $name;
            }
            $slider->save();
            return redirect()->route('partner.index')->with(['thongbao' => 'Partner được tạo thành công']);
        } else {
            $slider = $this->find($id);
            if (isset($inputFile['txtName'])){
                $slider->name= $inputFile['txtName'];
            }
            if (isset($inputFile['txtSlug'])){
                $slider->addSlug= $inputFile['txtSlug'];
            }
            if (isset($inputFile['checkActive'])) {
                $slider->active = $inputFile['checkActive'];
            } else {
                $slider->active = 0;
            }
            if (isset($inputFile['txtWeight'])) {
                $slider->weight = $inputFile['txtWeight'];
            }
            if (Input::hasFile('fileImg')) {
                unlink('upload/partner/' . $slider->images);
                $file = Input::file('fileImg');
                $name = $file->getClientOriginalName();
                $file->move('upload/partner', $name);
                $slider->images = $name;
            }
            $slider->save();
            return redirect()->route('partner.index')->with(['thongbao' => 'Partner cập nhật thành công']);
        }
    }

    public function getDelete($id)
    {
        $partner = Partner::find($id);
        $getDelete = Partner::find($id)->delete();
        return redirect()->route('partner.index')->with(['thongbao' => 'Partner được xóa, bất ngờ chưa!!!']);
    }

}