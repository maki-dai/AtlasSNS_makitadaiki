@extends('layouts.logout')

@section('content')

<div id="clear">

    <!-- セッションからUserNameを表示 -->
    <div class="container-add">
  <p class="add-title">{{ session('username') }}さん
    <br>
ようこそ！AtlasSNSへ！</p>
  <p class="add-message">ユーザー登録が完了いたしました。
    <br>
  早速ログインをしてみましょう！</p>


  <p class="btn btn-danger"><a class="back-link" href="/login">ログイン画面へ</a></p>
  </div>

</div>

@endsection
