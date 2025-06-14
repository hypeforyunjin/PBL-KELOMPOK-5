<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'user_id',
        'receiver_id',
        'sender_type',
        'receiver_type',
        'message',
        'sender',
    ];
}