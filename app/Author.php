<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Author
 * @property int $id
 */

class Author extends Model
{
    protected $fillable = ['name', 'age', 'sex'];

    public function interests() :BelongsToMany
    {
        return $this->belongsToMany(Interest::class, 'author_interest', 'author_id', 'interest_id')->withTimestamps();
    }
}
