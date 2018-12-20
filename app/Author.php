<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * App\Author
 * @property int $id
 * @property string $name
 * @property integer $age
 * @property string $sex
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Author extends Model
{
    protected $fillable = ['name', 'age', 'sex'];

    public function interests() :BelongsToMany
    {
        return $this->belongsToMany(Interest::class, 'author_interest', 'author_id', 'interest_id')->withTimestamps();
    }
}
