@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
<div class="form-container">
{!! Form::open(['url' => '/login']) !!}
<p class="welcome-title">AtlasSNSへようこそ</p>

<div class="form-area">
<label>mail adress</label>
{{ Form::text('mail',null,['class' => 'input']) }}
</div>

<div class="form-area">
<label>password</label>
{{ Form::password('password',['class' => 'input']) }}
</div>
<div class="red-button">
{{ Form::submit('   LOGIN   ',['class'=>'btn btn-danger'])}}
</div>
<a href="/register"><p class="register-link">新規ユーザーの方はこちら</p></a>
{!! Form::close() !!}</div>

@endsection
