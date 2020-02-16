<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Oder extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='oders';
    public $timestamps = true;

    public function Products()
    {
       return $this->belongsToMany(Product::class)->withPivot(['quantity','unit_price']);
    }
}
