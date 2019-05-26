@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
          Create New User
        </div>
        <div class="card-body">
            <form action="{{route('settings.update')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" class="form-control" id="site_name" name="site_name" value="{{$settings->site_name}}" required>
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{$settings->contact_number}}" required>
                </div>
                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input type="text" class="form-control" id="contact_email" name="contact_email" value="{{$settings->contact_email}}" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$settings->address}}" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Update Settings</button>
            </form>
        </div>
    </div>
@endsection