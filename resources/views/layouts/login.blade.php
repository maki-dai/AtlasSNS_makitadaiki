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
    <!-- bootstrap リンク -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
        <h1><a href="/top"><img class="home_button" src="{{ asset('/images/atlas.png') }}"></a></h1>
            <div id="head-menu">
                    <p class="head-user">{{ Auth::user()->username}}さん</p>
                    <!-- アコーディオンメニュー -->
                     <!-- <details class="accordion-001">
                <summary>V</summary> -->
                <div class="menu-trigger">
                    <p>V</p>
                </div>
                <div class="menu-content">
                    <ul>
                    <li><a href="/top"><p class="menu-link">HOME</p></a></li>
                    <li><a href="/profile"><p class="menu-link">プロフィール編集</p></a></li>
                    <li><a href="/logout"><p class="menu-link">ログアウト</p></a></li>
                    </ul>
                </div>

                    <!-- プロフィール画像　シンボリックリンク表示 -->
  <p><img class="profile-icon" src="/storage/profiles/{{ Auth::user()->images }}"></p>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="side-user">{{ Auth::user()->username}}さんの</p>
                <div>
                <p>フォロー数　　{{ Auth::user()->following()->count()}}人</p>
                </div>
                <!-- 押したらフォローリスト表示画面へ推移 -->
                <div class="list-button">
                <p class="btn btn-primary"><a class="list-link" href="/follow-list">フォローリスト</a></p>
                </div>
                <div>
                <p>フォロワー数　　{{ Auth::user()->followed()->count()}}人
                </p>
                </div>
                <!-- 押したらフォローリスト表示画面へ推移 -->
                <div class="list-button">
                <p class="btn btn-primary"><a class="list-link" href="/follower-list">フォロワーリスト</a></p>
                </div>
            </div>
            <!-- 押したら検索画面へ推移 -->
            <div class="search-link">
            <p class="btn btn-primary"><a class="list-link" href="/search">ユーザー検索</a></p>
            </div>
        </div>
    </div>
    <footer>
    </footer>
     <!-- javascript・jQueryとのリンク設定 -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>
