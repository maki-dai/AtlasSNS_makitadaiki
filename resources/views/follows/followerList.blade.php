@extends('layouts.login')

@section('content')




<!-- フォロワーユーザーのアイコン一覧　プロフィールへのURLリンク
-->
<div class ="list-header">
<h1 class ="list-name">Follower list</h1>
<div class ="icon-list">
@foreach($lists as $list)
<!-- ※ユーザーのプロフィールリンク -->
<a href="/userprofile/{{ $list->id }}">
  <img class="profile-icon" src="/storage/profiles/{{ $list->images }}" alt="アイコン"></a>
@endforeach
</div>
</div>
<!-- フォロワーの投稿一覧 日時新しいもの順（上から） -->

  @foreach($posts as $post)
  <div class="post-table">
<ul class="post-list">
  <li><a href="/userprofile/{{ $post->user->id }}"><img class="profile-icon" src="/storage/profiles/{{ $post->user->images }}" alt="アイコン"></a></li><!-- ユーザー画像 -->
  <div class="name-post">
  <li style="font-weight:bold;">{{ $post->user->username }}</li> <!-- 投稿したユーザー名（リレーションUser経由） -->
  <li>{{ $post->post }}</li><!-- 投稿内容 -->
</div>
  <li class="post-date">{{ $post->created_at->format('Y-m-d-h-m') }}</li><!-- 投稿日時 -->

</ul>
</div>
@endforeach



@endsection
