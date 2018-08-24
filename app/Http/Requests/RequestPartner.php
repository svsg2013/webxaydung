<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPartner extends FormRequest
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
            'txtName'=>'required',
            'fileImg'=>'required|image'
        ];
    }

    public function messages(){
        return[
            'txtName.required'=>'Vui lòng nhập tên Partner',
            'fileImg.required'=>'Vui lòng nhập hình Partner',
            'fileImg.image'=>'Vui lòng chọn hình có định dạng jpeg, png, bmp, gif, hoặc svg',
        ];
    }
}
