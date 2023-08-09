<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController;
use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Models\BlogPost;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPostRepository;


class PostController extends BaseController
{
    private $blogPostRepository;
    private $blogCategoryRepository;
    public function __construct()
    {
        // parent::__construct() ;
        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    public function index()
    {
        $paginator = $this->blogPostRepository->getAllWithPaginate();
        return view('blog.admin.posts.index', compact('paginator'));
    }
    public function create()
    {      
        $item=new BlogPost();
        $categoryList=$this->blogCategoryRepository->getForComboBox();
        return view('blog.admin.posts.edit',compact('item','categoryList'));
    }

    public function store( BlogPostCreateRequest  $request)
    {
        $data= $request->validated();
        $item=  BlogPost::firstOrCreate($data);
        if ($item) {
            return redirect()->route('blog.admin.posts.edit',[$item->id])->with(['success'=>'Успех']);
          }
          else{
              return back()->withErrors(['msg'=>'Ошибка сохранения'])->withInput();
          }
    }

    public function edit($id)
    {
        $item = $this->blogPostRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }
        $categoryList = $this->blogCategoryRepository->getForComboBox();
        return view('blog.admin.posts.edit', compact('item', 'categoryList'));
    }

    public function update(BlogPostUpdateRequest $request, string $id)
    {
        $item = $this->blogPostRepository->getEdit($id);
        if (empty($item)) {
            return back()->withErrors(['msg' => 'Запись id не найдена'])->withInput();
        }
        $data = $request->all();
        $result = $item->update($data);
        if ($result) {
            return redirect()->route('blog.admin.posts.edit', $item->id)->with(['success' => 'Успех']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])->withInput();
        }
    }

    public function show()
    {   
        $data = $this->blogPostRepository->getAll();
        return view('blog.main.postsShow',compact('data'));
    }
    public function destroy($id)
    {
       $result=BlogPost::destroy($id);
       if ($result) {
        return redirect()->route('blog.admin.posts.index')->with(['success' => 'Запись удалена']);
       }
       else{
        return back()->withErrors(['msg' => 'Ошибка удаления'])->withInput();
       }
    }
}
