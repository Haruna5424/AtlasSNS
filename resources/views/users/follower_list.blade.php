@extends('layouts.login')

@section('content')
<div class="followlist-content">
    <div class="icon-area">
        <div class="d-flex followlist">
            <p>FollowList</p>
            @foreach($users as $user)
            <a href="{{route('userProfile',['id'=>$user->id])}}">
                <img src="{{ asset('storage/'.$user->images) }}" class="rounded-circle" width="50" height="50">
            </a>
            @endforeach
        </div>
    </div>
</div>
<div class="post-content">
    @foreach($posts as $post)
    <div class="post-area">
        <div class="post-inner">
            @if(Auth::user()->isFollowed($post->user->id))
            <div>
                <img src="{{ asset('storage/'.$post->user->images) }}" class="rounded-circle" width="50" height="50">
            </div>
            <div class="post-left">
               <p>{{ $post->user->username }}</p>
               <p>{{ $post->post}}</p>
            </div>
            <div class="post-right">
                <p>{{ $post->created_at}}</p>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endsection