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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "logo">
            <h1><a href="/top"><img src="images/atlas.png" /></a></h1>
        </div>
        <div id="head">
            <p class="username">{{ Auth::user()->username }}　さん　<img src="{{ asset('images/' . Auth::user()->images ) }}" /></p>
            <!--アコーディオンメニュー-->
            <div id="accordion">
                <p class="nav-btn"></p>
                <ul class="nav-menu">
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/profile">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>{{ \App\Post::get()->count() }}名</p>
                </div>

                <p class="btn btn-primary"><a href="/follow-list" type="button">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn btn-primary"><a href="/follower-list" type="button">フォロワーリスト</a></p>
            </div>
            <p class="btn btn-primary"><a href="/search" type="button">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
