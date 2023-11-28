<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasarUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_pasar' => 'required|min:3|max:191'
        ];
    }

    public function messages()
    {
        return [
            'nama_pasar.required' => 'Kolom nama wajib diisi!',
            'nama_pasar.min' => 'Kolom nama minimal 3 karakter!',
            'nama_pasar.max' => 'Kolom nama maksimal 191 karakter!'
        ];
    }
}
