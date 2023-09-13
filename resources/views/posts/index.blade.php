@extends('layouts.login')

@section('content')


<!-- 投稿フォーム作成 -->
<div class="post-create">
  <img class="profile-icon" src="{{ Storage::url(Auth::user()->images) }}" alt="アイコン"> <!-- 未 ログインユーザー画像取得　表示-->

 {!! Form::open(['route' => 'post.create']) !!}
     <div class="form-group">
         {{ Form::textarea('newPost',null,['class'=>'post_content','placeholder' => '投稿内容を入力してください']) }}
     </div>

     <button type="submit" class="btn btn-success pull-right"><img src="images/post.png" alt="投稿" class="post_button"></button>

 {!! Form::close() !!}
</div>


<!--投稿内容表示 -->
<!-- リレーションでつないだpostテーブルを表示、ユーザー画像、ユーザー名、投稿内容、時間をforeachで繰り返し処理 （AuthuserとFollowing）-->
<!-- if条件ーログインユーザー（Auth）の投稿のみ編集・削除機能実装 -->

<table class="post-table">

  @foreach($posts as $post)
  <!-- Authユーザーがフォローしている人　と　Authユーザーの投稿を表示 -->

<tr class ="user-post">
  <td><img class="profile-icon" src="{{ Storage::url($post->user->images) }}" alt="アイコン"></td><!-- ユーザー画像 -->
  <td>{{ $post->user->username }}</td> <!-- 投稿したユーザー名（リレーションUser経由） -->
  <td>{{ $post->post }}</td><!-- 投稿内容 -->
  <td>{{ $post->created_at }}</td><!-- 投稿日時 -->


  <!-- 編集ボタン(jsでモーダル機能実装) -->
@if($post->user->id == Auth::user()->id)
  <td><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png" alt="編集" class="edit_button"></a></td>


  <!-- 削除ボタン（jsもしくはonclickでモーダル機能実装） -->
  <td>
    <a href="{{ route('post.delete',[ $post->id ]) }}" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
    <img src="images/trash-h.png" alt="削除ボタン" class="delete_button">
    <!-- <img src="images/trash.png" alt="削除ボタン２" class="delete_button"> -->
  </a>
</td>
@endif
  <!-- モーダル機能onclick="clickDisplayAlert()" 使うかも？？-->
</tr>

@endforeach
</table>

<!-- モーダルの中身 -->
<div class="modal js-modal">
  <div class="modal_bg js-modal-close"></div>
  <div class="modal_content">
     <form action="{{route('post.update')}}" method="post">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="image" src="images/edit.png" value="更新" class="edit_button">
                {{ csrf_field() }}
      </form>
      <a class="js-modal-close" href="">閉じる</a>
  </div>
</div>

@endsection
