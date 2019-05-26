@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            All Tags
        </div>
        <div class="card-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tag Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($tags->count() > 0)
                            @foreach ($tags as $tag)
                                <tr>
                                    <th scope="row">
                                        @php
                                            $key = array_search($tag, $tags->all());
                                            echo $key + 1;
                                        @endphp
                                    </th>
                                    <td><a href="{{route('tags.show', ['id' => $tag->id])}}">{{$tag->tag_name}}</a></td>
                                    <td><a class="btn btn-primary" href="{{route('tags.edit', ['id' => $tag->id])}}" role="button">Update</a></td>
                                    <td><a class="btn btn-danger" href="{{route('tags.delete', ['id' => $tag->id])}}" role="button">Delete</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="4" class="text-center">No available tags. <a href="{{route('tags.create')}}">Create one?</a></th>
                            </tr>
                        @endif
                        
                    </tbody>
            </table>
        </div>
    </div>
@endsection