<?php

namespace App;

use Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * App\Author
 * @property int $id
 * @property string $name
 * @property integer $age
 * @property string $sex
 * @property string $avatar
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Author extends Model
{
//    protected $appends = ['avatar_url'];
    protected $fillable = ['name', 'age', 'sex', 'avatar'];

    public function interests() :BelongsToMany
    {
        return $this->belongsToMany(Interest::class, 'author_interest', 'author_id', 'interest_id')->withTimestamps();
    }

    public function getAvatarUrlAttribute(): String
    {
        return $this->avatar ? Storage::disk('public')->url($this->avatar) : '';
    }
}
