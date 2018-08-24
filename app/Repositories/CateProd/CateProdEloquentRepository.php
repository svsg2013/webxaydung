<?php
/**
 * Created by PhpStorm.
 * User: Tranh Than
 * Date: 5/5/2018
 * Time: 10:01 AM
 */

namespace App\Repositories\CateProd;

use App\Repositories\EloquentRepository;
use App\CateProd;
use App\ChildProd;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class CateProdEloquentRepository extends EloquentRepository implements CateProdRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\CateProd::class;
    }

    public function getDataMenu()
    {
        $cate = DB::table('cate_prods')
            ->leftjoin('child_prods', 'cate_prods.id', '=', 'child_prods.cateParen_id')
            ->select('name', 'lvl', 'alias', 'metaName', 'description', 'weight', 'child_prods.cateParen_id')
            ->get();
        return $cate;
    }

    public function getCreateAndEdit($inputFile, $id = 0)
    {
        if ($id == 0) {
            $cateData = new CateProd();
            $cateData->name = $inputFile['txtName'];
            $cateData->alias = changeTitle($inputFile['txtName']);
            // khuc !empty -> không để trống thì thực hiện tức là có nhập vào text form
            if (Input::hasFile('fileBanner') == true) {
                $file = Input::file('fileBanner');
                $fileName = $file->getClientOriginalName();
                $file->move('upload/thumbnail', $fileName);
                $cateData->metaName = $fileName;
            }
            $cateData->description = $inputFile['txtDescription'];
            $cateData->save();
            $cateChildData = new ChildProd();
            $cateChildData->cateParen_id = $cateData->id;
            $cateChildData->lvl = $inputFile['slMenu'];
            $cateChildData->save();
            return redirect()->route('cateprod.index')->with('thongbao', 'Danh mục tạo thành công');
        } else {
            $cateData = CateProd::find($id);
            $cateData->name = $inputFile['txtName'];
            $cateData->alias = changeTitle($inputFile['txtName']);
            if (!empty($inputFile['txtMeta'])) {
                $cateData->metaName = $inputFile['txtMeta'];

            } else {
                $cateData->metaName = $inputFile['txtName'];
            }
            $cateData->description = $inputFile['txtDescription'];
            if (Input::hasFile('fileBanner') == true) {
                $file = Input::file('fileBanner');
                $fileName = $file->getClientOriginalName();
                $file->move('upload/thumbnail', $fileName);
                $cateData->metaName = $fileName;
            }
            $cateData->save();
            $getIDParent = DB::table('cate_prods')
                ->leftjoin('child_prods', 'cate_prods.id', '=', 'child_prods.cateParen_id')
                ->select('child_prods.id')
                ->where('child_prods.cateParen_id', '=', $id)
                ->get()->first();
            $cateChildData = ChildProd::find($getIDParent->id);
            $cateChildData->lvl = $inputFile['slMenu'];
            $cateChildData->save();
            return redirect()->route('cateprod.index')->with('thongbao', 'Danh mục thay đổi thành công');
        }

    }

    public function getDelete($id)
    {
        $categet = ChildProd::where('lvl', $id)->count();
        if ($categet == 0) {
            $getid = CateProd::find($id);
            $getid->delete();
            return redirect()->route('cateprod.index')->with('thongbao', 'Xóa thành công');
        } else {
            return redirect()->route('cateprod.index')->with('thongbaoloi', 'Đây là thư mục cha không thể xóa được');
        }
    }
}