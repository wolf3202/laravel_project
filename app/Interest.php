<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = ['name'];

    public function authors()
    {
        return $this->belongsToMany('App/Author', 'author_interest', 'interest_id', 'author_id')->withTimestamps();
    }
}
