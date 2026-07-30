<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupervisorHasAgent extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'supervisor_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
}
