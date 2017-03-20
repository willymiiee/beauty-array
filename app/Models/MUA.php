<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MUA extends Model
{
    protected $fillable = [
        'name', 'slug', 'email', 'logo', 'about', 'facebook', 'instagram', 'bbm', 'line', 'whatsapp'
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
