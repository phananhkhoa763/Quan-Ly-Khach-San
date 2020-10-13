<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
class useRequest extends FormRequest
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
            'hoten' => 'required',
            'email' => 'required',
            'ngaysinh' => 'required',
            'diachi' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'hoten.required' => 'Vui lòng nhập tên.',
            'email.required' => 'Vui lòng nhập email.',
            'ngaysinh.required' => 'Vui lòng nhập ngày sinh.',
            'diachi.required' => 'Vui lòng nhập địa chỉ.',
        ];
    }
}
