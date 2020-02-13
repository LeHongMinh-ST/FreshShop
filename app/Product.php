<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'products';
    public $timestamps = true;

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Oders()
    {
        return $this->belongsToMany(Oder::class);
    }

    public function Imports()
    {
        return $this->belongsToMany(Import::class);
    }

    public function Images()
    {
        return $this->hasMany(Image::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Sale()
    {
        return $this->hasOne(Sale::class);
    }

    public function Rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function Warehouse()
    {
        return $this->hasOne(Warehouse::class);
    }
}
