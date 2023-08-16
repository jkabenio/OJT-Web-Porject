<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FAQs extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'answers',
        'questions',
    ];

    protected $table = 'faq';
    protected $dates = ['deleted_at'];
}
