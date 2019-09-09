<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path', 'title'
    ];

    /**
     * Get Avatars Profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
