<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'age', 'sex'];

    public function interests()
    {
        return $this->belongsToMany('App/Interest');
    }
}
