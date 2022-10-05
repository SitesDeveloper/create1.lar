@extends('layouts.main')
@section('content')
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" 
                value="{{ old('title') }}">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" placeholder="content">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" class="form-control" name="image" id="image" placeholder="Image"
                value="{{ old('image') }}">
            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="Category">Category</label>
            <select class="form-control" id="Category" name="category_id">
                @foreach ($categories as $category)
                    <option 
                        @if ($category->id == old('category_id'))
                            @selected(true)
                        @endif
                    value="{{ $category->id }}">{{ $category->title }}</option>    
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>    
                @endforeach
            </select>
        </div>


        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Create</button>
            <div><a  class="btn btn-secondary mt-3" href="{{ route('post.index') }}">К списку</a></div>
        </div>
    </form>
@endsection
