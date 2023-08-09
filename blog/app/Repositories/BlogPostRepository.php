<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class BlogPostRepository extends CoreRepository
{
  

    protected function getModelClass()
    {
        return Model::class;
    }
    public function getEdit($id)
    {
        return $this->startCondions()->find($id);
    }
    public function getAllWithPaginate()
    {
        $fields = ['id', 'category_id','user_id', 'slug','title','is_published','published_at'];
        $result = $this->startCondions()->select($fields)->orderBy('id','DESC')->where('is_published','1')->with(['category','user'])->paginate(5);
        return  $result;
    }

    public function getAll()
    {
        $fields = ['id', 'category_id','user_id', 'slug','title','content_raw','created_at','is_published'];
        $result = $this->startCondions()->select($fields)->where('is_published',1)->orderBy('id','DESC')->with(['category','user'])->paginate(5);
        return  $result;
    }
}
