@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach ($data as $item)
            <div class="post-conteiner">
                <div class="post-title">
                  <p>"{{ $item->title }}"</p> 
                
                </div>  
                <p>{{$item->content_raw}}</p>
                <p>Дата публикации {{$item->created_at}}</p>
                <p>Автор: {{$item->user->name}}</p>
            </div>

        @endforeach
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
