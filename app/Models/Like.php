<?php

namespace App\Models;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = ['blog_post_id',
                        'user_ip'];
    public function post()
    {
        return $this->belongsTo(Blog::class, 'blog_post_id');
    }
}
