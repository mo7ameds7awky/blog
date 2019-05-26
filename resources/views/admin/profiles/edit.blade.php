@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
          Update {{$user->name}}
        </div>
        <div class="card-body">
            <form action="{{route('profiles.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" required>
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}" required>
                </div>
                <div class="form-group">
                    <label for="avatar">Photo</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook Profile</label>
                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{$user->profile->facebook}}" required>
                </div>
                <div class="form-group">
                    <label for="youtube">Youtube Profile</label>
                    <input type="text" class="form-control" id="youtube" name="youtube" value="{{$user->profile->youtube}}" required>
                </div>
                <div class="form-group">
                    <label for="about">About You</label>
                    <textarea name="about" id="about" cols="6" rows="6" class="form-control" required>{{$user->profile->about}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Update Profile</button>
            </form>
        </div>
    </div>
@endsection