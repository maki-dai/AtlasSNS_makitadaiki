@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
<div class="form-container-reg">
{!! Form::open(['url' => '/register']) !!}

<p class="register-title">新規ユーザー登録</p>
<div class="form-area">
<label>username</label>
{{ Form::text('username',null,['class' => 'input']) }}
</div>
<div class="form-area">
<label>mail adress</label>
{{ Form::text('mail',null,['class' => 'input']) }}
</div>

<div class="form-area">
<label>password</label>
{{ Form::password('password',null,['class' => 'input-pass']) }}
</div>

<div class="form-area">
<label>password_confirm</label>
{{ Form::password('password_confirmation',null,['class' => 'input-pass']) }}
</div>

<div class="red-button">
 <button type="submit" class="btn btn-danger">REGISTER</button>
</div>

<a href="/login"><p class="login-link">ログイン画面へ戻る</p></a>

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
