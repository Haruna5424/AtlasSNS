@extends('layouts.logout')

@section('content')

<div class="clear">
  <div class="register-inner">
    <p>{{$username}}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
    <div class="text">
      <a>ユーザー登録が完了しました。</a>
      <br>早速ログインをしてみましょう。</br>
    </div>
    <p class="return-btn">
      <a href="/login">ログイン画面へ</a>
    </p>
  </div>
</div>

@endsection