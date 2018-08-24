<?php
/**
 * Created by PhpStorm.
 * User: LeThanh
 * Date: 10/19/2017
 * Time: 9:55 PM
 */

namespace App\Repositories\News;

use App\Repositories\EloquentRepository;
use App\Category;
use App\ChildCate;
use App\News;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class NewsEloquentRepository extends EloquentRepository implements NewsRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\News::class;
    }

    public function getAll()
    {
        $getXd = DB::table('categories as cate')
            ->rightjoin('news as n','n.Cate_id','=','cate.id')
            ->where('cate.cateType','XAYDUNG')
            ->get();
        return $getXd;
    }

    public function getDataMenu()
    {
        $cate = DB::table('categories')
            ->select('id','name','alias','cateType')
            ->where('cateType','XAYDUNG')
            ->get();
        return $cate;
    }

    public function getCreateAndEdit($inputFile, $id = 0)
    {
        if ($id == 0) {
            $news = new News();
            $news->view = 1;
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
            $idNews = $news->id;
            return redirect()->route('news.index')->with(['thongbao' => 'Tin được tạo thành công']);
        } else {
            $news = $this->find($id);
            $news->view = 1;
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
            return redirect()->route('news.index')->with(['thongbao' => 'Tin được tạo thành công']);
        }
    }

    public function getDelete($id)
    {
        $news = News::find($id);
        $getDelete = News::find($id)->delete();
        return redirect()->route('news.index')->with(['thongbao' => 'Tin tức đã được xóa, bất ngờ chưa!!!']);
    }
}