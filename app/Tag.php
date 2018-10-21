<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User')->select(['name', 'email']);
    }
}
