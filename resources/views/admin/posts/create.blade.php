@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
          Create New Post
        </div>
        <div class="card-body">
            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post Title">
                </div>
                <div class="form-group">
                    <label for="content">Post Content</label>
                    <textarea class="form-control" name="content" id="content" cols="5" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="post_image">Post Image</label>
                    <input class="form-control" type="file" name="post_image" id="post-image">
                </div>
                <div class="form-group">
                    <label for="post-image">Post Category</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags_name">Post Tags</label>
                    @foreach ($tags as $tag)
                        <label class="form-control" for="exampleCheck1">
                            <input type="checkbox" class="form-check-input" name="tags_name[]" id="exampleCheck1" value="{{$tag->id}}">{{$tag->tag_name}}
                        </label>   
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Post</button>
            </form>
        </div>
    </div>
@endsection