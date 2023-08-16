<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Notification extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'company_name',
        'email',
        'contact_number',
        'message',
    ];

    protected $table = 'notifications';
    protected $dates = ['deleted_at','read_at'];
}
