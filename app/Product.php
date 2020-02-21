<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{

    use SoftDeletes;
    use Sortable;
    protected $dates = ['deleted_at'];
    protected $table = 'products';
    public $sortable = ['id','name','category_id','price_import','price_sell','unit','status'];
    public $timestamps = true;

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Oders()
    {
        return $this->belongsToMany(Oder::class)->withPivot(['quantity','unit_price']);
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

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }
}
