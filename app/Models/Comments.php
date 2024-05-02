<?php

namespace App\Models;

use App\Http\Controllers\CommentsController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comments extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getUser():HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function getPost():HasOne
    {
        return $this->hasOne(Posts::class,'id','blog_id');
    }

    public function getComment():HasMany
    {
        return $this->hasMany(Comments::class,'parent_id','id');
    }

    public function getReplies():HasMany
    {
        return $this->hasMany(Comments::class,'parent_id','id');
    }
}
