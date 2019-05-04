@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Post {{$post->title}}
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Post Image</th>
                        <th scope="col">Post Title</th>
                        <th scope="col">Post Category</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Trash</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="{{$post->post_image}}" alt="{{$post->title}}" width="90px" height="70px"></td>
                        <td>{{$post->title}}</td>
                        <td>
                            @php
                                $category = $post->category;
                                echo $category->category_name;
                            @endphp
                        </td>
                        <td><a class="btn btn-primary" href="{{route('posts.edit', ['id' => $post->id])}}" role="button">Update</a></td>
                        <td><a class="btn btn-danger" href="{{route('posts.delete', ['id' => $post->id])}}" role="button">Delete</a></td>
                        <td><a class="btn btn-danger" href="{{route('posts.trash', ['id' => $post->id])}}" role="button">Trash</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection