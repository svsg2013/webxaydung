<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\Console\Input\Input;

class RequestCate extends FormRequest
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
            'txtName'=>'required|unique:categories,name',
			'slMenu'=>'required'
        ];
    }
	
	public function messages(){
		return [
			'txtName.required'=>'Vui lòng nhập tiêu đề',
			'txtName.unique'=>'Tiêu đề đã tồn tại',
			'slMenu.required'=>'Vui lòng chọn thư mục'
		];
	}
}
