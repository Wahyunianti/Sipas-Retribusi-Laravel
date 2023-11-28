<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BagianStoreRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_bagian' => 'required|min:3|max:191'
        ];
    }

    public function messages()
    {
        return [
            'nama_bagian.required' => 'Kolom nama wajib diisi!',
            'nama_bagian.min' => 'Kolom nama minimal 3 karakter!',
            'nama_bagian.max' => 'Kolom nama maksimal 191 karakter!'
        ];
    }
}
