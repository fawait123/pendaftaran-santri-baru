<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormulirRequest extends FormRequest
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
              "nama_lengkap" => "required",
              "tempat_lahir" => "required",
              "tgl_lahir" => "required",
              "jenis_kelamin" => "required",
              "berat_badan" => "required",
              "tinggi_badan" => "required",
              "alamat" => "required",
              "asal_sekolah" => "required",
              "jenjang_pend" => "required",
              "hobi" => "required",
              "anak_ke" => "required",
              "no_kk" => "required",
              "nik" => "required",
              "no_hp" => "required",
              "email" => "required",
              "nik_ayah" => "required",
              "nama_ayah" => "required",
              "thn_daftar" => "required",
              "pekerjaan_ayah" => "required",
              "nik_ibu" => "required",
              "nama_ibu" => "required",
              "pekerjaan_ibu" => "required",
              "foto" => 'required|image|mimes:jpg,png|max:512',
              "fc_kk" => 'required|image|mimes:jpg,png|max:512',
              "fc_akta" => 'required|image|mimes:jpg,png|max:512',
              'gol_darah'=> 'required|in:A,B,AB,O,Tidak Tahu'
        ];
    }
}
