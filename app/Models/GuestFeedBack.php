<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestFeedBack extends Model
{
    use HasFactory;
    protected $fillable = [
        'q_one',
        'q_two',
        'q_three',
        'guest_comment',
    ];

    protected $table = 'guest_feed_backs';
}
