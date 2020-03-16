<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    //
    protected $fillable = [
        'title', 'body', 'img' , 'author','cat_id'
    ];
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function categories()
    {
        return $this->belongsTo(Categories::class,'cat_id');
    }

}

