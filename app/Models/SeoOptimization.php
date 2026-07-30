<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoOptimization extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];
}
