<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    const ROOT = 2;
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description',
    ];
        public function setTitleAttribute($incomingValue)
    {
        return $this->attributes['title'] =mb_strtoupper($incomingValue);
    }
    public function parentCategory()  {
        return $this->BelongsTo(BlogCategory::class,'parent_id','id');
    }
    public function isRoot()  {
        
        return $this->id===BlogCategory::ROOT;
     }
    public function getParentTitleAttribute()  {
       $title=$this->parentCategory->title ?? ($this->isRoot() ? 'Корень':'?? ' );
       return $title;
    }
}