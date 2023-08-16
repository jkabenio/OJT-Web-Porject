<?php

namespace App\Models;
use App\Models\Like;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'blog_title',
        'blog_desc',
        'blog_img',
    ];

        public function adminUser()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
