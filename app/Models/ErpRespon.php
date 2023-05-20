<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErpRespon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function erp(){
        return $this->belongsTo(Erp::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
