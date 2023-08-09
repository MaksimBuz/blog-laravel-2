<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class BlogCategoryRepository extends CoreRepository
{
    public function getEdit($id)
    {
        return $this->startCondions()->find($id);
    }

    public function getForComboBox()
    {
        $fields = implode(',', [
            'id', 'CONCAT(id,". ",title) AS title',
        ]);

        $result = $this->startCondions()
            ->selectRaw( $fields)
            ->toBase()
            ->get();
        return  $result;
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate($perPage = null)
    {
        $fields = ['id', 'title', 'parent_id'];
        $result = $this->startCondions()->select($fields)->with('parentCategory:id,title')->paginate($perPage);
        return  $result;
    }
}
