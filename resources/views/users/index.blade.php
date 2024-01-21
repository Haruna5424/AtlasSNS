@extends('layouts.login')

@section('content')

<form action="/search" method="post">
  <input type="search" name="search" placeholder="ユーザー名">
  <input type="submit" src="" width="30" height="30" alt="検索" value="検索">
  {{csrf_field()}}
</form>
<p>
    @if(!empty($search))
    <span>検索ワード:{{$search}}</span>
    @endif
</p>
<div>
  <table class="">
    @foreach($users as $user)
    @if(Auth::id() != $user->id)
    <div class="user-area">
      <div class="user-inner">
        <img src="{{asset('storage/'.$user->images)}}" class="rounded-circle" width="50" height="50">
        <div class="user-left">
          <p>{{$user->username}}</p>
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
    @endif
    @endforeach
  </table>


</div>
@endsection