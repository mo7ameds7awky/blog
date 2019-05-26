@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
          Create New Tag
        </div>
        <div class="card-body">
            <form action="{{route('tags.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="category_name">Tag Name</label>
                    <input type="text" class="form-control" id="tag_name" name="tag_name" placeholder="Enter Tag Name">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Create</button>
            </form>
        </div>
    </div>
@endsection