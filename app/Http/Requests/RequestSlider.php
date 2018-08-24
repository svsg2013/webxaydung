<?php

namespace App\Http\Requests;

use App\Slider;
use Illuminate\Foundation\Http\FormRequest;

class RequestSlider extends FormRequest
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
            'txtName.required'=>'Vui lòng nhập tên Slider',
            'fileImg.required'=>'Vui lòng nhập hình Slider',
            'fileImg.image'=>'Vui lòng chọn hình có định dạng jpeg, png, bmp, gif, hoặc svg',
        ];
    }
}
