<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DealComment extends Model
{
    use HasFactory;

    public function dealpostedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'posted_by','id');
    }
}
