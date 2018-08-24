<?php
/**
 * Created by PhpStorm.
 * User: LeThanh
 * Date: 10/19/2017
 * Time: 9:55 PM
 */

namespace App\Repositories\BaTu;

use App\Repositories\EloquentRepository;
use App\BagiaTudu;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use function PHPSTORM_META\type;


class BatuEloquentRepository extends EloquentRepository implements BatuRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\BagiaTudu::class;
    }

    public function getAll()
    {
        $getData = DB::table('bagia_tudus')->get();
        return $getData;
    }

    public function getCreateAndEdit($inputFile, $id = 0)
    {
        if ($id == 0) {
            $news = new BagiaTudu();
            $news->title = $inputFile['txtName'];
            $news->alias= changeTitle($inputFile['txtName']);
            $news->content = $inputFile['txtContent'];
            // 0 = BAOGIA
            $news->postType= 'BAOGIA';
            if (isset($inputFile['checkActive'])) {
                $news->active = $inputFile['checkActive'];
            } else {
                $news->active = 0;
            }
            if (Input::hasFile('fileImg')) {
                $file = Input::file('fileImg');
                $name = $file->getClientOriginalName();
                $file->move('upload/thumbnail/baogiatuyendung', $name);
                $news->background = $name;
            }
            $news->save();
            return redirect()->route('batu.index')->with(['thongbao' => 'Tin được tạo thành công']);
        } else {
            $news = $this->find($id);
            $news->title = $inputFile['txtName'];
            $news->alias= changeTitle($inputFile['txtName']);
            $news->content= $inputFile['txtContent'];
            if (isset($inputFile['checkActive'])) {
                $news->active = $inputFile['checkActive'];
            } else {
                $news->active = 0;
            }
            if (Input::hasFile('fileImg')) {
                $file = Input::file('fileImg');
                $name = $file->getClientOriginalName();
                $file->move('upload/thumbnail/baogiatuyendung', $name);
                $news->background = $name;
            }
            $news->save();
            return redirect()->route('batu.index')->with(['thongbao' => 'Tin được tạo thành công']);
        }
    }

    public function getDelete($id)
    {
        $news = BagiaTudu::find($id);
        $getDelete = BagiaTudu::find($id)->delete();
        return redirect()->route('batu.index')->with(['thongbao' => 'Tin đã được xóa, bất ngờ chưa!!!']);
    }
}