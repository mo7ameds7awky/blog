@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit {{$tag->tag_name}} Tag
        </div>
        <div class="card-body">
            <form action="{{route('tags.update', ['id' => $tag->id])}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tag_name">Tag Name</label>
                    <input type="text" class="form-control" id="tag_name" name="tag_name" value="{{$tag->tag_name}}">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
            </form>
        </div>
    </div>
@endsection