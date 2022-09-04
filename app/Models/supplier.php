<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $table = "supplier";

    protected $fillable = [
        'name_supplier',
        'email_supplier',
        'address_supplier',
        'phone_supplier'
    ];
}

// terminal php arisan make:model nawek