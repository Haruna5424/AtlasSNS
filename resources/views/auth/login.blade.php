@extends('layouts.logout')

@section('content')
<div class="login-content">
    {!! Form::open() !!}
    <div class="login-inner">
        <p>AtlasSNSへようこそ</p>
        <div class="login-mail">
            {{ Form::label('mail address') }}
            {{ Form::text('mail',null,['class' => 'input']) }}
        </div>
        <div class="login-pass">
            {{ Form::label('password') }}
            {{ Form::password('password',['class' => 'input']) }}
        </div>
        <div class="login-btn">
            {{ Form::submit('LOGIN',['class'=>'btn']) }}
        </div>
        <div class="register">
            <p><a href="/register">新規ユーザーの方はこちら</a></p>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection