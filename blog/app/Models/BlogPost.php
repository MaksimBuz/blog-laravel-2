<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $dates=[

    //     'published_at'
    // ];
  const  UNKNOWN_USER=2;
protected $fillable=[
    'title',
    'slug',
    'category_id',
    'excerpt',
    'content_raw',
    'is_published',
    'user_id',
    'published_at'
];
    public function Category()  {
        return $this->BelongsTo(BlogCategory::class);
    }

    public function User()  {
        return $this->BelongsTo(User::class);
    }
}