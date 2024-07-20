<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todoo extends Model
{
    use HasFactory;
    protected $fillable = [
        'task', 'completed', 'approval_status', 'rejection_reason',
    ];
}
