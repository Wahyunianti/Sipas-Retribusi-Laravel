<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RetribusiUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tanggal' => ['required'],
            'data_pasar_id' => ['required'],
            'bagian_id' => ['required'],
            'jumlah' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'tanggal.required' => 'Kolom tanggal wajib diisi!',

            'data_pasar_id.required' => 'Kolom pasar wajib diisi!',

            'bagian_id.required' => 'Kolom bagian wajib diisi!',

            'jumlah.required' => 'Kolom jumlah wajib diisi!'
            
        ];
    }
}
