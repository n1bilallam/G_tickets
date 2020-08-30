@extends('layouts.app')
@section('content')

<div class="lg:container">
    <div class="row-auto bg-white" style="height: 500px">
        <div class="px-4 py-4">
            <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->name }}'s Profile</h2>
            <form class="py-3" enctype="multipart/form-data" action="/users/profile" method="POST">
                <label>Update Profile Image</label>
                <br>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="bg-blue text-sm rounded py-2 px-4 ">
            </form>
        </div>
    </div>
</div>
@endsection