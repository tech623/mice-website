<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerify extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'token',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user() // dealer dashboard
    {
        return $this->belongsTo(User::class);
    }
}
