@extends('layouts.login')

@section('content')

<div class="">
    <form action="{{ url('/posts') }}" method="POST" class="">
    <div class="form-content">
        <div class="form-icon">
            <img src="{{asset('storage/'.Auth::user()->images)}}" class="" width="50" height="50">
        </div>
        <div class="form-text">
            <textarea class="form-control @error('text') is-invalid @enderror" name="post" placeholder="投稿内容を入力してください。" required autocomplete="text" rows="4"></textarea>

        </div>
        <div class="form-btn">
            <button type="submit">
                <img src="{{ asset('images/post.png') }}">
        </button>
        </div>
        {{ csrf_field()}}
    </div>
    </form>
</div>
<div class="post-content">
@foreach($posts as $post)
@if(Auth::user()->isFollowing($post->user->id) || Auth::id()==$post->user_id)
<div class="post-area">
    <div class="post-inner">
            <div>
               <img src="{{asset('storage/'.$post->user->images)}}" class="rounded-circle" width="50" height="50">
            </div>
            <div class="post-left">
               <p>{{ $post->user->username }}</p>
               <p>{{ $post->post}}</p>
            </div>
            <div class="post-right">
                <p>{{ $post->created_at}}</p>
                @if( Auth::id() == ($post->user_id))
                <a class="js-modal-open" href="/top/{{$post->id}}/edit" data-toggle="{{$post->id}}" data-target="#edit-modal">
                <img src="{{ asset('images/edit.png') }}" width="40" height="40">
                </a>
                <a class="" href="/top/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
                <img src="{{ asset('images/trash-h.png') }}" width="40" height="40">
                </a>
                @endif
            </div>
    </div>
</div>
@endif
@endforeach
</div>

<div class="content">
    </div>
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <form action="/post/edit" method="post">
            <div class="text-box">
                <textarea name="text"></textarea>
            </div>
                <input type="hidden" class="edit-btn" name="id">
                <div class="text-btn text-center">
                <input type="submit" class="btn btn-primary" value="更新">
                </div>
                {{csrf_field()}}
            </form>
        </div><!--modal__inner-->
    </div><!--modal-->


@endsection
