@extends('layouts.login')

@section('content')




<!-- フォロワーユーザーのアイコン一覧　プロフィールへのURLリンク
-->
<div class ="icon-list">
<h1 class ="list-name">Follower list</h1>
@foreach($lists as $list)
<!-- ※ユーザーのプロフィールリンク -->
<a href="/userprofile/{{ $list->id }}">
  <img class="profile-icon" src="{{ Storage::url($list->images) }}" alt="アイコン"></a>
@endforeach
</div>

<!-- フォロワーの投稿一覧 日時新しいもの順（上から） -->
<table>
  @foreach($posts as $post)
<tr>
  <td><a href="/userprofile/{{ $list->id }}"><img class="profile-icon" src="{{ Storage::url($post->user->images) }}" alt="アイコン"></a></td><!-- ユーザー画像 -->
  <td>{{ $post->user->username }}</td> <!-- 投稿したユーザー名（リレーションUser経由） -->
  <td>{{ $post->post }}</td><!-- 投稿内容 -->
  <td>{{ $post->created_at }}</td><!-- 投稿日時 -->

</tr>
@endforeach
</table>


@endsection
