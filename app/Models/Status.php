<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Status extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'status_description',
    ];
    public function adminUserStatus()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }
}
