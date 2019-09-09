<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * Set fillable Columns
     * @var array
     */
    protected $fillable = [
        'path', 'access'
    ];

    /**
     * Get Owner User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get Video Comments Collection
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }

    /**
     * Get Video views Collection
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function views()
    {
        return $this->morphToMany(View::class, 'viewable');
    }

    /**
     * Get Video shares Collection
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function shares()
    {
        return $this->morphToMany(Share::class, 'shareable');
    }

    /**
     * Get Video likes Collection
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function likes()
    {
        return $this->morphToMany(Like::class, 'likable');
    }
}
