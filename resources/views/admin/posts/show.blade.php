@extends('admin.layouts.base')

@section('contents')
    <h1 class="text-center">{{ $post->title }}</h1>
    <img src="{{ $post->url_image }}" alt="{{ $post->title }}">
    <p>{{ $post->content }}</p>
@endsection