<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Oder extends Model
{
    use SoftDeletes;
    use Sortable;

    protected $dates = ['deleted_at'];
    protected $table='oders';
    public $sortable = ['id','name','date_oder','payment','status'];
    public $timestamps = true;

    public function Products()
    {
       return $this->belongsToMany(Product::class)->withPivot(['quantity','unit_price']);
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
