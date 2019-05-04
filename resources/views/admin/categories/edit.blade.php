@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
          Edit {{$category->category_name}} Category
        </div>
        <div class="card-body">
            <form action="{{route('categories.update', ['id' => $category->id])}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" value="{{$category->category_name}}">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
            </form>
        </div>
    </div>
@endsection