<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <script src="script.js"></script>
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />

    <!--OGPタグ/twitterカード-->

</head>
<body>
    <header>
        <div id = "head">
        <h1><a href="/top"><img class="home_button" src="images/atlas.png"></a></h1>
            <div id="head-menu">
                <div id="Auth-user">
                    <p>{{ Auth::user()->username}}さん</p>
                    <!-- プロフィール画像　シンボリックリンク表示 -->
  <img class="profile-icon" src="{{ Storage::url(Auth::user()->images) }}">
                <div>
                <details class="accordion-001">
                <summary>V</summary>
                <ul class="summary_inner">
                    <li><a href="/top">HOME</a></li>
                    <!-- ↑各ページ毎で反映はチェック　要修正 -->
                    <li><a href="/profile">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
                </details>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username}}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>{{ Auth::user()->following()->count()}}名</p>
                </div>
                <!-- 押したらフォローリスト表示画面へ推移 -->
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>{{ Auth::user()->followed()->count()}}名</p>
                </div>
                <!-- 押したらフォローリスト表示画面へ推移 -->
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <!-- 押したら検索画面へ推移 -->
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <!-- javascript・jQueryとのリンク設定 -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
