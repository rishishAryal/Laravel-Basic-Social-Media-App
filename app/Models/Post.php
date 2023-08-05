<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    use HasFactory;
    protected $fillable = [
        'post_caption',
        'post_image',
        'user_id'

    ];
}
