<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

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
}
