<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    protected $table='user_info';
    public $timestamps =true;

    public function user()
    {
       return $this->belongsTo(User::class,'user_id');
    }

}
