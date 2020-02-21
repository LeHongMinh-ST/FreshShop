<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{
    use SoftDeletes;
    use Sortable;

    protected $dates = ['deleted_at'];
    protected $table = 'posts';

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Comments()
    {
        return $this->hasMany(PostComment::class);
    }
}
