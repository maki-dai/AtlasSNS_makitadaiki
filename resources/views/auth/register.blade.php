@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
<div class="form-container">
{!! Form::open(['url' => '/register']) !!}

<p>新規ユーザー登録</p>

<p>{{ Form::label('ユーザー名') }}</p>
{{ Form::text('username',null,['class' => 'input']) }}

<p>{{ Form::label('メールアドレス') }}</p>
{{ Form::text('mail',null,['class' => 'input']) }}

<p>{{ Form::label('パスワード') }}</p>
{{ Form::password('password',null,['class' => 'input']) }}

<p>{{ Form::label('パスワード確認') }}</p>
{{ Form::password('password_confirmation',null,['class' => 'input']) }}

 <button type="submit" class="btn btn-success pull-right">REGISTER</button>

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}
</div>
<!-- バリデーションエラー用 -->
@if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
@endif

@endsection
