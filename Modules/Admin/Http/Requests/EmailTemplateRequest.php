<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailTemplateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=> 'required',
            'from' => 'required|email',

        ];
    }

    public function messages()
    {
        return [
            'from.email' => 'Please enter a valid email address',
            'from.required' => 'Email address is required',
            'title.required'=>'Title field is required'
        ];
    }
}
