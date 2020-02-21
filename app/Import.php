<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Import extends Model
{
    use SoftDeletes;
    use Sortable;
    public $sortable = ['id','date_import','payment','status'];
    protected $dates = ['deleted_at'];
    protected $table='imports';
    public $timestamps = true;

    public function Products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity','price']);
    }

    public function Supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
