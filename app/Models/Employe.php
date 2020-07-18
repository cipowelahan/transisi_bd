<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model {
    
    protected $fillable = [
        'company_id', 'email', 'nama'
    ];

    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
