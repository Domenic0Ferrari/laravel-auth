@extends('admin.layouts.base')

@section('contents')
<h1>Post</h1>

{{-- @if (session('delete_success'))
    <div class="alert alert-danger">
        {{ session('delete_success') }}
    </div>
@endif --}}

<table class="table">
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
            <td>
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
{{ $posts->links() }}

@endsection