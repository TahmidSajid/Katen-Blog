<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Posts extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getUser():HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function getCategory():HasOne
    {
        return $this->hasOne(Categories::class,'id','blog_category');
    }
}
