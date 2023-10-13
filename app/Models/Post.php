<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_title',
        'post_number',
        'post_short_description',
        'post_image',
        'category_id',
        'user_id',
        'post_position',
        'status',
        'post_home_show',
        'post_slide',
        'fb_title',
        'fb_image',
        'fb_short_description',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'post_custom_url',
        'post_custom_code',
        'post_description',
        
    ];

    // Define relationships with other models
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
