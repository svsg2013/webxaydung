<?php
/**
 * Created by PhpStorm.
 * User: LeThanh
 * Date: 10/19/2017
 * Time: 9:55 PM
 */

namespace App\Repositories\Fur;

use App\Repositories\EloquentRepository;
use App\Category;
use App\ChildCate;
use App\News;
use App\Tag;
use App\News_tag;
use App\Furniture;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class FurnitureEloquentRepository extends EloquentRepository implements FurnitureRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\Furniture::class;
    }

    public function unseri($id)
    {
/*        $getPostandUn = array();
        //truy vấn relation lấy giá trị để biên dịch lại mảng bị mã hóa
        $getId = DB::table('news')->select('relation')->where('id', $id)->get();
        //truy vấn lấy dữ liệu news
        $getPost = DB::table('news')->select('id', 'title')->get();
        //chọn giá trị mảng tới phần tử object
        $unseri = unserialize($getId[0]->relation);
        //gôm chung giá trị vào một mảng để xử lý foreach lấy giá trị relation
        foreach ($getPost as $getData) {
            $getPostandUn[] = array(
                'id' => $getData->id,
                'title' => $getData->title,
                'relation' => $unseri
            );
        }*/
        return null;
    }

    public function getAll()
    {
        $getData = DB::table('furniture')->select('id', 'title', 'hot', 'feature', 'active', 'sort', 'relation')->get();
        return $getData;
    }

    public function getTags($id = 0)
    {
        if ($id == 0) {
            $allTags = DB::table('tags')->select('id', 'title')->get()->toArray();
            return $allTags;
        } else {
            $getTagandChek = array();
            $getIdofTag = DB::table('news_tags')->select('tag_id')->where('news_id', $id)->get()->toArray();
            $allTags = DB::table('tags')->select('id', 'title')->get();
            foreach ($allTags as $tag) {
                $getTagandChek[] = array(
                    'id' => $tag->id,
                    'title' => $tag->title,
                    'check' => $getIdofTag
                );
            }
            return $getTagandChek;
        }
    }

    public function getDataMenu()
    {
        $cate = DB::table('cate_furs')
            ->leftjoin('child_furs', 'cate_furs.id', '=', 'child_furs.cateParen_id')
            ->select('name', 'lvl', 'alias', 'metaName', 'description', 'weight', 'child_furs.cateParen_id')
            ->get();
        return $cate;
    }

    public function getCreateAndEdit($inputFile, $id = 0)
    {
        if ($id == 0) {
            $news = new Furniture();
            $news->view = 1;
            if (isset($inputFile['slPost'])) {
                $news->relation = serialize($inputFile['slPost']);
            }
            $news->title = $inputFile['txtName'];
            $news->Cate_id = $inputFile['slMenu'];
            if (!isset($inputFile['txtMetatitle'])) {
                $news->metaTitle = $inputFile['txtName'];
            } else {
                $news->metaTitle = $inputFile['txtMetatitle'];
            }
            $news->alias = changeTitle($inputFile['txtName']);
            $news->summary = $inputFile['txtSummary'];
            if (!isset($inputFile['txtDescription'])) {
                $news->description = $inputFile['txtSummary'];
            } else {
                $news->description = $inputFile['txtDescription'];
            }
            $news->content = $inputFile['txtContent'];
            if (!isset($inputFile['checkHot']) && !isset($inputFile['checkFeature'])) {
                $news->hot = 0;
                $news->feature = 0;
            } elseif (isset($inputFile['checkHot']) && !isset($inputFile['checkFeature'])) {
                $news->hot = $inputFile['checkHot'];
                $news->feature = 0;
            } elseif (isset($inputFile['checkHot']) && isset($inputFile['checkFeature'])) {
                $news->hot = $inputFile['checkHot'];
                $news->feature = $inputFile['checkFeature'];
            } else {
                $news->hot = 0;
                $news->feature = $inputFile['checkFeature'];
            }
            if (isset($inputFile['checkActive'])) {
                $news->active = $inputFile['checkActive'];
            } else {
                $news->active = 0;
            }
            if (isset($inputFile['txtWeight'])) {
                $news->sort = $inputFile['txtWeight'];
            }
            if (Input::hasFile('fileImg')) {
                $file = Input::file('fileImg');
                $name = $file->getClientOriginalName();
                $file->move('upload/thumbnail', $name);
                $news->images = $name;
            }
            $news->save();
            return redirect()->route('furniture.index')->with(['thongbao' => 'Tin được tạo thành công']);
        } else {
            $news = $this->find($id);
            $news->view = 1;
            if (isset($inputFile['slPost'])) {
                $news->relation = serialize($inputFile['slPost']);
            }
            $news->title = $inputFile['txtName'];
            $news->Cate_id = $inputFile['slMenu'];
            if (!isset($inputFile['txtMetatitle'])) {
                $news->metaTitle = $inputFile['txtName'];
            } else {
                $news->metaTitle = $inputFile['txtMetatitle'];
            }
            $news->alias = changeTitle($inputFile['txtName']);
            $news->summary = $inputFile['txtSummary'];
            if (!isset($inputFile['txtDescription'])) {
                $news->description = $inputFile['txtSummary'];
            } else {
                $news->description = $inputFile['txtDescription'];
            }
            $news->content = $inputFile['txtContent'];
            if (!isset($inputFile['checkHot']) && !isset($inputFile['checkFeature'])) {
                $news->hot = 0;
                $news->feature = 0;
            } elseif (isset($inputFile['checkHot']) && !isset($inputFile['checkFeature'])) {
                $news->hot = $inputFile['checkHot'];
                $news->feature = 0;
            } elseif (isset($inputFile['checkHot']) && isset($inputFile['checkFeature'])) {
                $news->hot = $inputFile['checkHot'];
                $news->feature = $inputFile['checkFeature'];
            } else {
                $news->hot = 0;
                $news->feature = $inputFile['checkFeature'];
            }
            if (isset($inputFile['checkActive'])) {
                $news->active = $inputFile['checkActive'];
            } else {
                $news->active = 0;
            }
            if (isset($inputFile['txtWeight'])) {
                $news->sort = $inputFile['txtWeight'];
            }
            if (Input::hasFile('fileImg')) {
                $file = Input::file('fileImg');
                $name = $file->getClientOriginalName();
                $file->move('upload/thumbnail', $name);
                $news->images = $name;
            }
            $news->save();
            return redirect()->route('furniture.index')->with(['thongbao' => 'Tin được tạo thành công']);
        }
    }

    public function getDelete($id)
    {
        $news = Furniture::find($id);
        $getDelete = Furniture::find($id)->delete();
//        DB::table('news_tags')->where('news_id', $id)->delete();
//        unlink('upload/thumbnail/' . $news->images);
        return redirect()->route('furniture.index')->with(['thongbao' => 'Tin tức đã được xóa, bất ngờ chưa!!!']);
    }
}