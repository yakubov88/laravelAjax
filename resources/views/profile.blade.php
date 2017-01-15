@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <img src="/uploads/avatars/{{$user->avatar}}" alt=""style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px">
                <h3>{{$user->name}}'s profile</h3>
                <form action="/profile" enctype="multipart/form-data" method="post">
                    <lable>Update Profile Image</lable>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">


                </form>
            </div>
        </div>
    </div>
@endsection
