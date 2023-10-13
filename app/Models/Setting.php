<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'website_name',
        'website_title',
        'website_short_description',
        'website_logo',
        'website_favicon',
        'website_fb',
        'website_wp',
        'website_yt',
        'website_tw',
        'website_ln',
        'website_phone_number',
        'website_email',
        'website_address',
        'website_banner',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'logo_title',
        'banner_title',
        'header_custom_code',
        'body_custom_code',
    ];
}
