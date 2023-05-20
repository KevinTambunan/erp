<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Erp extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function moduls(){
        return $this->hasMany(Modul::class);
    }

    public function types(){
        return $this->hasMany(CompanyType::class);
    }

    public function respon(){
        return $this->hasMany(ErpRespon::class);
    }
}
