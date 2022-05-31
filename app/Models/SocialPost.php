<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'social_auth_id',
        'user_id',
        'comment',
        'facebook',
        'twitter',
        'hour',
        'date',
        'status'
    ];
}
