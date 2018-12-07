<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = ['interest'];

    public function authors()
    {
        return $this->belongsToMany('App/Author');
    }
}
