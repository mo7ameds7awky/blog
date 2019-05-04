@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
          Create New Category
        </div>
        <div class="card-body">
            <form action="{{route('categories.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category Name">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Create</button>
            </form>
        </div>
    </div>
@endsection