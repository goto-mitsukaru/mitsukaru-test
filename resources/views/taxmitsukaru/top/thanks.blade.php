<!doctype html>
<html lang="ja">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5RGFV3CH');</script>
    <!-- End Google Tag Manager -->

    <!-- 過去Google tag (gtag.js) -->
{{--    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NF4J3ZKTLS"></script>--}}
{{--    <script>--}}
{{--        window.dataLayer = window.dataLayer || [];--}}
{{--        function gtag(){dataLayer.push(arguments);}--}}
{{--        gtag('js', new Date());--}}

{{--        gtag('config', 'G-NF4J3ZKTLS');--}}
{{--    </script>--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>お問い合わせが完了しました</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- favicon -->
    <link rel="shortcut icon" href="/images/favicon.ico">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">

    <link href="/css/mitsukaru/default.css" rel="stylesheet" type="text/css">
    <link href="/css/mitsukaru/validationEngine.jquery.css" rel="stylesheet" type="text/css">
    <link href="/css/mitsukaru/datepicker.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="/css/mitsukaru/toastr.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.6.2/animate.min.css"/>
    <link href="/css/mitsukaru/style.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet" type="text/css">
    <link href="/css/mitsukaru/media.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet" type="text/css">
    <link href="/css/mitsukaru/thanks.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <script defer src="/js/mitsukaru/jquery.validationEngine.js"></script>
    <script defer src="/js/mitsukaru/jquery.validationEngine-ja.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script defer src="/js/mitsukaru/datepicker-ja.js"></script>
    <script defer src="/js/mitsukaru/jquery.ui.monthpicker.js"></script>
    <script defer src="/js/mitsukaru/toastr.min.js"></script>
    <script defer type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="/js/mitsukaru/common.js"></script>
    <script src="/js/mitsukaru/ajax.js"></script>

    <script>
        (function (d) {
            var config = {
                    kitId: 'vwf2fha',
                    scriptTimeout: 3000,
                    async: true
                },
                h = d.documentElement, t = setTimeout(function () {
                    h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
                }, config.scriptTimeout), tk = d.createElement("script"), f = false,
                s = d.getElementsByTagName("script")[0], a;
            h.className += " wf-loading";
            tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
            tk.async = true;
            tk.onload = tk.onreadystatechange = function () {
                a = this.readyState;
                if (f || a && a != "complete" && a != "loaded") return;
                f = true;
                clearTimeout(t);
                try {
                    Typekit.load(config)
                } catch (e) {
                }
            };
            s.parentNode.insertBefore(tk, s)
        })(document);
    </script>

    {{-- tag --}}
    <script type="text/javascript">
        window.lag=window.lag||function(){(lag.q=lag.q||[]).push(arguments)};lag.l=+new Date;
        lag(
            {
                'acd':'e359be0048b29e8e',
                'cs': '829b44b0',
                'ucd': ''
            }
        );
    </script>

    <script src="https://link-ag.net/dist/p/c/index.js"></script>
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5RGFV3CH"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header>
    <div class="header_orange_wrap">
        <div class="header_top">
            <a href="/" rel="noopener"><img
                    src="/images/lp/logo_top.png" alt="MITSUKARU"></a>
            <div class="logo_text">税理士のための転職情報サイト</div>
        </div>
    </div>
    <img src="/images/lp/LOGINBACK.jpg" class="sp_img">
</header>
<div class="main_content">
    <img src="/images/lp/thank_you.png" alt="ThankYou" class="thank_you">
    <p class="navy_text thanks_text">ミツカルへの申込み<br class="sp">ありがとうございます！</p>
    <div class="gray_wrap">
        <p class="please orange_text">お願い</p>
        <p class="top_text navy_text">あなたのより良い転職を実現するために<br><span class="marker_yellow">30秒だけ</span>お時間ください！</p>
        <div class="speech_bubble">
            <p>事前の準備は不要です！</p>
        </div>
        <p class="number_title navy_text">①お電話にてヒアリングさせて下さい。</p>
        <p>面談時に詳細な情報をお伝えするために、お電話にて、あなたの状況をヒアリングさせてください。<br><span class="orange_text">1時間以内</span>に下記の電話番号からお電話いたします。
        </p>
        <p class="tel_wrap">担当電話番号 090-8506-6780 or 080-4449-0163</p>
        <p class="number_title navy_text">②zoom面談の日程を調整して下さい。</p>
        <p>面談にて、あなたの希望の事務所をお伝えいたします。<br>希望の事務所と履歴書・職務経歴書不要でカジュアルに面談する機会を提供いたします。<br>地域専門のキャリアコンシェルジュが対応いたします。
        </p>
        <div class="link_btn_wrap">
            <a class="east" target="_blank" rel="noopener" href="https://nitte.app/LdDNwczz5La5U9G7oIcIx1KrhZv2/0e87294b">東日本在住の方<br>面談日程を調整する</a>
            <a class="west" target="_blank" rel="noopener" href="https://nitte.app/yZwMF3XqloRzQO2AqMv67ZgJBZo2/f8174d79">西日本在住の方<br>面談日程を調整する</a>
        </div>
        <p class="small_text">東日本:北海道・東北・関東・中部・東海・北陸<br>西日本:関西・中国・四国・九州・沖縄</p>
    </div>
    <div class="step_wrap">
        <p class="top_title navy_text">お電話後の流れ</p>
        <ul class="step_ul">
            <li>
                <div class="step_square">
                    <p class="text">STEP</p>
                    <p class="num">01</p>
                </div>
                <div class="text_wrap">
                    <p class="step_title navy_text">ヒアリング</p>
                    <p class="step_text">お電話にて、エリア・担当案件の詳細・資格などについてヒアリングさせてください。</p>
                </div>
            </li>
            <li>
                <div class="step_square">
                    <p class="text">STEP</p>
                    <p class="num">02</p>
                </div>
                <div class="text_wrap">
                    <p class="step_title navy_text">キャリアコンシェルジュとの面談</p>
                    <p class="step_text">面談にて、あなたの希望の事務所をお伝えします。<br>すぐに転職したい方も、そうでない方も、その方の状況に合わせてアドバイスを差し上げます。
                    </p>
                </div>
            </li>
            <li>
                <div class="step_square">
                    <p class="text">STEP</p>
                    <p class="num">03</p>
                </div>
                <div class="text_wrap">
                    <p class="step_title navy_text">事務所面談</p>
                    <p class="step_text">お話したい事務所がありましたら、事務所の代表の方とカジュアルzoom面談を<br>設定させていただきます。<br>事務所に興味がありましたら、入社に向けた選考に参加することも可能です。
                    </p>
                </div>
            </li>
        </ul>
    </div>
    <p class="bottom_text01 navy_text">お話できる機会を<br class="sp">心よりお待ちしております。</p>
    <p class="bottom_text02 navy_text">〜すべての人に働き方と人生に選択する自由を提供する〜</p>
    {{--        <a class="top_btn" href="/">TOPに戻る</a>--}}
    <div class="img_wrap">
        <img src="/images/lp/thanks_icon.png" class="img_right">
        <div class="text_wrap">
            <p class="point_text">「中小企業からニッポンを元気にプロジェクト」<br>公式アンバサダー　郷ひろみ</p>
        </div>
    </div>
    <a href="/" class="bottom_logo">
        <img src="/images/lp/logo_top.png" alt="MITSUKARU">
    </a>
</div>
<footer>
    <div class="footer_flex">
        <div class="company_profile">
            <ul>
                <li>
                    <p class="title">会社名</p>
                    <p class="text">株式会社ミツカル</p>
                </li>
                <li>
                    <p class="title">運営内容</p>
                    <p class="text">国家資格(税理士・医師・看護師)に特化した転職マッチングプラットフォームを運営。</p>
                </li>
                <li>
                    <p class="title">所在地</p>
                    <p class="text">〒150-0022<br>東京都渋谷区恵比寿南三丁目1-1<br>
                    いちご恵比寿グリーングラス6階<br>
                    <spna class="c-mini-text">※本社移転しました（移転日2024/3/27）</spna></p>
                </li>
                <li>
                    <p class="title">サイト</p>
                    <p class="text"><a href="https://mitsukaru.cc/"
                                       target="_blank">https://mitsukaru.cc/</a></p>
                </li>
            </ul>
        </div>
        <div class="copyright">COPYRIGHT 2022. MITSUKARU ALL RIGHT RESERVED.</div>
    </div>
</footer>

<script>
    @if (session('flash_message'))
    $(window).on('load', function () {
        $(function () {
            toastr.success('{{session('flash_message')}}', '', {
                positionClass: 'toast-bottom-left'
            });
        });
    });
    @endif
</script>

{{--サンクスページ用タグ--}}
<script>
    !function(a,f,e,v,n,t,s) {
        if (a.taf) {if (a.taf.loaded)return;
        }else{n=a.taf=function() {};
            n.sales=function(a) {n.queue.push(a)};
            n.loaded=0;n.queue=[];t=f.createElement(e);t.async=!0;
            t.src=v;s=f.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}}(window,document,'script','https://af.tosho-trading.co.jp/tafsales4.js');
    taf.sales({
        "pid":"tp202244501daba0ac23ba",
        "cid":"ODk5",
        "order_number":"申込番号"
    });
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-194256367-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-167880892-1');
</script>
</body>
</html>
