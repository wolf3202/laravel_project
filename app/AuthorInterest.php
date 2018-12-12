<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuthorInterest extends Pivot
{
    protected $table = 'authors_interest';
    public $timestamps = false;

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function interest(): BelongsTo
    {
        return $this->belongsTo(Interest::class);
    }
}
