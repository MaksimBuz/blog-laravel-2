<?php

namespace App\Observers;

use App\Models\BlogCategory;
use Illuminate\Support\Str;
class BlogCategoryObserver
{  
    protected function getSlug(BlogCategory $blogCategory)
    {
        if (empty( $blogCategory->slug)) {
            $blogCategory->slug = Str::slug($blogCategory->title);
        }
    }

    public function created(BlogCategory $blogCategory): void
    {
     
    }
    
    public function creating(BlogCategory $blogCategory): void
    {
        $this->getSlug($blogCategory);
    }

    public function updated(BlogCategory $blogCategory): void
    {
     
    }

    public function updating(BlogCategory $blogCategory): void
    {
        $this->getSlug($blogCategory);
    }

    public function deleted(BlogCategory $blogCategory): void
    {
        
    }

    public function restored(BlogCategory $blogCategory): void
    {
       
    }

    public function forceDeleted(BlogCategory $blogCategory): void
    {
       
    }
}
