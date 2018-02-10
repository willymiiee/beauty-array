<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'slug'
    ];

    public function MUA()
    {
        return $this->belongsTo('App\Models\MUA');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
