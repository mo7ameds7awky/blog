@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
          Create New User
        </div>
        <div class="card-body">
            <form action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter User Name" required>
                </div>
                <div class="form-group">
                    <label for="email">User Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter User Email" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Add</button>
            </form>
        </div>
    </div>
@endsection