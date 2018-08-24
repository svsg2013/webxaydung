<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            "txtName"=>"required",
            "txtPhone"=>"required",
            "txtEmail"=>"required",
            "txtContent"=>"required",
        ];
    }
    public function messages(){
        return [
            "txtName.required"=>"Vui lòng nhập Họ và tên",
            "txtPhone.required"=>"Vui lòng nhập Số điện thoại",
            "txtEmail.required"=>"Vui lòng nhập E-mail",
            "txtContent.required"=>"Vui lòng nhập nội dung",
        ];
    }
}
