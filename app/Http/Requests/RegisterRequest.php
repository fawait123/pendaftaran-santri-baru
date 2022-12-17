<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        $rules =  [
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user,email',
            'password' => 'required|string|min:8|confirmed',
            'username' => 'required|string|unique:user,username',
            'no_hp' => 'required|string|min:10',
        ];

        if(in_array($this->method(),['PUT','PATCH'])){
            $rules['email'] = 'required|string|email|max:255|unique:user,email,'.$this->segment('3').',id_user';
            $rules['username'] = 'required|string|unique:user,username,'.$this->segment('3').',id_user';
            unset($rules['password']);
        }

        return $rules;
    }
}
