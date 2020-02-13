<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    public $timestamps = true;

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
