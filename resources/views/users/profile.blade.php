@extends('layouts.login')

@section('content')

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

<!-- ifログインユーザーと一致するときのみフォーム表示　else他ユーザーのときは自己紹介文と投稿一覧foreachの表示 -->

<!-- authユーザーから値取得しての代入とルーティング整理！ -->
<div class="profile-container">
<img class="profile-icon" src="/storage/profiles/{{ $user->images }}" alt="アイコン" style="margin-top:30px;">
<div class="profile-edit">
{!! Form::open(['route'=>'profile.update', 'files'=>true]) !!}

{{ Form::hidden('id',$user->id) }}
<!-- アイコン -->
<!-- <div class="profile-edit_1"> -->

<div class="edit-content">

{{ Form::label('username','user name',['class'=>'profile-lb']) }}
{{ Form::text('upName',$user->username,['class'=>'profile-form']) }}
</div>
<!-- </div> -->
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
{{ Form::text('upBio',$user->bio,['class'=>'profile-form']) }}
</div>
<div class="edit-content">
{{ Form::label('images','icon image',['class'=>'profile-lb']) }}
<label class="file_upload">
  <p class="file-name">ファイルを選択</p>
{{ Form::file('images',['class'=>'profile-upfile']) }}</label>

</div>

 <button type="submit" class="btn btn-danger">更新</button>

{!! Form::close() !!}
</div>
</div>
@endsection
