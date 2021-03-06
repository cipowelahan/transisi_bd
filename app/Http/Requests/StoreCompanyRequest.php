<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'nama' => 'required',
            'email' => 'required|email|unique:companies',
            'logo' => 'required|image|dimensions:min_width=100,min_height=100|mimes:png|max:2048',
            'website' => 'required'
        ];
    }

    public function messages() {
        return [
            'nama.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'gunakan format email',
            'email.unique' => 'Email sudah digunakan',
            'logo.required' => 'Logo tidak boleh kosong',
            'logo.image' => 'gunakan file bergambar',
            'logo.dimensions' => 'ukuruan logo minimal 100x100 px',
            'logo.mimes' => 'hanya gambar .png yang diperbolehkan',
            'logo.max' => 'maksimal ukuran logo 2MB',
            'website.required' => 'Website tidak boleh kosong'
        ];
    }
}
