<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Hootlex\Friendships\Traits\Friendable;
use App\Interest;
use App\Course;
use Cmgmyr\Messenger\Traits\Messagable;


class User extends Authenticatable
{
    use Friendable;
    use Messagable;

    // Added for creation of many-to-many relationship with Interests
    public function interests()
    {
        return $this->belongsToMany(Interest::class, 'user_interest');
    }

    use Notifiable;

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'bio', 'major', 'minor', 'github', 'linkedin'
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
