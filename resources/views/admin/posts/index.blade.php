@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            All Posts
        </div>
        <div class="card-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Trash</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($posts->count() > 0)
                            @foreach ($posts as $post)
                                <tr>
                                    <th scope="row">
                                        @php
                                            $key = array_search($post, $posts->all());
                                            echo $key + 1;
                                        @endphp
                                    </th>
                                    <td><img src="{{$post->post_image}}" alt="{{$post->title}}" width="90px" height="70px"></td>
                                    <td><a href="{{route('posts.show', ['id' => $post->id])}}">{{$post->title}}</a></td>
                                    <td><a class="btn btn-primary" href="{{route('posts.edit', ['id' => $post->id])}}" role="button">Update</a></td>
                                    <td><a class="btn btn-danger" href="{{route('posts.delete', ['id' => $post->id])}}" role="button">Delete</a></td>
                                    <td><a class="btn btn-danger" href="{{route('posts.trash', ['id' => $post->id])}}" role="button">Trash</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="6" class="text-center">No posts. <a href="{{route('posts.create')}}">Create one?</a></th>
                            </tr>
                        @endif
                    </tbody>
            </table>
        </div>
    </div>
@endsection