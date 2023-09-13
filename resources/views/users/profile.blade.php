@extends('layouts.login')

@section('content')

@if ($errors->any())
<div>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<!-- ifログインユーザーと一致するときのみフォーム表示　else他ユーザーのときは自己紹介文と投稿一覧foreachの表示 -->

<!-- authユーザーから値取得しての代入とルーティング整理！ -->
<div class="profile-edit">
{!! Form::open(['route'=>'profile.update', 'files'=>true]) !!}

{{ Form::hidden('id',$user->id) }}
<!-- アイコン -->

<div class="edit-content">
  <img class="profile-icon" src="{{ Storage::url($user->images) }}" alt="アイコン">
{{ Form::label('username','user name',['class'=>'profile-lb']) }}
{{ Form::text('upName',$user->username,['class'=>'profile-form']) }}
</div>
<div class="edit-content">
{{ Form::label('mail','mail adress',['class'=>'profile-lb']) }}
{{ Form::text('mail',$user->mail,['class'=>'profile-form']) }}
</div>
<div class="edit-content">
{{ Form::label('password','password',['class'=>'profile-lb']) }}
{{ Form::password('password',null,['class'=>'profile-form']) }}
</div>
<div class="edit-content">
{{ Form::label('password_confirm','password confirm',['class'=>'profile-lb']) }}
{{ Form::password('password_confirmation',null,['class'=>'profile-form']) }}
</div>
<div class="edit-content">
{{ Form::label('bio','bio',['class'=>'profile-lb']) }}
{{ Form::text('upBio',null,['class'=>'profile-form']) }}
</div>
<div class="edit-content">
{{ Form::label('images','icon image',['class'=>'profile-lb']) }}
{{ Form::file('upImg',null,['class'=>'profile-form']) }}
</div>

 <button type="submit" class="btn btn-success pull-right">更新</button>

{!! Form::close() !!}
</div>

@endsection
