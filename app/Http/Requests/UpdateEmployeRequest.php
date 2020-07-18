<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'nama' => 'required',
            'email' => 'required|email',
            'company_id' => 'required'
        ];
    }

    public function messages() {
        return [
            'nama.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'gunakan format email',
            'company_id.required' => 'Company tidak boleh kosong'
        ];
    }
}
