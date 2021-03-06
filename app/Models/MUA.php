<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MUA extends Model
{
    protected $table = 'muas';

    protected $fillable = [
        'name', 'slug', 'email', 'logo', 'about', 'facebook', 'instagram', 'bbm', 'line', 'whatsapp'
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
