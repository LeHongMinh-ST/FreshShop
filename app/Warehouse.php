<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Warehouse extends Model
{
    use Sortable;
    protected $table = 'warehouses';
    public $sortable = ['product_id','import','sell','remain','status'];
    public $timestamps = true;

    public function Product()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
