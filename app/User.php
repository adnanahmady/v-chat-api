<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'access'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'activated_at' => 'datetime',
    ];

    /**
     * Get Activated Or Not Activated User
     *
     * @param      $query
     * @param bool $isActivate
     *
     * @return mixed
     */
    public function scopeActivated($query, $isActivate = TRUE)
    {
        $cond = $isActivate ? '<>' : '=';

        return $query->where('activated_at', $cond, NULL);
    }

    /**
     * Every User has one profile for it self
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get user profile avatar
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */
    public function avatar()
    {
        return $this->hasOneThrough(Avatar::class, Profile::class);
    }

    /**
     * Get all user liked Videos|Comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Get all user commented Videos|Comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all user shared videos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shares()
    {
        return $this->hasMany(Share::class);
    }

    /**
     * Get all user viewed videos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function views()
    {
        return $this->hasMany(View::class);
    }

    /**
     * Get all user roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this
            ->belongsToMany(Role::class)
            ->using(RoleUser::class)
            ->withTimestamps();
    }

    /**
     * Get all user videos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
