<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MFKZV83');</script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MITSUKARU転職診断</title>
    <link href="/css/default.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    <link href="/css/style.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    <link href="/css/form.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    <link href="/css/sp_form.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    @if($isMobile)
        <link href="/css/sp_style.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    @endif
    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

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
    <script>
        //.g-recaptcha タグの data-callback 属性で指定したコールバック関数の定義
        var myAlert = function(response) {
            alert("チェックボックスがチェックされました！");
        };
    </script>
    <script>
        //onload callback function（ページをロードした際に実行される関数）
        var onloadCallback = function() {
            //ウィジェットを表示するメソッド
            grecaptcha.render('recaptcha', {
                'sitekey' : "6LcbV10jAAAAABmKN4rOdxApj1sIYgA-jYnpXq54",
                'callback' : myAlert //コールバック関数名
            });
        };
        //上記 'callback' で指定したコールバック関数の定義
        var myAlert = function(response) {
            alert("チェックボックスがチェックされました！");
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/js/index.js"></script>
    @if($isMobile)
        <script src="/js/sp_index.js"></script>
    @endif
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MFKZV83"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
@yield('header')
@yield('content')
</body>
</html>
