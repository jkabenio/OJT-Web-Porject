<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Video extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'video_title',
        'video_description',
        'video_path',
        // 'video_thumbnail_path',
        'user_id',
    ];
    public function adminUserVideo()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }
}




