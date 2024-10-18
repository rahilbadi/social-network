<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'caption'
    ];

    public function images()
    {
        return $this->hasMany(ImagePost::class,'post_id');
    }

}
