<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
    protected $table='oders';
    public $timestamps = true;

    public function Products()
    {
       return $this->belongsToMany(Product::class);
    }
}
