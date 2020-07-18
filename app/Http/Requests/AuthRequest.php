<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest {
    
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages() {
        return [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'gunakan format email',
            'password.required' => 'Password tidak boleh kosong'
        ];
    }
}
