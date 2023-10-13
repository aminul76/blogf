<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'user_id',
        'category_number',
        'category_url',
        
        'category_status',
        'category_short_description',
        'category_description',
        'image',
        'fb_share_image',
        'fb_title',
        'fb_short_description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'image_title',
        'custom_code',
        'header_show',

        
    ];
}
