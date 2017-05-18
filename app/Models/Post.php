<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'tags'
    ];

    public function MUA()
    {
        return $this->belongsTo('App\Models\MUA');
    }

    public function created_by()
    {
        return $this->belongsTo('App\Models\User', 'foreign_key');
    }
}
