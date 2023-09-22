@extends('layouts.login')

@section('content')

<!-- 画像　名前　
自己紹介文　
フォローボタンor解除ボタン -->
<div class="user-container">
  <img class="profile-icon" src="/storage/profiles/{{ $user->images }}" alt="アイコン">
  <div class="user-profile">
  <div class="user-content">
  <label>name</label>
  <p style="padding-left: 85px;">{{ $user->username }}</p>
   </div>
  <div class="user-content" ><label>bio</label>
  <p style="padding-left: 100px;">{{ $user->bio }}</p>
  </div>
</div>

 @if(auth()->user()->isFollowing($user->id))
 <!-- フォローボタン -->
 <!-- <div class="follow-button"> -->
  {{ Form::open(['route' => 'unfollow']) }}
  {{ Form::hidden('id',$user->id) }}
  <p class="user-unfollow_btn">
  {{ Form::submit('フォロー解除',['class' => 'btn btn-danger']) }}
  </p>
  {{Form::close() }}
  @else
   {{ Form::open(['route' => 'follow']) }}
   {{ Form::hidden('id',$user->id) }}
  <p class="user-follow_btn">
   {{ Form::submit('フォローする',['class' => 'btn btn-info']) }}
   </p>
  {{Form::close() }}
 <!-- </div> -->
  @endif
</div>
<!-- </div> -->






<!-- 選ばれたユーザーの投稿のみ表示 -->
  @foreach($posts as $post)
<div class="post-table">
  <ul  class="post-list">
  <li><img class="profile-icon" src="/storage/profiles/{{ $post->user->images }}" alt="アイコン"></li><!-- ユーザー画像 -->
 <div class="name-post">
  <li  style="font-weight:bold;">{{ $post->user->username }}</li> <!-- 投稿したユーザー名（リレーションUser経由） -->
  <li>{{ $post->post }}</li><!-- 投稿内容 -->
 </div>
  <li class="post-date">{{ $post->created_at }}</li><!-- 投稿日時 -->

 </ul>
</div>
@endforeach



@endsection
