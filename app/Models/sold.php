<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sold extends Model
{
    protected $table = "sold";

    protected $fillable = [
        'user_id',
        'buy_id',
        'clean',
        'price_at',
        'piece_at'
    ];


    public function casher(){
        return $this->hasOne('App\Models\User' , 'id' , 'user_id');
        //ama relation krawa la bainy user w idyakay 
    }

    public function one_buy(){
        return $this->hasOne('App\Models\buy' , 'id' , 'buy_id');
    }
}
