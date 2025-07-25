<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "logo">
            <h1><a href="/top"><img src="{{ asset('images/' .'atlas.png/')  }}"/></a></h1>
            <!-- assetでどのページに移っても画像が表示される様になる。 -->
        </div>
        <div id="head">
            <p class="username">{{ Auth::user()->username }}　さん　</p>
            <!--アコーディオンメニュー-->
            <div id="accordion">
                <p class="nav-btn"></p>
                <ul class="nav-menu">
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/profile">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
            </div>
            <div class="head-img">
                <!-- アイコン画像エラー防止の条件分岐。説明は、indexブレードの40行目に記載 -->
                @if (!empty(Auth::user()->images) && file_exists(public_path( 'storage/' . Auth::user()->images)))
                    <img src="{{ asset('storage/' . Auth::user()->images ) }}" />
                @elseif (!empty(Auth::user()->images) && file_exists(public_path('images/' . Auth::user()->images)))
                    <img src="{{ asset('images/' . Auth::user()->images ) }}" />
                @endif
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="login-name">{{ Auth::user()->username }}さんの</p>
                <div>
                <p>フォロー数</p>
                <!-- {{ \App\Post::get()->count() }}SNSの例　投稿数を表示する。記述 -->
                  <!-- フォローの人数を表示 -->
                   <!--  Auth::user() →userテーブルからログインしているユーザーの情報を取得する -->
                      <!-- ->follows()->count() →user.phpに記述したリレーションを利用して数を表示させている。37～39行目-->
                <p class="count">{{ Auth::user()->follows()->count() }}名</p>
                </div>

                <p class="btn btn-primary"><a class="btn" href="/follow-list" type="button">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <!-- フォロワーの人数を表示 -->
                 <!-- フォローの表示と同じくuser.phpのリレーションを利用し数を表示44～46行目 -->
                <p class="count2">{{ Auth::user()->followers()->count() }}名</p>
                </div>
                <p class="btn btn-primary"><a class="btn" href="/follower-list" type="button">フォロワーリスト</a></p>
            </div>
            <p class="btn btn-primary btn-search"><a class="btn" href="/search" type="button">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
