@extends('layouts.login')

@section('content')


<!-- ifログインユーザーと一致するときのみフォーム表示　else他ユーザーのときは自己紹介文と投稿一覧foreachの表示 -->

<!-- authユーザーから値取得しての代入とルーティング整理！ -->
<div>
{!! Form::open(['route'=>'profile.update']) !!}

{{ Form::hidden('id',Auth::user()->id) }}
{{ Form::label('username','user name') }}
{{ Form::text('upName',Auth::user()->username) }}

{{ Form::label('mail','mail adress') }}
{{ Form::text('upMail',Auth::user()->mail) }}

{{ Form::label('password','password') }}
{{ Form::password('upPass',null) }}

{{ Form::label('password_confirm','password confirm') }}
{{ Form::password('password_confirmation',null) }}

{{ Form::label('bio','bio') }}
{{ Form::text('upBio') }}

{{ Form::label('images','icon image') }}
{{ Form::image('upImg') }}
 <button type="submit" class="btn btn-success pull-right">更新</button>

{!! Form::close() !!}
</div>

@endsection
