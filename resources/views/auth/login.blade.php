@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
<div class="form-container">
{!! Form::open(['url' => '/login']) !!}
<p class="welcome">AtlasSNSへようこそ</p>

<p>{{ Form::label('e-mail') }}</p>
{{ Form::text('mail',null,['class' => 'input']) }}


<p>{{ Form::label('password') }}</p>
{{ Form::password('password',['class' => 'input']) }}

<br>
{{ Form::submit('ログイン') }}
<a href="/register"><p class="register">新規ユーザーの方はこちら</p></a>
{!! Form::close() !!}</div>

@endsection
