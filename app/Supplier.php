<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Supplier extends Model
{
    use SoftDeletes;
    use Sortable;

    protected $dates = ['deleted_at'];
    public $timestamps = true;

    public function Imports()
    {
        return $this->hasMany(Import::class);
    }
}
