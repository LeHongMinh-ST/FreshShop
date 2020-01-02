<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    public $timestamps = true;

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
