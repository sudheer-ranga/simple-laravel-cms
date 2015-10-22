<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'slug'];

    public $timestamps = true;

    protected $dates = ['deleted_at'];

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
