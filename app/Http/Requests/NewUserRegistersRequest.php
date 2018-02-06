<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewUserRegistersRequest extends FormRequest
{

    public function authorize() { return true ; }

    public function rules()
    {
        return [

            'email' => 'required|unique:users|email',
            'name' => 'required',
            'body' => 'required',

        ];
    }
}
