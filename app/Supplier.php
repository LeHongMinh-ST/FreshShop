<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    public function Imports()
    {
        return $this->hasMany(Import::class);
    }
}
