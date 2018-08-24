<?php
/**
 * Created by PhpStorm.
 * User: LeThanh
 * Date: 10/19/2017
 * Time: 9:55 PM
 */

namespace App\Repositories\Slider;

use App\Repositories\EloquentRepository;
use App\Slider;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class SliderEloquentRepository extends EloquentRepository implements SliderRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\Slider::class;
    }

    public function getAll()
    {
        $getData = DB::table('sliders')->select('id', 'name', 'addSlug', 'images', 'weight', 'active')->get();
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
            $slider = new Slider();
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
                $file->move('uploads/sliders', $name);
                $slider->images = $name;
            }
            $slider->save();
            return redirect()->route('slider.index')->with(['thongbao' => 'Slider được tạo thành công']);
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
                $file = Input::file('fileImg');
                $name = $file->getClientOriginalName();
                $file->move('uploads/sliders', $name);
                $slider->images = $name;
            }
            $slider->save();
            return redirect()->route('slider.index')->with(['thongbao' => 'Slider cập nhật thành công']);
        }
    }

    public function getDelete($id)
    {
        $slider = Slider::find($id);
        $getDelete = Slider::find($id)->delete();
        return redirect()->route('slider.index')->with(['thongbao' => 'Slider được xóa, bất ngờ chưa!!!']);
    }

}