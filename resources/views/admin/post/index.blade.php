@extends('layouts.admin')
@section('content')
    <div><a class="btn btn-primary mb-3" href="{{ route('admin.post.create') }}">Создать</a></div>
    @foreach ($posts as $post)
        <div class="mb-3">
            <a href="{{ route('admin.post.show', $post->id) }}">#{{ $post->id }} : {{ $post->title }}</a>
            <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
            <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST" class="d-inline-block">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-warning" value="Delete">
            </form>
        </div>
    @endforeach
    <div class="mb-3">
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection
