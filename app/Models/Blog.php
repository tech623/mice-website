<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'blog_title',
        'banner_image',
        'author',
        'date',
        'thumbnail_description',
        'full_description',
        'job_title',
        'company_name',
        'tags',
        'blog_slug',
        'author_description',
        'facebook_link',
        'instagram_link',
        'linkedin_link',
        'twitter_link',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    protected $appends = [
        'author_desc'
    ];

    protected $dates = ['date'];

    public function getAuthorDescAttribute()
    {
        $vars = array_filter(array($this->job_title,$this->company_name));
        return implode(',', $vars);
    }
}
