<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content'
    ];

    /**
     * Get Commentable Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    public function replies()
    {
        return $this
            ->morphToMany(static::class, 'commentable')
            ;
    }

    public function likes()
    {
        return $this
            ->morphToMany(Like::class, 'likable')
            ;
    }

    /**
     * Get the user that Commented
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
