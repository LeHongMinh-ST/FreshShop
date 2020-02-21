<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Customer extends Model
{
    use SoftDeletes;
    use Sortable;

    protected $dates = ['deleted_at'];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function Rates()
    {
        return $this->hasMany(Rate::class);
    }
    public function Oders()
    {
        return $this->hasMany(Oder::class);
    }
}
