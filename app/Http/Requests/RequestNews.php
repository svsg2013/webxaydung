<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestNews extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "txtName"=>"required|unique:news,title",
            "slMenu"=>"required",
            "txtContent"=>"required",
            "fileImg"=>"required|image:jpeg, png, bmp, gif, svg"
        ];
    }
    public function messages(){
        return [
            "txtName.required"=>"Vui lòng nhập tiêu đề",
            "txtName.unique"=>"Tiêu đề đã tồn tại trong cơ sở dữ liệu",
            "slMenu.required"=>"Vui lòng chọn danh mục",
            "txtContent.required"=>"Vui lòng nhập nội dung",
            "fileImg.required"=>"Vui lòng nhập hình ảnh",
            "fileImg.image"=>"Định dạng file ảnh không đúng (jpeg, png, bmp, gif, svg)"

        ];
    }
}
