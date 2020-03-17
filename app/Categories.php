<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
    ];

    
    protected $dates = ['deleted_at'];

    public function posts()
    {
        return $this->hasMany(Posts::class,'cat_id');
    }
}
