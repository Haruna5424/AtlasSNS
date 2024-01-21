@extends('layouts.login')

@section('content')
<div class="user-area">
      <div class="user-inner">
        <img src="{{ asset('storage/'.$user->images) }}" class="rounded-circle" width="50" height="50">
        <div class="user-left">
          <p>name {{$user->username}}</p>
          <p>bio {{$user->bio}}</p>
        </div>
        <div class="user-right">
            @if (auth()->user()->isFollowing($user->id))
            <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">フォロー解除</button>
            </form>
            @else
            <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">フォローする</button>
            </form>
            @endif
        </div>
    </div>
</div>
<div class="post-area">
    @foreach($posts as $post)
    <div class="post-inner">
        <img src="{{ asset('storage/'.$user->images) }}" class="rounded-circle" width="50" height="50">
        <div class="post-left">
            <p>{{ $post->user->username }}</p>
            <p>{{ $post->post}}</p>
        </div>
        <div class="post-right">
            <p>{{ $post->created_at}}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection