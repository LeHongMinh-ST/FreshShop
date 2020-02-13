<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $table='imports';
    public $timestamps = true;

    public function Products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function Supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
