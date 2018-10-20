<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    public function tags()
    {
        return $this->hasMany('App\Tag')->select(['user_id', 'tag']);
    }
}
