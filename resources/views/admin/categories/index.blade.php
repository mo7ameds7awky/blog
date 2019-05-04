@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            All Categories
        </div>
        <div class="card-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categories->count() > 0)
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">
                                        @php
                                            $key = array_search($category, $categories->all());
                                            echo $key + 1;
                                        @endphp
                                    </th>
                                    <td><a href="{{route('categories.show', ['id' => $category->id])}}">{{$category->category_name}}</a></td>
                                    <td><a class="btn btn-primary" href="{{route('categories.edit', ['id' => $category->id])}}" role="button">Update</a></td>
                                    <td><a class="btn btn-danger" href="{{route('categories.delete', ['id' => $category->id])}}" role="button">Delete</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="4" class="text-center">No available categories. <a href="{{route('categories.create')}}">Create one?</a></th>
                            </tr>
                        @endif
                        
                    </tbody>
            </table>
        </div>
    </div>
@endsection