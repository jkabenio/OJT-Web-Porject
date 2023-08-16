<?php

namespace App\Models;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['blog_post_id', 'content', 'name', 'approved'];

    public function postComment()
    {
        return $this->belongsTo(Blog::class);
    }
}
 