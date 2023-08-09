@extends('layouts.app')
@section('content')
<div class="container">
    @inject('carbon', 'Carbon\Carbon')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('blog.admin.posts.create') }}">Добавить</a>
            </nav>
            <div class="card" >
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Автор</th>
                                <th> Категория</th>
                                <th> Заголовок</th>
                                <th> Дата публикации</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($paginator as $item)
                        <tr>
                            <td>{{$item->id}} </td>
                            <td>{{$item->user->name}} </td>
                            <td>{{$item->category_id}} </td>
                            <td>
                                <a href="{{ route('blog.admin.posts.edit',$item->id) }}"> {{$item->title}}</a>
                               
                            </td>
                            <td>{{$item->published_at ? $carbon::parse($item->published_at)->format('d.M H:i') : ''}} </td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if ($paginator->total()>$paginator->count())
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" >
                <div class="card-body">
                    {{$paginator->links()}}
                </div>
            </div>
        </div>
    </div>
    @endif

</div>
@endsection