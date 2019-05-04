@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Category {{$category->category_name}}
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Category Name</th>
                        <th scope="col"># Of times used</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$category->category_name}}</td>
                        <td>
                            @php
                                $posts = $category->posts;
                                echo count($posts);
                            @endphp
                        </td>
                        <td><a class="btn btn-primary" href="{{route('categories.edit', ['id' => $category->id])}}" role="button">Update</a></td>
                        <td><a class="btn btn-danger" href="{{route('categories.delete', ['id' => $category->id])}}" role="button">Delete</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection