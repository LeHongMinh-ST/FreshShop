<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rates';
    public $timestamps = true;

    public function Product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
