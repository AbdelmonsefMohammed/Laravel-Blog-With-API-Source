<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{

    protected $fillable = [
        'name',
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function posts()
    {
        return $this->hasMany(Posts::class,'cat_id');
    }
}
