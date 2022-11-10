<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeleksiRequest extends FormRequest
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
            'pendaftaran_id' => 'required',
            'nilai_baca_alquran' => 'required|numeric',
            'nilai_wawancara'=>'required|numeric',
            'nilai_tulis_arab' => 'required|numeric',
            'kamar' => 'required'
        ];

        if(in_array($this->method(),['PUT','PATCH'])){
            unset($rules['pendaftaran_id']);
        }

        return $rules;
    }
}
