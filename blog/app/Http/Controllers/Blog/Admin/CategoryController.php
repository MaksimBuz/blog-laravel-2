<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController;
use App\Http\Requests\BlogCategoruUpdateRequest;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;

class CategoryController extends BaseController
{
    private $blogCategoryRepository;
    public function __construct() 
    {
        // parent::__construct() ;
        $this->blogCategoryRepository=app(BlogCategoryRepository::class);
    }

    public function index()
    {
        $paginator=$this->blogCategoryRepository->getAllWithPaginate(5);
        return view('blog.admin.category.index',compact('paginator'));
    }
    public function create()
    {
        $item=new BlogCategory();
        $categoryList=BlogCategory::all();
        return view('blog.admin.category.edit',compact('item','categoryList'));
    }

    public function store(BlogCategoryCreateRequest $request)
    {
        $data= $request->validated();
        $item=  BlogCategory::firstOrCreate($data);
        if ($item) {
            return redirect()->route('blog.admin.catogiries.edit',[$item->id])->with(['success'=>'Успех']);
  
          }
          else{
              return back()->withErrors(['msg'=>'Ошибка сохранения'])->withInput();
  
          }
    }

    public function edit( $id )
    {

        $item=$this->blogCategoryRepository->getEdit($id);
        if (empty($item)) {
         abort(404);
        }
        $categoryList=$this->blogCategoryRepository->getForComboBox();
        return view('blog.admin.category.edit',compact('item','categoryList'));

    }

    public function update(BlogCategoruUpdateRequest $request, string $id)
    {
        $validationData=$request->validated();
        $item=BlogCategory::find($id);
        if (empty($item)) {
          return back()->withErrors(['msg'=>'Запись id не найдена'])->withInput();
        }
        $data=$request->all();
        $result=$item->update($data);
        if (  $result) {
          return redirect()->route('blog.admin.catogiries.edit',$item->id)->with(['success'=>'Успех']);

        }
        else{
            return back()->withErrors(['msg'=>'Ошибка сохранения'])->withInput();
        }
    }
}
