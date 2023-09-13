@extends('layouts.login')

@section('content')

<!-- 画像　名前　
自己紹介文　
フォローボタンor解除ボタン -->
<div class="user-profile">
<img class="profile-icon" src="{{ Storage::url($user->images) }}" alt="アイコン">
<label>name</label>
<p>{{ $user->username }}</p>
<label>bio</label>
<p>{{ $user->bio }}</p>
<!-- フォローボタン -->
<div class="follow-button">
@if(auth()->user()->isFollowing($user->id))
  {{ Form::open(['route' => 'unfollow']) }}
  {{ Form::hidden('id',$user->id) }}
  <p class="unfollow_btn">
 {{ Form::submit('フォロー解除',['class' => 'btn btn-primary']) }}
  </p>
  {{Form::close() }}
 @else
   {{ Form::open(['route' => 'follow']) }}
   {{ Form::hidden('id',$user->id) }}
<p class="follow_btn">
   {{ Form::submit('フォローする',['class' => 'btn btn-primary']) }}
  </p>
  {{Form::close() }}
  @endif
  </div>
</div>



<!-- 選ばれたユーザーの投稿のみ表示 -->
<table>
  @foreach($posts as $post)
<tr>
  <td><img class="profile-icon" src="{{ Storage::url($post->user->images) }}" alt="アイコン"></td><!-- ユーザー画像 -->
  <td>{{ $post->user->username }}</td> <!-- 投稿したユーザー名（リレーションUser経由） -->
  <td>{{ $post->post }}</td><!-- 投稿内容 -->
  <td>{{ $post->created_at }}</td><!-- 投稿日時 -->

</tr>
@endforeach
</table>


@endsection
