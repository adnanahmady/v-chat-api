<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    /**
     * Get Shareable Model
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function shareable()
    {
        return $this->morphTo();
    }

    /**
     * Get The User that shared
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
