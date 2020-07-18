<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'nama' => 'required',
            'email' => 'required|email|unique:employees',
            'company_id' => 'required'
        ];
    }

    public function messages() {
        return [
            'nama.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'gunakan format email',
            'email.unique' => 'Email sudah digunakan',
            'company_id.required' => 'Company tidak boleh kosong'
        ];
    }
}
