@extends('layouts.login')

@section('content')

<div class="profile-container">
    
    <div class="profile-content">
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="profile-form mt-5">
            <div class="profile-img">
                <img src="{{asset('storage/'.Auth::user()->images)}}" class="rounded-circle" width="50" height="50">
            </div>
            <div class="w-50">
            <form action="/profile/update" method="post" enctype="multipart/form-data">
            <div class="d-flex" style="justify-content:space-between">
                <p class="ml-5"><label>username</label></p>
                <p class="mr-5"><input type="text" name="username" value="{{Auth::user()->username}}"></p>
            </div>
            <div class="d-flex" style="justify-content:space-between">
                <p class="ml-5"><label>mailadress</label></p>
                <p class="mr-5"><input type="mail" name="mailadress" value="{{Auth::user()->mail}}"></p>
            </div>
            <div class="d-flex" style="justify-content:space-between">
                <p class="ml-5"><label>password</label></p>
                <p class="mr-5"><input type="password" name="password"></p>
            </div>
            <div class="d-flex" style="justify-content:space-between">
                <p class="ml-5"><label>passwrod comfirm</label></p>
                <p class="mr-5"><input type="password" name="password_confirmation"></p>
            </div>
            <div class="d-flex" style="justify-content:space-between">
                <p class="ml-5"><label>bio</label></p>
                <p class="mr-5"><input type="text" name="bio" value="{{Auth::user()->bio}}"></p>
            </div>
            <div class="d-flex" style="justify-content:space-between">
                <p class="ml-5"><label>image</label></p>
                <p class="mr-5"><input type="file" name="image"></p>
            </div>
            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="更新">
            </div>
            {{csrf_field()}}
            </form>
        </div>
        </div>
    </div>
</div>
@endsection