@extends('layouts.login')

@section('content')




<!-- フォロワーユーザーのアイコン一覧　プロフィールへのURLリンク
-->
<div class ="icon-list">
<h1 class ="list-name">Follower list</h1>
@foreach($lists as $list)
<!-- ※ユーザーのプロフィールリンク -->
<a href="/userprofile/{{ $list->id }}">
  <img class="profile-icon" src="/storage/profiles/{{ $list->images }}" alt="アイコン"></a>
@endforeach
</div>

<!-- フォロワーの投稿一覧 日時新しいもの順（上から） -->

  @foreach($posts as $post)
  <div class="post-table">
<ul class="post-list">
  <li><a href="/userprofile/{{ $list->id }}"><img class="profile-icon" src="/storage/profiles/{{ $post->user->images }}" alt="アイコン"></a></li><!-- ユーザー画像 -->
  <div class="name-post">
  <li style="font-weight:bold;">{{ $post->user->username }}</li> <!-- 投稿したユーザー名（リレーションUser経由） -->
  <li>{{ $post->post }}</li><!-- 投稿内容 -->
</div>
  <li class="post-date">{{ $post->created_at }}</li><!-- 投稿日時 -->

</ul>
</div>
@endforeach



@endsection
