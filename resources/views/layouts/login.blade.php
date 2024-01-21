<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title>AtlasSNS</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('js/script.js') }} ">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        <div class="menu">
            <div class="logo">
                <a href="/top"><img src="images/atlas.png"></a>
            </div>
            <div class="header-right">
                <div id="accordion" class="accordion-container">
                    <p class="accordion-title js-accordion-title">{{Auth::user()->username}}さん</p>
                    <div class="accordion-content">
                        <ul class="inner">
                            <li><a href="/top">ホーム</a></li>
                            <li><a href="/profile">プロフィール</a></li>
                            <li><a href="/logout">ログアウト</a></li>
                        </ul>
                    </div><!--/.accordion-content-->
                </div>
                <div class="user-icon">
                    <img src="{{asset('storage/'.Auth::user()->images)}}">
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{Auth::user()->username}}さんの</p>
                <div>
                    <p>フォロー数</p>
                    <p>{{Auth::user()->follows()->get()->count()}}名</p>
                </div>
                <div class="follow-btn">
                    <p type="submit" class="btn"><a href="/follow-list">フォローリスト</a></p>
                </div>
                <div>
                    <p>フォロワー数</p>
                    <p>{{Auth::user()->followers()->get()->count()}}名</p>
                </div>
                <div class="follow-btn">
                    <p type="submit" class="btn"><a href="/follower-list">フォロワーリスト</a></p>
                </div>
            </div>
            <div class="search-btn">
                <p class="btn"><a href="/search">ユーザー検索</a></p>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('js/script.js')}}"></script>

</body>
</html>
