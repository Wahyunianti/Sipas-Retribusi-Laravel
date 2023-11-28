<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:191',
            'email' => 'required|email|max:191',
            'role_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kolom nama lengkap wajib diisi!',
            'name.min' => 'Kolom nama lengkap minimal 3 karakter!',
            'name.max' => 'Kolom nama lengkap maksimal 191 karakter!',

            'email.required' => 'Kolom email wajib diisi!',
            'email.email' => 'Kolom email harus email yang valid!',
            'email.max' => 'Kolom email maksimal 191 karakter!',


            'role_id.required' => 'Kolom level wajib diisi!',
        ];
    }
}
