@extends('layouts.login')

@section('content')


<!-- 投稿フォーム作成 -->
<div class="post-create">
  <img class="profile-icon" src="/storage/profiles/{{ Auth::user()->images }}" alt="アイコン"> <!-- 未 ログインユーザー画像取得　表示-->


 <div class="form-group">
 {!! Form::open(['route' => 'post.create']) !!}
         {{ Form::textarea('newPost',null,['class'=>'post_content','placeholder' => '投稿内容を入力してください']) }}
         <button type="submit" class="post-btn"><img src="images/post.png" alt="投稿" class="post_button"></button>

 {!! Form::close() !!}
     </div>


</div>


<!--投稿内容表示 -->
<!-- リレーションでつないだpostテーブルを表示、ユーザー画像、ユーザー名、投稿内容、時間をforeachで繰り返し処理 （AuthuserとFollowing）-->
<!-- if条件ーログインユーザー（Auth）の投稿のみ編集・削除機能実装 -->

<div class="post-table">

  @foreach($posts as $post)
  <!-- Authユーザーがフォローしている人　と　Authユーザーの投稿を表示 -->

<ul class ="post-list">
  <li><img class="profile-icon" src="/storage/profiles/{{ $post->user->images }}" alt="アイコン"></li><!-- ユーザー画像 -->
  <div class="name-post">
  <li style="font-weight:bold;">{{ $post->user->username }}</li> <!-- 投稿したユーザー名（リレーションUser経由） -->
  <li>{{ $post->post }}</li><!-- 投稿内容 -->
  </div>
<div class="date-button">
  <li>{{ $post->created_at }}</li><!-- 投稿日時 -->


  <!-- 編集ボタン(jsでモーダル機能実装) -->
@if($post->user->id == Auth::user()->id)
<div class="auth-button">
  <li><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png" alt="編集" class="edit_button"></a></li>


  <!-- 削除ボタン（jsもしくはonclickでモーダル機能実装） -->

  <li>
    <a href="{{ route('post.delete',[ $post->id ]) }}" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
    <div class="del-button">
    <img src="images/trash-h.png"  alt="削除ボタン" class="delete_button" >
    <img src="images/trash.png" alt="削除ボタン２" class="delete_button" style="padding:5px;">
    </div>
  </a>
</li>
</div>
@endif
</div>
  <!-- モーダル機能onclick="clickDisplayAlert()" 使うかも？？-->
</ul>

@endforeach
</div>

<!-- モーダルの中身 -->
<div class="modal js-modal">
  <div class="modal_bg js-modal-close"></div>
  <div class="modal_content">
     <form action="{{route('post.update')}}" method="post">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <p><input type="image" src="images/edit.png" value="更新" class="edit_button"></p>
                {{ csrf_field() }}
      </form>

  </div>
</div>

@endsection
