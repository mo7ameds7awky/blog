@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Tag {{$tag->tag_name}}
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Tag Name</th>
                        <th scope="col"># Of times used</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$tag->tag_name}}</td>
                        <td>
                            @php
                                $posts = $tag->posts;
                                echo count($posts);
                            @endphp
                        </td>
                        <td><a class="btn btn-primary" href="{{route('tags.edit', ['id' => $tag->id])}}" role="button">Update</a></td>
                        <td><a class="btn btn-danger" href="{{route('tags.delete', ['id' => $tag->id])}}" role="button">Delete</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection