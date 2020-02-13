<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'warehouses';
    public $timestamps = true;

    public function Product()
    {
        return $this->belongsTo(Warehouse::class,'product_id');
    }
}
