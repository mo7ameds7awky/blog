@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            All Users
        </div>
        <div class="card-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Permissions</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->count() > 0)
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">
                                        @php
                                            $key = array_search($user, $users->all());
                                            echo $key + 1;
                                        @endphp
                                    </th>
                                    <td><img src="{{asset($user->profile->avatar)}}" alt="{{$user->name}}" width="50px" height="50px" style="border-radious: 50%;"></td>
                                    <td>{{$user->name}}</td>
                                    @if ($user->admin)
                                        <td><a class="btn btn-primary" href="{{route('users.permission', ['id' => $user->id])}}" role="button">Make User</a></td>
                                    @else
                                        <td><a class="btn btn-primary" href="{{route('users.permission', ['id' => $user->id])}}" role="button">Make Admin</a></td>
                                    @endif
                                    @if (Auth::id() !== $user->id)
                                        <td><a class="btn btn-danger" href="{{route('users.delete', ['id' => $user->id])}}" role="button">Delete</a></td>
                                    @else
                                        <td>My Self.</td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="5" class="text-center">No posts. <a href="{{route('users.create')}}">Create one?</a></th>
                            </tr>
                        @endif
                    </tbody>
            </table>
        </div>
    </div>
@endsection