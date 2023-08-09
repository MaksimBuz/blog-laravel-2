<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Support\Str;
class BlogPostObserver
{
    protected function getSlug(BlogPost $blogPost)
    {
        if (empty( $blogPost->slug)) {

            $blogPost->slug = Str::slug($blogPost->title);
        }
    }
    protected function setPublishedAt(BlogPost $blogPost)
    {
        if (empty($blogPost->published_at) && $blogPost->is_published) {
            $blogPost->published_at = Carbon::now();
        }
    }
    protected function setHtml(BlogPost $blogPost)
    {
        if ($blogPost->isDirty('content_raw')) {
            $blogPost->content_html=$blogPost->content_raw;
        }
       
    }
    protected function setUser(BlogPost $blogPost)
    {
        $blogPost->user_id=auth()->id() ?? BlogPost::UNKNOWN_USER;
    }
    
    public function created(BlogPost $blogPost): void
    {
        
    }

    public function creating(BlogPost $blogPost): void
    {
        $this->setPublishedAt($blogPost);
        $this->getSlug($blogPost);
        $this->setHtml($blogPost);
        $this->setUser($blogPost);
    }

    public function updated(BlogPost $blogPost)
    {

    }

    public function updating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);
        $this->getSlug($blogPost);
    }

    public function deleted(BlogPost $blogPost): void
    {
       
    }

    public function restored(BlogPost $blogPost): void
    {
      
    }

    public function forceDeleted(BlogPost $blogPost): void
    {
       
    }
}
