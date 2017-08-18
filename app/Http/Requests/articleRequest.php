<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class articleRequest extends FormRequest
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
            'title' => 'required|max:20',
            'content' => 'required|min:20'
        ];
    }
    public function messages(){
        return [
            'title.required' => '标题不能为空',
            'content.required' => '文章内容不能为空',
            'title.max' => '标题不能超过20位',
            'content.min' => '文章内容不能小于20位'
        ];
    }
}
