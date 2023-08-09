@extends('layouts.app')
@section('content')
    @if ($item->exists)
        <form action="{{ route('blog.admin.catogiries.update', $item->id) }}" method="POST">
            @method('PATCH')
        @else
            <form action="{{ route('blog.admin.catogiries.store') }}" method="POST">
    @endif
    @csrf
    <div class="container">
        @if ($errors->any())
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('blog.admin.category.includes.item_edit_main_col')
            </div>
            <div class="col-md-3">
                @include('blog.admin.category.includes.item_edit_add_col')
            </div>
        </div>
        </form>
    </div>
@endsection
