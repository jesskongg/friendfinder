<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Course extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'enrollment');
    }
}
