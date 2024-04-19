<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-W6BSPDHC');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="税理士事務所に勤務する方へ。あなたの事務所のブラック度が何％なのかがわかる無料診断ツール！残業時間や勤怠管理、有給取得状況、評価制度、福利厚生など情報から分析します！">
    <title>税務担当者のためのブラック事務所診断｜税理士業界の転職ならミツカル</title>
    <!-- ogp -->

    <head prefix="og: http://ogp.me/ns#"></head>
    <meta property="og:title" content="事務所のブラック度がわかる無料診断" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="税理士事務所に勤務する方へ。あなたの事務所のブラック度が何％なのかがわかる無料診断ツール！残業時間や勤怠管理、有給取得状況、評価制度、福利厚生など情報から分析します！" />
    <meta property="og:url" content="https://kaikeizimusyotennsyoku.com/blacksinndann/index.php" />
    <meta property="og:site_name" content="税務担当者のためのブラック事務所診断" />
    <meta property="og:image" content="https://kaikeizimusyotennsyoku.com/store/blackNew/img/OGP_black.jpg" />

    <link rel="icon" href="/store/blackNew/img/favicon.ico">
    <link rel="canonical" href="https://kaikeizimusyotennsyoku.com/blacksinndann/index.php">
    <!-- <link rel="stylesheet" href="/store/blackNew/css/the-new-css-reset.css?<?php echo date('Ymd-Hi'); ?>"> -->
    <!-- <link rel="stylesheet" href="/store/blackNew/css/lib/slick.css?<?php echo date('Ymd-Hi'); ?>">
    <link rel="stylesheet" href="/store/blackNew/store/blackNew/ss/lib/slick-theme.css?<?php echo date('Ymd-Hi'); ?>"> -->
    <link rel="stylesheet" href="/store/blackNew/css/style.css?<?php echo date('Ymd-Hi'); ?>">
    <noscript>
        <link rel="stylesheet" href="/store/blackNew/css/style.css?<?php echo date('Ymd-Hi'); ?>">
    </noscript>
    <script type="text/javascript" src="/store/blackNew/js/lib/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <!-- <meta name="robots" content="noindex"> -->
</head>

<body class="l-body">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W6BSPDHC" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="l-body-inner">
        <header class="l-header">
            <div class="p-header-inner">
                <a href="https://kaikeizimusyotennsyoku.com/" class="p-header-thumb">
                    <img class="p-header-thumb__img" src="/store/blackNew/img/main_logo_pc.webp" alt="メインロゴ">
                </a>
                <p class="p-header-inner__text">税務担当者のためのブラック事務所診断</p>
            </div>
        </header>
        <main class="l-main">
            <div class="p-main-fv">
                <img class="p-main-fv__thumb" src="/store/blackNew/img/black_fv.webp" alt="fv">
            </div>
            <div class="p-main-content">
                <h1 class="c-main-title">＼ こんな方はお試しください！ ／
                </h1>
                <ul class="p-main-list__ul">
                    <li class="p-main-list__li">
                        <p class="p-main-list__text">今働いている事務所に<br>
                            対して疑問がある</p>
                        <img class="p-main-list__img" src="/store/blackNew/img/recommend1.webp" alt="サムネ1">
                    </li>
                    <li class="p-main-list__li">
                        <p class="p-main-list__text">自分の労働環境を<br>
                            改善したい</p>
                        <img class="p-main-list__img" src="/store/blackNew/img/recommend2.webp" alt="サムネ2">
                    </li>
                    <li class="p-main-list__li">
                        <p class="p-main-list__text --adj">今の職場が他と比べて<br>
                            どうなのか知りたい</p>
                        <img class="p-main-list__img" src="/store/blackNew/img/recommend3.webp" alt="サムネ3">
                    </li>
                </ul>
                <p class="c-main-text">自分の職場環境のブラック度が<br>
                    何％なのかわかります！<br>
                    労働時間・残業・給与・ハラスメントなど<br>
                    少しでも時間がある方はお試しください！
                </p>
            </div>
            <div class="p-main-tri">
                <img class="p-main-tri__thumb" src="/store/blackNew/img/black_arrow.webp" alt="診断スタート" width="850" height="288">
            </div>
            <div class="l-main-form">
                <form class="p-main-form" action="/blacksinndann/step.php" method="post">
                    <?php
                    $facebookValue = 0; // デフォルト値を設定
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        $facebookValue = preg_match('/face/', $_SERVER['HTTP_REFERER']) ? 1 : 0;
                    }
                    ?>
                    <input type="hidden" name="facebook" value="<?php echo $facebookValue; ?>">
                    <?php
                    $facebookValue = 0; // デフォルト値を設定
                    if (isset($_SERVER['REQUEST_URI'])) {
                        $uriValue = htmlspecialchars($_SERVER['REQUEST_URI']);;
                    }
                    ?>
                    <input type="hidden" name="src" value="<?php echo $uriValue; ?>">
                    <input type="hidden" name="_token" value="<?php
                                                                $csrf_token = csrf_token();
                                                                echo $csrf_token;
                                                                ?>">
                    <div class="p-main-form__inner --number1">
                        <p class="p-main-form__lead">＼ 診断終了まであと12問 ／</p>
                        <div class="p-progress-container">
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>

                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>

                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                        </div>
                        <p class="c-main-figure">QUESTION 01</p>
                        <p class="p-main-form__question">月間の実残業時間<span class="c-main-mini">（みなしも含む）</span>は<br>どのくらいですか？</p>
                        <div class="p-main-select__wrap js-select-change1">
                            <select class="p-main-select " name="month_overtime[]">
                                <option value="unanswered">未回答</option>
                                <?php
                                $overtimes = array(
                                    "残業なし", "1～10時間未満", "10～20時間未満", "21～30時間未満", "31～40時間未満",
                                    "41～50時間未満", "50時間以上",
                                );
                                foreach ($overtimes as $overtime) :
                                ?>
                                    <option value="<?php echo $overtime; ?>"><?php echo $overtime; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input class="c-hidden js-select-input1" type="checkbox" name="score[]" value="0">
                            <input class="c-hidden js-select-input2" type="checkbox" name="score[]" value="5">
                            <input class="c-hidden js-select-input3" type="checkbox" name="score[]" value="6">
                            <input class="c-hidden js-select-input4" type="checkbox" name="score[]" value="7">
                            <input class="c-hidden js-select-input5" type="checkbox" name="score[]" value="8">
                            <input class="c-hidden js-select-input6" type="checkbox" name="score[]" value="9">
                            <input class="c-hidden js-select-input7" type="checkbox" name="score[]" value="10">
                        </div>
                        <div class="p-form-button js-next --number2">次 へ
                        </div>
                        <!-- <button class="p-form-button--back">←戻る</button> -->
                    </div>
                    <div class="p-main-form__inner --number2">
                        <p class="p-main-form__lead">＼ 診断終了まであと11問 ／</p>
                        <div class="p-progress-container">
                            <!-- <div class="progress-bar" style="width: 20%;"></div>
                            <div class="progress-text">20%</div> -->
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>

                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>

                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                        </div>
                        <p class="c-main-figure">QUESTION 02</p>
                        <p class="p-main-form__question">みなし残業の設定はありますか？</p>
                        <div class="p-main-select__wrap js-select-change2">
                            <select class="p-main-select" name="set_overtime[]">
                                <option value="unanswered">未回答</option>
                                <?php
                                $othertimes = array(
                                    "設定なし", "1～10時間未満", "10～20時間未満", "21～30時間未満", "31～40時間未満",
                                    "41～50時間未満", "50時間以上",
                                );
                                foreach ($othertimes as $othertime) :
                                ?>
                                    <option value="<?php echo $othertime; ?>"><?php echo $othertime; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input class="c-hidden js-select-input1" type="checkbox" name="score[]" value="0">
                            <input class="c-hidden js-select-input2" type="checkbox" name="score[]" value="5">
                            <input class="c-hidden js-select-input3" type="checkbox" name="score[]" value="6">
                            <input class="c-hidden js-select-input4" type="checkbox" name="score[]" value="7">
                            <input class="c-hidden js-select-input5" type="checkbox" name="score[]" value="8">
                            <input class="c-hidden js-select-input6" type="checkbox" name="score[]" value="9">
                            <input class="c-hidden js-select-input7" type="checkbox" name="score[]" value="10">
                        </div>
                        <div class="p-form-button js-next --number3">次 へ</div>
                        <div class="p-form-button--back">←戻る</div>
                    </div>
                    <div class="p-main-form__inner --number3">
                        <p class="p-main-form__lead">＼ 診断終了まであと10問 ／</p>
                        <div class="p-progress-container">
                            <!-- <div class="progress-bar" style="width: 20%;"></div>
                            <div class="progress-text">20%</div> -->
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>

                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>

                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                        </div>
                        <p class="c-main-figure">QUESTION 03</p>
                        <p class="p-main-form__question">残業時間は正しく給料として<br>支払われていますか？<br>
                            <span class="c-main-mini">（みなし設定ある場合は、それを超えた残業<br>について）</span>
                        </p>
                        <ul class="p-form-list__ul">
                            <li class="p-form-list__li">
                                <input type="radio" name="right_overtime[]" id="payment1" class="p-form-list__input" value="全額支払われている">
                                <label class="c-label" for="payment1">
                                    全額支払われている
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="0">
                            </li>
                            <li class="p-form-list__li">
                                <input type="radio" name="right_overtime[]" id="payment2" class="p-form-list__input" value="一部支払われている">
                                <label class="c-label" for="payment2">
                                    一部支払われている
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="5">
                            </li>
                            <li class="p-form-list__li">
                                <input type="radio" name="right_overtime[]" id="payment3" class="p-form-list__input" value="ほとんど支払われていない">
                                <label class="c-label" for="payment3">
                                    ほとんど支払われていない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="10">
                            </li>
                        </ul>
                        <div class="p-form-button js-next --number4">次 へ</div>
                        <div class="p-form-button--wrap">
                            <span class="p-form-button--back">←戻る</span>
                        </div>
                    </div>
                    <div class="p-main-form__inner --number4">
                        <p class="p-main-form__lead">＼ 診断終了まであと9問 ／</p>
                        <div class="p-progress-container">
                            <!-- <div class="progress-bar" style="width: 20%;"></div>
                            <div class="progress-text">20%</div> -->
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step"></div>

                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>

                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                        </div>
                        <p class="c-main-figure">QUESTION 04</p>
                        <p class="p-main-form__question">勤怠管理について<br>当てはまるものをお選びください</p>
                        <ul class="p-form-list__ul">
                            <li class="p-form-list__li">
                                <input type="radio" name="attendance[]" id="attendance1" class="p-form-list__input" value="時間外も全て正しく付けられている">
                                <label class="c-label" for="attendance1">
                                    時間外も全て正しく付けられている
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="0">
                            </li>
                            <li class="p-form-list__li">
                                <input type="radio" name="attendance[]" id="attendance2" class="p-form-list__input" value="時間外の一部が付けられていない">
                                <label class="c-label" for="attendance2">
                                    時間外の一部が付けられていない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="5">
                            </li>
                            <li class="p-form-list__li">
                                <input type="radio" name="attendance[]" id="attendance3" class="p-form-list__input" value="時間外は付けられていない">
                                <label class="c-label" for="attendance3">
                                    時間外は付けられていない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="10">
                            </li>
                        </ul>
                        <div class="p-form-button js-next --number5">次 へ</div>
                        <div class="p-form-button--wrap">
                            <span class="p-form-button--back">←戻る</span>
                        </div>
                    </div>
                    <div class="p-main-form__inner --number5">
                        <p class="p-main-form__lead">＼ 診断終了まであと8問 ／</p>
                        <div class="p-progress-container">
                            <!-- <div class="progress-bar" style="width: 20%;"></div>
                            <div class="progress-text">20%</div> -->
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>

                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>

                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                        </div>
                        <p class="c-main-figure">QUESTION 05</p>
                        <p class="p-main-form__question">有給取得について当てはまるものを<br>お選びください</p>
                        <ul class="p-form-list__ul">
                            <li class="p-form-list__li">
                                <input type="radio" name="paid_vacation[]" id="paid_vacation1" class="p-form-list__input" value="好きな時に自由に取得できる">
                                <label class="c-label" for="paid_vacation1">
                                    好きな時に自由に取得できる
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="0">
                            </li>
                            <li class="p-form-list__li">
                                <input type="radio" name="paid_vacation[]" id="paid_vacation2" class="p-form-list__input" value="理由を伝えて許可を取れば取得できる">
                                <label class="c-label" for="paid_vacation2">
                                    理由を伝えて許可を取れば取得できる
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="5">
                            </li>
                            <li class="p-form-list__li">
                                <input type="radio" name="paid_vacation[]" id="paid_vacation3" class="p-form-list__input" value="体調不良や忌引などでしか取得できない">
                                <label class="c-label" for="paid_vacation3">
                                    体調不良や忌引などでしか取得できない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="7">
                            </li>
                            <li class="p-form-list__li">
                                <input type="radio" name="paid_vacation[]" id="paid_vacation4" class="p-form-list__input" value="暗黙のルールで取得できない">
                                <label class="c-label" for="paid_vacation4">
                                    暗黙のルールで取得できない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="10">
                            </li>
                        </ul>
                        <div class="p-form-button js-next --number6">次 へ</div>
                        <div class="p-form-button--wrap">
                            <span class="p-form-button--back">←戻る</span>
                        </div>
                    </div>
                    <div class="p-main-form__inner --number6">
                        <p class="p-main-form__lead">＼ 診断終了まであと7問 ／</p>
                        <div class="p-progress-container">
                            <!-- <div class="progress-bar" style="width: 20%;"></div>
                            <div class="progress-text">20%</div> -->
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>

                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>

                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                        </div>
                        <p class="c-main-figure">QUESTION 06</p>
                        <p class="p-main-form__question">休憩時間について当てはまるものを<br>お選びください<br>
                            <span class="c-main-mini">（6時間以上8時間未満勤務の場合45分<br>8時間以上の場合1時間の休憩）</span>
                        </p>
                        <ul class="p-form-list__ul">
                            <li class="p-form-list__li">
                                <input type="radio" name="break_time[]" id="break_time1" class="p-form-list__input" value="決まった時間に規定時間の休憩が取れている">
                                <label class="c-label" for="break_time1">
                                    決まった時間に規定時間の<br>休憩が取れている
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="0">
                            </li>
                            <li class="p-form-list__li">
                                <input type="radio" name="break_time[]" id="break_time2" class="p-form-list__input" value="決まった時間ではないが規定時間の休憩が取れている">
                                <label class="c-label" for="break_time2">
                                    決まった時間ではないが<br>規定時間の休憩が取れている
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="2">
                            </li>
                            <li class="p-form-list__li">
                                <input type="radio" name="break_time[]" id="break_time3" class="p-form-list__input" value="規定時間の休憩が取れるときと取れないときがある">
                                <label class="c-label" for="break_time3">
                                    規定時間の休憩が取れるときと<br>取れないときがある
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="6">
                            </li>
                            <li class="p-form-list__li">
                                <input type="radio" name="break_time[]" id="break_time4" class="p-form-list__input" value="勤怠上は強制的に休憩時間が入っているものの実際は休憩できていない">
                                <label class="c-label" for="break_time4">
                                    勤怠上は強制的に休憩時間が入っているものの<br>実際は休憩できていない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="10">
                            </li>
                        </ul>
                        <div class="p-form-button js-next --number7">次 へ</div>
                        <div class="p-form-button--wrap">
                            <span class="p-form-button--back">←戻る</span>
                        </div>
                    </div>
                    <div class="p-main-form__inner --number7">
                        <p class="p-main-form__lead">＼ 診断終了まであと6問 ／</p>
                        <div class="p-progress-container">
                            <!-- <div class="progress-bar" style="width: 20%;"></div>
                            <div class="progress-text">20%</div> -->
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>

                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>

                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                        </div>
                        <p class="c-main-figure">QUESTION 07</p>
                        <p class="p-main-form__question">教育や研修について当てはまるものを<br>お選びください</p>
                        <ul class="p-form-list__ul">
                            <li class="p-form-list__li">
                                <input type="radio" name="training[]" id="training1" class="p-form-list__input" value="勤務時間内でおこなわれており、給料の対象になっている">
                                <label class="c-label" for="training1">
                                    勤務時間内でおこなわれており、<br>給料の対象になっている
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="0">
                            </li>
                            <li class="p-form-list__li">
                                <input type="radio" name="training[]" id="training2" class="p-form-list__input" value="時間外でおこなわれているが、給料の対象になっている">
                                <label class="c-label" for="training2">
                                    時間外でおこなわれているが、<br>給料の対象になっている
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="4">
                            </li>
                            <li class="p-form-list__li">
                                <input type="radio" name="training[]" id="training3" class="p-form-list__input" value="平日時間外で強制でおこなわれ、給料の対象にならない">
                                <label class="c-label" for="training3">
                                    平日時間外で強制でおこなわれ、<br>給料の対象にならない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="8">
                            </li>
                            <li class="p-form-list__li">
                                <input type="radio" name="training[]" id="training4" class="p-form-list__input" value="休日に強制でおこなわれ、給料の対象にならない">
                                <label class="c-label" for="training4">
                                    休日に強制でおこなわれ、<br>給料の対象にならない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="10">
                            </li>
                        </ul>
                        <div class="p-form-button js-next --number8">次 へ</div>
                        <div class="p-form-button--wrap">
                            <span class="p-form-button--back">←戻る</span>
                        </div>
                    </div>
                    <div class="p-main-form__inner --number8">
                        <p class="p-main-form__lead">＼ 診断終了まであと5問 ／</p>
                        <div class="p-progress-container">
                            <!-- <div class="progress-bar" style="width: 20%;"></div>
                            <div class="progress-text">20%</div> -->
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>

                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>

                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                        </div>
                        <p class="c-main-figure">QUESTION 08</p>
                        <p class="p-main-form__question">評価制度について当てはまるものを<br>お選びください</p>
                        <ul class="p-form-list__ul">
                            <li class="p-form-list__li">
                                <input type="radio" name="evaluation[]" id="evaluation1" class="p-form-list__input" value="評価制度があり、評価基準が明確かつ適正な評価がされている">
                                <label class="c-label" for="evaluation1">
                                    評価制度があり、評価基準が明確<br>かつ適正な評価がされている
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="0">
                            </li>
                            <li class="p-form-list__li">
                                <input type="radio" name="evaluation[]" id="evaluation2" class="p-form-list__input" value="評価制度はあるが、基準があいまいで評価が不明瞭なところがある">
                                <label class="c-label" for="evaluation2">
                                    評価制度はあるが、基準があいまいで<br>評価が不明瞭なところがある
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="8">
                            </li>
                            <li class="p-form-list__li">
                                <input type="radio" name="evaluation[]" id="evaluation3" class="p-form-list__input" value="評価制度はあるが、形だけで好き嫌いでほぼ評価が決まっている">
                                <label class="c-label" for="evaluation3">
                                    評価制度はあるが、形だけで<br>好き嫌いでほぼ評価が決まっている
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="10">
                            </li>
                            <li class="p-form-list__li">
                                <input type="radio" name="evaluation[]" id="evaluation4" class="p-form-list__input" value="評価制度はなく、何をすれば評価されるのかわからない">
                                <label class="c-label" for="evaluation4">
                                    評価制度はなく、何をすれば評価されるのか<br>わからない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="10">
                            </li>
                        </ul>
                        <div class="p-form-button js-next --number9">次 へ</div>
                        <div class="p-form-button--wrap">
                            <span class="p-form-button--back">←戻る</span>
                        </div>
                    </div>
                    <div class="p-main-form__inner --number9">
                        <p class="p-main-form__lead">＼ 診断終了まであと4問 ／</p>
                        <div class="p-progress-container">
                            <!-- <div class="progress-bar" style="width: 20%;"></div>
                            <div class="progress-text">20%</div> -->
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>

                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step"></div>

                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                        </div>
                        <p class="c-main-figure">QUESTION 09</p>
                        <p class="p-main-form__question">福利厚生について当てはまるものを<br><span class="c-main-ora">すべて</span>お選びください</p>
                        <ul class="p-form-list__ul">
                            <li class="p-form-list__li">
                                <input type="checkbox" name="employee_benefits[]" id="employee_benefits1" class="p-form-list__input" value="福利厚生は何もない">
                                <label class="c-label" for="employee_benefits1">
                                    福利厚生は何もない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="0">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="employee_benefits[]" id="employee_benefits2" class="p-form-list__input" value="退職金制度がある">
                                <label class="c-label" for="employee_benefits2">
                                    退職金制度がある
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="-1">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="employee_benefits[]" id="employee_benefits3" class="p-form-list__input" value="家賃補助制度がある">
                                <label class="c-label" for="employee_benefits3">
                                    家賃補助制度がある
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="-1">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="employee_benefits[]" id="employee_benefits4" class="p-form-list__input" value="資格支援制度がある">
                                <label class="c-label" for="employee_benefits4">
                                    資格支援制度がある
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="-1">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="employee_benefits[]" id="employee_benefits5" class="p-form-list__input" value="資格保有者への手当がある">
                                <label class="c-label" for="employee_benefits5">
                                    資格保有者への手当がある
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="-1">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="employee_benefits[]" id="employee_benefits6" class="p-form-list__input" value="どれもあてはまらない">
                                <label class="c-label" for="employee_benefits6">
                                    どれもあてはまらない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="0">
                            </li>
                        </ul>
                        <div class="p-form-button js-next --number10">次 へ</div>
                        <!-- <input type="submit" class="p-form-button --submit" value="次へ"> -->
                        <div class="p-form-button--wrap">
                            <span class="p-form-button--back">←戻る</span>
                        </div>
                    </div>
                    <div class="p-main-form__inner --number9">
                        <p class="p-main-form__lead">＼ 診断終了まであと3問 ／</p>
                        <div class="p-progress-container">
                            <!-- <div class="progress-bar" style="width: 20%;"></div>
                            <div class="progress-text">20%</div> -->
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>

                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>

                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                        </div>
                        <p class="c-main-figure">QUESTION 10</p>
                        <p class="p-main-form__question">職場の人間関係について当てはまる<br>ものを<span class="c-main-ora">すべて</span>お選びください</p>
                        <ul class="p-form-list__ul">
                            <li class="p-form-list__li">
                                <input type="checkbox" name="relationships[]" id="relationships1" class="p-form-list__input" value="代表(所長)に対し、意見を述べられる人がいない">
                                <label class="c-label" for="relationships1">
                                    代表(所長)に対し、<br>意見を述べられる人がいない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="3">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="relationships[]" id="relationships2" class="p-form-list__input" value="信頼できる人が少ない">
                                <label class="c-label" for="relationships2">
                                    信頼できる人が少ない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="3">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="relationships[]" id="relationships3" class="p-form-list__input" value="相談できる人がいない">
                                <label class="c-label" for="relationships3">
                                    相談できる人がいない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="3">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="relationships[]" id="relationships4" class="p-form-list__input" value="ハラスメント(パワハラ・モラハラ・セクハラ)がある">
                                <label class="c-label" for="relationships4">
                                    ハラスメント(パワハラ・モラハラ・<br>セクハラ)がある
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="5">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="relationships[]" id="relationships5" class="p-form-list__input" value="不平不満が裏側（陰口）で話されていることが多い">
                                <label class="c-label" for="relationships5">
                                    不平不満が裏側（陰口）で<br>話されていることが多い
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="3">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="relationships[]" id="relationships6" class="p-form-list__input" value="飲み会は断れない雰囲気がある">
                                <label class="c-label" for="relationships6">
                                    飲み会は断れない雰囲気がある
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="3">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="relationships[]" id="relationships7" class="p-form-list__input" value="どれもあてはまらない">
                                <label class="c-label" for="relationships7">
                                    どれもあてはまらない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="0">
                            </li>
                        </ul>
                        <div class="p-form-button js-next --number11">次 へ</div>
                        <!-- <input type="submit" class="p-form-button --submit" value="次へ"> -->
                        <div class="p-form-button--wrap">
                            <span class="p-form-button--back">←戻る</span>
                        </div>
                    </div>
                    <div class="p-main-form__inner --number9">
                        <p class="p-main-form__lead">＼ 診断終了まであと2問 ／</p>
                        <div class="p-progress-container">
                            <!-- <div class="progress-bar" style="width: 20%;"></div>
                            <div class="progress-text">20%</div> -->
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>

                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>

                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step"></div>
                            <div class="p-progress-step"></div>
                        </div>
                        <p class="c-main-figure">QUESTION 11</p>
                        <p class="p-main-form__question">職場の状況に当てはまるものを<br><span class="c-main-ora">すべて</span>お選びください</p>
                        <ul class="p-form-list__ul">
                            <li class="p-form-list__li">
                                <input type="checkbox" name="workplace_situation[]" id="workplace_situation1" class="p-form-list__input" value="ワンマン経営">
                                <label class="c-label" for="workplace_situation1">
                                    ワンマン経営
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="3">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="workplace_situation[]" id="workplace_situation2" class="p-form-list__input" value="離職率が高い（人の入れ替わりが多い）">
                                <label class="c-label" for="workplace_situation2">
                                    離職率が高い<br>（人の入れ替わりが多い）
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="3">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="workplace_situation[]" id="workplace_situation3" class="p-form-list__input" value="承継問題がある（後継ぎが決まっていない）">
                                <label class="c-label" for="workplace_situation3">
                                    承継問題がある<br>（後継ぎが決まっていない）
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="3">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="workplace_situation[]" id="workplace_situation4" class="p-form-list__input" value="休日も関係なく仕事の連絡が入る">
                                <label class="c-label" for="workplace_situation4">
                                    休日も関係なく仕事の連絡が入る
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="5">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="workplace_situation[]" id="workplace_situation5" class="p-form-list__input" value="掃除や朝礼などが勤務時間外に設定されている">
                                <label class="c-label" for="workplace_situation5">
                                    掃除や朝礼などが勤務時間外に<br>設定されている
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="3">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="workplace_situation[]" id="workplace_situation6" class="p-form-list__input" value="資格取得について配慮がない(勉強時間の確保、受験休暇など)">
                                <label class="c-label" for="workplace_situation6">
                                    資格取得について配慮がない<br>(勉強時間の確保、受験休暇など)
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="3">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="workplace_situation[]" id="workplace_situation7" class="p-form-list__input" value="どれもあてはまらない">
                                <label class="c-label" for="workplace_situation7">
                                    どれもあてはまらない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="0">
                            </li>
                        </ul>
                        <div class="p-form-button js-next --number11">次 へ</div>
                        <!-- <input type="submit" class="p-form-button --submit" value="次へ"> -->
                        <div class="p-form-button--wrap">
                            <span class="p-form-button--back">←戻る</span>
                        </div>
                    </div>
                    <div class="p-main-form__inner --number12">
                        <p class="p-main-form__lead">＼ 診断終了まであと1問 ／</p>
                        <div class="p-progress-container">
                            <!-- <div class="progress-bar" style="width: 20%;"></div>
                            <div class="progress-text">20%</div> -->
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>

                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>

                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step is-active"></div>
                            <div class="p-progress-step1"></div>
                        </div>
                        <p class="c-main-figure">QUESTION 12</p>
                        <p class="p-main-form__question">あなたの状況に当てはまるものを<br><span class="c-main-ora">すべて</span>お選びください</p>
                        <ul class="p-form-list__ul">
                            <li class="p-form-list__li">
                                <input type="checkbox" name="my_situation[]" id="my_situation1" class="p-form-list__input" value="自己投資する時間が取れていない">
                                <label class="c-label" for="my_situation1">
                                    自己投資する時間が取れていない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="3">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="my_situation[]" id="my_situation2" class="p-form-list__input" value="仕事場と家に往復で日々が過ぎている">
                                <label class="c-label" for="my_situation2">
                                    仕事場と家に往復で日々が過ぎている
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="3">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="my_situation[]" id="my_situation3" class="p-form-list__input" value="日々作業に追われ、成長を感じられない">
                                <label class="c-label" for="my_situation3">
                                    日々作業に追われ、成長を感じられない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="3">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="my_situation[]" id="my_situation4" class="p-form-list__input" value="仕事内容、勤務時間に対し、給料が適正でないと感じる">
                                <label class="c-label" for="my_situation4">
                                    仕事内容、勤務時間に対し、給料が<br>適正でないと感じる
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="3">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="my_situation[]" id="my_situation5" class="p-form-list__input" value="転職したいが、その時間が取れない">
                                <label class="c-label" for="my_situation5">
                                    転職したいが、その時間が取れない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="3">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="my_situation[]" id="my_situation6" class="p-form-list__input" value="退職は言い出しづらいと感じる">
                                <label class="c-label" for="my_situation6">
                                    退職は言い出しづらいと感じる
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="3">
                            </li>
                            <li class="p-form-list__li">
                                <input type="checkbox" name="my_situation[]" id="my_situation7" class="p-form-list__input" value="どれもあてはまらない">
                                <label class="c-label" for="my_situation7">
                                    どれもあてはまらない
                                </label>
                                <input class="c-hidden" type="checkbox" name="score[]" value="0">
                            </li>
                        </ul>
                        <!-- <div class="p-form-button js-next --number13">次 へ</div> -->
                        <input type="submit" class="p-form-button --submit" value="次へ">
                        <div class="p-form-button--wrap">
                            <span class="p-form-button--back">←戻る</span>
                        </div>
                    </div>
                </form>
            </div>
        </main>

        <footer class="l-footer">
            <!-- <p class="p-footer-copy">©, All Rights Reserved.</p> -->
        </footer>
        <!-- <script type="text/javascript" src="/store/blackNew/js/lib/heightLine.js"></script> -->
        <!-- <script type="text/javascript" src="/store/blackNew/js/lib//slick.min.js"></script> -->
        <script type="text/javascript" src="/store/blackNew/js/script.js"></script>
    </div>
</body>

</html>
