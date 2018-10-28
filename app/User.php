<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Hootlex\Friendships\Traits\Friendable;
use App\Interest;

class User extends Authenticatable
{
    use Friendable;

    // Added for creation of many-to-many relationship with Interests
    public function interests()
    {
        return $this->belongsToMany(Interest::class, 'user_interest');
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
