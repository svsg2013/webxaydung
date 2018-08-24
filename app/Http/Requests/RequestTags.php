<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestTags extends FormRequest
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
            'txtName'=>'required|unique:tags,title',
        ];
    }

    public function messages(){
        return[
            'txtName.required'=>'Vui lòng nhập tiêu đề',
            'txtName.unique'=>'Tag này đã tồn tại, xin nhập lại.'
        ];
    }
}
