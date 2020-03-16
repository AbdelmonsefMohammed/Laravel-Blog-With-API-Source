<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
        'name',
    ];
    public function posts()
    {
        return $this->hasMany(Posts::class);
    }
}
