@extends('layouts.main')
@section('content')
    <div>
        <div>#{{ $post->id }} : {{ $post->title }}</div>
        <div>{{ $post->content }}</div>
        <div><a  class="btn btn-secondary mt-3" href="{{ route('post.edit', $post->id) }}">Edit</a></div>
        <div><a  class="btn btn-primary mt-3" href="{{ route('post.index') }}">К списку</a></div>
    </div>
@endsection
