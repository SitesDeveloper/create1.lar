@extends('layouts.main')
@section('content')
    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" placeholder="content">{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" class="form-control" name="image" id="image" placeholder="Image" value="{{ $post->image }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
