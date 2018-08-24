<?php
/**
 * Created by PhpStorm.
 * User: LeThanh
 * Date: 10/19/2017
 * Time: 9:55 PM
 */

namespace App\Repositories\CateBDS;

use App\Repositories\EloquentRepository;
use App\Category;
use App\ChildCate;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class CateBDSEloquentRepository extends EloquentRepository implements CateBDSRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\Category::class;
    }

    public function getDataMenu()
    {
        $cate = DB::table('categories')
            ->select('id','name','alias','cateType')
            ->where('cateType','BDS')
            ->get();
        return $cate;
    }

    public function getCreateAndEdit($inputFile, $id = 0)
    {
        if ($id == 0) {
            $cateData = new Category();
            $cateData->name = $inputFile['txtName'];
            $cateData->alias = changeTitle($inputFile['txtName']);
            if (Input::has('txtMeta')) {
                $cateData->metaName = $inputFile['txtMeta'];
            } else {
                $cateData->metaName = $inputFile['txtName'];
            }
            if (Input::has('txtDescription')) {
                $cateData->description = $inputFile['txtDescription'];
            } else {
                $cateData->description = $inputFile['txtName'];
            }
            $cateData->cateType = 'BDS';
            $cateData->save();
            return redirect()->route('category.index')->with('thongbao', 'Danh mục tạo thành công');
        } else {
            $cateData = Category::find($id);
            $cateData->name = $inputFile['txtName'];
            $cateData->alias = changeTitle($inputFile['txtName']);
            if (Input::has('txtMeta')) {
                $cateData->metaName = $inputFile['txtMeta'];
            }
            if (Input::has('txtDescription')) {
                $cateData->description = $inputFile['txtDescription'];
            }
            $cateData->save();
            return redirect()->route('category.index')->with('thongbao', 'Danh mục thay đổi thành công');
        }

    }

    public function getDelete($id)
    {
        $categet = ChildCate::where('lvl', $id)->count();
        if ($categet == 0) {
            $getid = Category::find($id);
            $getid->delete();
            return redirect()->route('category.index')->with('thongbao', 'Xóa thành công');
        } else {
            return redirect()->route('category.index')->with('thongbaoloi', 'Đây là thư mục cha không thể xóa được');
        }
    }

}