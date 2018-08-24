<?php
/**
 * Created by PhpStorm.
 * User: LeThanh
 * Date: 10/19/2017
 * Time: 9:55 PM
 */

namespace App\Repositories\Tags;
use App\Repositories\EloquentRepository;
use App\Category;
use App\ChildCate;
use  App\Tag;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class TagsEloquentRepository extends EloquentRepository implements TagsRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\Tag::class;
    }
    public function getCreateAndEdit($inputFile, $id=0){
        if ($id==0){
            $tag= new Tag();
            if (isset($inputFile['txtName'])){
                $tag->title= $inputFile['txtName'];
                $tag->alias=changeTitle($inputFile['txtName']);
            }
            if (isset($inputFile['txtMeta'])){
                $tag->metaTitle=$inputFile['txtMeta'];
            }else{
                $tag->metaTitle=$inputFile['txtName'];
            }
            $tag->save();
            return redirect()->route('tags.index')->with(['thongbao'=>'Tag tạo thành công']);
        }else{
            $tag= Tag::find($id);
            if (isset($inputFile['txtName'])){
                $tag->title= $inputFile['txtName'];
                $tag->alias=changeTitle($inputFile['txtName']);
            }
            if (isset($inputFile['txtMeta'])){
                $tag->metaTitle=$inputFile['txtMeta'];
            }else{
                $tag->metaTitle=$inputFile['txtName'];
            }
            $tag->save();
            return redirect()->route('tags.index')->with(['thongbao'=>'Tag sửa thành công']);
        }
    }

    public function getDelete($id)
    {
        $getTag= Tag::find($id);
        $getTag->delete();
        return redirect()->route('tags.index')->with('thongbao','Tag đã được xóa, bất ngờ chưa?');
    }
}