<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Import extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
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
