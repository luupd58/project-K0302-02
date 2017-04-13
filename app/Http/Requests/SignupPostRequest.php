<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupPostRequest extends FormRequest
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
            'username'=>'required|unique:customers',
            'email'=>'required|email|unique:customers',
            'password'=>'required|between:6,20',
            'fullname'=>'required|min:6',
            're_password'=>'required|same:password',
            'address'=>'required',
            'phone'=>'required|integer'
            //
        ];
    }
}
