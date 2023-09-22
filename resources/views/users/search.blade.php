@extends('layouts.login')

@section('content')

<div class="search_zone">
{!! Form::open (['route' => 'user.search'])!!}
{{ Form::text('searchUser',null,['placeholder' => 'ユーザー名','class'=>'search-space']) }}
 <button type="submit" ><img src="images/search.png" alt="検索" class="search_button"></button>
{!! Form::close() !!}

@if(!empty( $_POST["searchUser"] ))
<p class="search_word">検索ワード：{{ $_POST["searchUser"] }}</p>
@endif
</div>

<div class="users-list">
<!-- Authユーザー以外の登録ユーザー全表示 -->
<!-- ※foreachで繰り返し処理でユーザー表示 -->
@foreach($users as $user)
@if(auth()->user()->isNot($user))

<ul class ="user-list">
<li class="user-icon"><img class="profile-icon" src="/storage/profiles/{{ $user->images }}" alt="アイコン"></li>
<li class="username">{{ $user->username }}</li>

<!-- if Authユーザーがフォローしてなければフォローボタン
フォローしてたらフォロー解除ボタンの条件分岐 -->

 @if(auth()->user()->isFollowing($user->id))
  {{ Form::open(['route' => 'unfollow']) }}
  {{ Form::hidden('id',$user->id) }}
  <li class="unfollow_btn">
 {{ Form::submit('フォロー解除',['class' => 'btn btn-danger']) }}
  </li>
  {{Form::close() }}
 @else
   {{ Form::open(['route' => 'follow']) }}
   {{ Form::hidden('id',$user->id) }}
<li class="follow_btn">
   {{ Form::submit('フォローする',['class' => 'btn btn-info']) }}
  </li>
  {{Form::close() }}
  @endif

</ul>

@endif
@endforeach
</div>

@endsection
