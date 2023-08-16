<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'cat_title',
        'cat_description',
        'cat_img',
        'cat_rating',
        'cat_comment',
    ];

    protected $table = 'categories';
    protected $dates = ['deleted_at'];
}
