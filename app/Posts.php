<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    //
    protected $fillable = [
        'title', 'body', 'img' , 'author'
    ];
    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
