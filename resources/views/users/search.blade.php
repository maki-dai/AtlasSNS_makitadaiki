@extends('layouts.login')

@section('content')

<div class="search_zone">
{!! Form::open (['route' => 'user.search'])!!}
{{ Form::text('searchUser',null,['placeholder' => 'ユーザー名']) }}
 <button type="submit" class="btn btn-success pull-right"><img src="images/search.png" alt="検索" class="search_button"></button>
{!! Form::close() !!}

@if(!empty( $_POST["searchUser"] ))
<p class="search_word">検索ワード：{{ $_POST["searchUser"] }}</p>
@endif
</div>

<!-- Authユーザー以外の登録ユーザー全表示 -->
<div class="User_list">
<!-- ※foreachで繰り返し処理でユーザー表示 -->
@foreach($users as $user)
<ul>
<li class="user_icon">{{ $user->images }}</li>
<li class="username">{{ $user->username }}</li>

<!-- ※Authユーザーがフォローしてるかしてないでフォローボタンの条件分岐if -->
   {{ Form::open(['route' => 'follow']) }}
<li class="follow_btn">
   {{ Form::submit('フォローする',['class' => 'btn btn-primary']) }}
  </li>
  {{Form::close() }}
  <!-- ※else -->
  {{ Form::open(['route' => 'unfollow']) }}
  <li class="unfollow_btn">
 {{ Form::submit('フォロー解除',['class' => 'btn btn-primary']) }}
  </li>
  {{Form::close() }}
</ul>
@endforeach
<!-- ※endif -->
</div>
@endsection
