<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyType extends Model
{
    use HasFactory;

    protected $table = 'company_types';
    protected $guarded = [];

    public function erps(){
        return $this->belongsTo(Erp::class);
    }
}
