@extends('admin.layouts.base')

@section('contents')
<h1 class="text-center mt-3 mb-3">Post</h1>

{{-- @if (session('delete_success'))
    <div class="alert alert-danger">
        {{ session('delete_success') }}
    </div>
@endif --}}

{{-- <table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titolo</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->url_image }}</td>
            <td class="d-flex gap-2">
                <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">View</a>
                <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-warning">Edit</a>
                <form
                action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}"
                method="POST"
                class="d-inline-block">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>  
{{ $posts->links() }} --}}
<div class="d-flex gap-2">
@foreach ($posts as $post)
    <div class="card" style="width: 18rem;">
        <img src="{{ $post->url_image }}" class="card-img-top" alt="{{ $post->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary align-self-end">View</a>
            <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-warning">Edit</a>
            <form
            action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}"
            method="POST"
            class="d-inline-block">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
    {{ $posts->links() }}

@endsection