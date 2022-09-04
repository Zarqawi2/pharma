<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buy extends Model
{
    protected $table = "buy";

    protected $fillable = [
        'id',
        'name',
        'supplier',
        'count',
        'price',
        'expire',
        'debt',
        'type'
    ];

    public function one_supplier(){
        return $this->hasOne('App\Models\supplier' , 'id' , 'supplier');
    }
}
