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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>ミツカル</title>
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

    {{-- tag --}}
    <script src="https://link-ag.net/dist/p/l/index.js"></script>
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5RGFV3CH"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="lp_all_wrap">
    <div class="top_view_wrap">
        <img src="/images/lp/top_view.jpg" alt="">

        <a class="lp_button animated pulse infinite" href="#register">
            <img src="/images/lp/register_button.png" alt="">
        </a>
    </div>

    <div class="worries_wrap">
        <div class="worries_top">
            <div class="js_company_list">
                @for($i=1;$i < 14;$i++)
                    <div>
                        <img class="company_list" src="/images/lp/company_slider/logo_{{$i}}.png" alt="">
                    </div>
                @endfor
            </div>
            <img class="lp_title" src="/images/lp/worries_text.png" alt="" style="width: 300px">
        </div>
        <div class="lp_contents" style="padding: 0 15px">
            <ul class="common_list">
                <li>
                    <img src="/images/lp/worries_1.png" alt="">
                </li>
                <li>
                    <img src="/images/lp/worries_2.png" alt="">
                </li>
                <li>
                    <img src="/images/lp/worries_3.png" alt="">
                </li>
            </ul>
        </div>
    </div>
    <img class="triangle_w" src="/images/lp/triangle.png" alt="">

    <div class="reason_wrap lp_contents triangle_wrap">
        <div class="headline_wrap mt">
            <img class="all" src="/images/lp/reason_text_1.png" alt="">
            <img src="/images/lp/reason_text_2.png" alt="">
        </div>

        <ul class="common_list">
            <li>
                <img src="/images/lp/reason_1.png" alt="">
            </li>
            <li>
                <img src="/images/lp/reason_2.png" alt="">
            </li>
            <li>
                <img src="/images/lp/reason_3.png" alt="">
            </li>
            <li>
                <img src="/images/lp/reason_4.png" alt="">
            </li>
            <li>
                <img src="/images/lp/reason_5.png" alt="">
            </li>
        </ul>

        <img class="triangle_img" src="/images/lp/triangle_navy.png" alt="">
    </div>

    <div class="consultation_wrap triangle_wrap">
        <img src="/images/lp/consultation.png" alt="">

        <a class="lp_button animated pulse infinite" href="#register">
            <img src="/images/lp/register_button.png" alt="">
        </a>
    </div>

    <div class="pickup_wrap lp_contents triangle_wrap">
        <div class="headline_wrap">
            <img src="/images/lp/pickup_text_1.png" alt="">
            <img src="/images/lp/pickup_text_2.png" alt="">
        </div>

        <ul id="js_lp_slider" class="project_wrap">
            @foreach ($company_list as $company)
                @if($loop->index == 4)
                    @continue
                @endif
                <li class="project_list">
                    <div>
                        <img class="job_img {{$company->img_path ? '' : 'no_icon'}}"
                             src="{{$company->img_path ? $company->img_path : '/images/default_image.svg'}}">
                        <div class="job_data_wrap not_login">
                            <p class="job_title">{{$company->name}}</p>
                        </div>
                        <span class="js_company_modal_open show_job" data-val="{{json_encode($company)}}">
                                求人内容を見る
                            </span>
                    </div>
                </li>
            @endforeach
        </ul>

        <img class="triangle_img" src="/images/lp/triangle.png" alt="">
    </div>

    <div class="voice_wrap lp_contents triangle_wrap">
        <div class="headline_wrap mt">
            <img src="/images/lp/voice_text_1.png" alt="" class="big">
            <img src="/images/lp/voice_text_2.png" alt="">
        </div>

        <ul class="voice_list">
            <li>
                <div class="top_area">
                    <span>VOICE</span>
                    <h2>1</h2>
                </div>

                <div class="bottom_area">
                    <div class="left_area">
                        <img src="/images/lp/user_voice_1.webp" alt="">

                        <ul>
                            <li>
                                <span>転職期間</span>
                                <span>1ヵ月</span>
                            </li>
                            <li>
                                <span>業界経験</span>
                                <span>5年</span>
                            </li>
                            <li>
                                <span>現在の収入</span>
                                <span>650万円</span>
                            </li>
                        </ul>
                    </div>
                    <div class="right_area">
                        @if($device == 'pc')
                            <h3>個人事務所から特化型事務所へ転職</h3>
                            <p>
                                神奈川県の個人事務所で巡回担当として
                                働いていましたが、訪問先の社長は零細や
                                小規模ばかりでした。年収が上がっていくに
                                は担当件数や規模感を増やす他なく、資料
                                を期限通りに送ってすらこない企業を相手
                                にしても将来性は無いなと感じていました。
                                資産税にもともと興味がありチャレンジをし
                                たいと思っていたのでミツカルに条件登録
                                したら、都内の相続特化事務所からまさか
                                のオファーがありました。担当した報酬に対
                                してのインセンティブもよく転職してよかっ
                                たと感じております。
                            </p>
                        @else
                            <h3>個人事務所から<br>特化型事務所へ転職</h3>
                            <p>
                                神奈川県の個人事務所で巡回担当として
                                働いていましたが、訪問先の社長は零細や
                                小規模ばかりでした。年収が上がっていくに
                                は担当件数や規模感を増やす他なく、資料
                                を期限通りに送ってすらこない企業を相手
                                にしても将来性は無いなと感じていました。
                            </p>
                            <p style="display: none">
                                資産税にもともと興味がありチャレンジをし
                                たいと思っていたのでミツカルに条件登録
                                したら、都内の相続特化事務所からまさか
                                のオファーがありました。担当した報酬に対
                                してのインセンティブもよく転職してよかっ
                                たと感じております。
                            </p>

                            <p class="js_open_text">全文を読む</p>
                        @endif
                    </div>
                </div>
            </li>
            <li>
                <div class="top_area">
                    <span>VOICE</span>
                    <h2>2</h2>
                </div>

                <div class="bottom_area">
                    <div class="left_area">
                        <img src="/images/lp/user_voice_2.webp" alt="">

                        <ul>
                            <li>
                                <span>転職期間</span>
                                <span>2ヵ月</span>
                            </li>
                            <li>
                                <span>業界経験</span>
                                <span>13年</span>
                            </li>
                            <li>
                                <span>現在の収入</span>
                                <span>700万円</span>
                            </li>
                        </ul>
                    </div>
                    <div class="right_area">
                        @if($device == 'pc')
                            <h3>5大都市から地元の大手事務所へ転職</h3>
                            <p>
                                大阪の中堅事務所でマネージャーとして働いてましたが、両親と子供の事を考え、
                                地元に戻りました。正直年収は下がってますが、地方の生活水準では充分です。
                                休日は家族で一緒に出かけて両親も孫に逢える頻度が増えて喜んでました、
                                今の事務所は地方でも有名な事務所で地域で有名な企業も担当をさせていただいております。
                                ミツカルは登録してすぐにオファーがあったので、
                                登録期間が短くて担当の方もびっくりしてましたが、良いサービスだとは思います。
                            </p>
                        @else
                            <h3>5大都市から<br>地元の大手事務所へ転職</h3>
                            <p>
                                大阪の中堅事務所でマネージャーとして働いてましたが、両親と子供の事を考え、
                                地元に戻りました。正直年収は下がってますが、地方の生活水準では充分です。
                            </p>
                            <p style="display: none">
                                休日は家族で一緒に出かけて両親も孫に逢える頻度が増えて喜んでました、
                                今の事務所は地方でも有名な事務所で地域で有名な企業も担当をさせていただいております。
                                ミツカルは登録してすぐにオファーがあったので、
                                登録期間が短くて担当の方もびっくりしてましたが、良いサービスだとは思います。
                            </p>

                            <p class="js_open_text">全文を読む</p>
                        @endif
                    </div>
                </div>
            </li>
            <li>
                <div class="top_area">
                    <span>VOICE</span>
                    <h2>3</h2>
                </div>

                <div class="bottom_area">
                    <div class="left_area">
                        <img src="/images/lp/user_voice_3.webp" alt="">

                        <ul>
                            <li>
                                <span>転職期間</span>
                                <span>1ヵ月</span>
                            </li>
                            <li>
                                <span>業界経験</span>
                                <span>5年</span>
                            </li>
                            <li>
                                <span>現在の収入</span>
                                <span>650万円</span>
                            </li>
                        </ul>
                    </div>
                    <div class="right_area">
                        @if($device == 'pc')
                            <h3>大手会計事務所から個人事務所へ転職</h3>
                            <p>
                                業界でも大手と言われる会計事務所におりましたが、
                                税理士登録をするか？独立をするか？を検討したときに
                                ミツカルに登録しました。
                                今の代表は初代で創業して長年事務所を運営してきたが、
                                後継者がいなくパートナーとしてオファーをされました。
                                今は私が事務所の運営を信頼され一任されているので、
                                次のステージ向けて採用や業務改善も行っております。
                            </p>
                        @else
                            <h3>大手会計事務所から<br>個人事務所へ転職</h3>
                            <p>
                                業界でも大手と言われる会計事務所におりましたが、
                                税理士登録をするか？独立をするか？を検討したときに
                                ミツカルに登録しました。
                            </p>
                            <p style="display: none">
                                今の代表は初代で創業して長年事務所を運営してきたが、
                                後継者がいなくパートナーとしてオファーをされました。
                                今は私が事務所の運営を信頼され一任されているので、
                                次のステージ向けて採用や業務改善も行っております。
                            </p>
                            <p class="js_open_text">全文を読む</p>
                        @endif
                    </div>
                </div>
            </li>
        </ul>
        <img class="triangle_img" src="/images/lp/triangle.png" alt="">
    </div>

    <div class="flow_wrap lp_contents triangle_wrap">
        <div class="headline_wrap mt">
            <img src="/images/lp/flow_text_1.png" alt="" class="flow big">
            <img src="/images/lp/flow_text_2.png" alt="" style="margin-bottom: 30px;">
        </div>

        <img src="/images/lp/flow_figure.png" alt="" style="width: 100%">
        <img class="triangle_img" src="/images/lp/triangle.png" alt="">
    </div>

    <div class="lp_contents register_wrap" id="register">
        <form action="" method="post" class="lp_register_form" id="work_form">
            @csrf
            <ul>
                <li>
                    <img src="/images/lp/saport.png" alt="">
                </li>
                <li>
                    <label for="">姓</label>
                    <input type="text" name="lastname" placeholder="例）田中" required>
                </li>
                <li>
                    <label for="">名</label>
                    <input type="text" name="firstname" placeholder="例）太郎" required>
                </li>
                <li>
                    <label for="">メールアドレス</label>
                    <input type="email" name="email"
                           placeholder="例）test@example.com" required>
                </li>
                <li>
                    <label for="">TEL</label>
                    <input type="tel" name="tel" placeholder="例）08012345678" required>
                </li>
                <li>
                    <label for="">希望勤務地</label>
                    <select name="place" id="" required>
                        @foreach($prefectures as $prefecture)
                            <option value="{{$prefecture->name}}">
                                {{$prefecture->name}}
                            </option>
                        @endforeach
                    </select>
                </li>
                <li>
                    <label for="">生まれ年</label>
                    <select name="age" id="" required>
                        <option value="1">未回答</option>
                        @for($val = 1950; $val <= date("Y"); $val++)
                            <option value="{{$val}}">{{$val}}年</option>
                        @endfor
                    </select>
                </li>
                <li>
                    <label for="">税務経験（税理士事務所勤務年数）</label>
                    <select name="experience" id="" required>
                        <option value="未経験">未経験</option>
                        <option value="1 ~ 2 年">1 ~ 2 年</option>
                        <option value="3 ~ 5 年">3 ~ 5 年</option>
                        <option value="6 年以上">6 年以上</option>
                    </select>
                </li>
                <li>
                    <label for="">希望雇用形態</label>
                    <select name="employment_status" id="" required>
                        <option value="正社員">正社員</option>
                        <option value="パート">パート</option>
                    </select>
                </li>
                <li>
                    <input type="hidden" name="src" value="{{ url()->full() }}">
{{--                    <div class="g-recaptcha" data-sitekey="6LfhTBMiAAAAAAmwzsR-mmit5MeUYXpIsWouJGxI" data-callback="myAlert" style="display: flex;justify-content: center;margin-bottom: 15px;"></div>--}}
                    <p style="margin-bottom: 15px; color: #fff; font-size: 12px; text-align: left; line-height: 1.5">現在ミツカルでは、未経験者やパートでの案件が無いため、税理士事務所勤務経験１年以上の経験者の登録を推奨しています</p>
                    <button class="apply_button" name="action" value="consultation_mail" id="submit_btn">
                        送信
                    </button>
                </li>
            </ul>
            {!! no_captcha()->input() !!}
        </form>
    </div>

    <footer class="lp_footer">
        <div class="top_footer">
            <p>会社概要</p>
            <table>
                <tr>
                    <th>会社名</th>
                    <td>
                        <a href="https://mitsukaru.cc/" target="_blank">
                            株式会社 ミツカル
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>代表</th>
                    <td>城之内 楊</td>
                </tr>
                <tr>
                    <th>設立年月日</th>
                    <td>2020年8月</td>
                </tr>
                <tr>
                    <th>所在地</th>
                    <td>
                        〒150-0022<br>
                        <p>
                            東京都渋谷区恵比寿南三丁目1-1<br>
                            いちご恵比寿グリーングラス6階<br>
                            <span class="c-mini-text">※本社移転しました（移転日2024/3/27）</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th>TEL</th>
                    <td><a href="tel:03-4500-4401">03-4500-4401</a></td>
                </tr>
            </table>
        </div>

        <div class="bottom_footer">
            <p>COPYRIGHT {{date('Y')}}. MITSUKARU ALL RIGHT RESERVED.</p>
        </div>
    </footer>

    {{--企業モーダル--}}
    <div class="base_modal company_modal">
        <div class="blue_area">
            <p class="js_company_name"></p>
            <h2 class="js_slogan"></h2>
        </div>
        <div class="modal_body">
            <ul class="company_data_list">
                <li>
                    <dl>
                        <dt>会社概要</dt>
                        <dd class="js_about_us"></dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt>ポイント</dt>
                        <dd class="js_point_wrap"></dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt>募集中のポジション</dt>
                        <dd class="js_position_wrap"></dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt>URL</dt>
                        <dd><a class="js_site_url" href="" target="_blank"></a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="back_color_black"></div>

{{--LP用タグ--}}
<script src="https://af.tosho-trading.co.jp/tafsales4.js"></script>

{{--reCAPTCHA--}}
{!! no_captcha()->script() !!}
{!! no_captcha()->getApiScript() !!}
<script>
//送信中テキストの表示
    $('#submit_btn').on('click', function() {

        var form = document.getElementById('work_form');
        var isValid = true;

        // 全ての必須項目についてチェック
        $(form).find('[required]').each(function() {
            if (!$(this).val()) {
                isValid = false;
                return false; // 入力がない場合はループを抜ける
            }
        });

        if (!isValid) {

        } else {
            // 必須項目が全て入力されている場合
            $('#submit_btn').text('送信中...');
            $('#submit_btn').css('pointer-events', 'none');
        }
    });


    // var onloadCallback = function () {
    //     //ウィジェットを表示するメソッド
    //     grecaptcha.render('recaptcha', {
    //         'sitekey': "6LeOev8cAAAAAOw_JuXyLjmH5rRm4SQZyyQpgSPu",
    //         'callback': verifyCallback,
    //         'expired-callback': expiredCallback
    //     });
    // };
    //
    // //チェックを入れて成功した場合に呼び出されるコールバック関数
    // var verifyCallback = function (response) { //コールバック関数の定義
    //     //#warning の p 要素のテキストを空にf
    //     document.getElementById("warning").textContent = '';
    //     //#send の button 要素の disabled 属性を解除
    //     document.getElementById("send").disabled = false;
    // };
    //
    // //期限切れの場合に呼び出されるコールバック関数
    // var expiredCallback = function () { //コールバック関数の定義
    //     //#warning の p 要素のテキストに文字列を設定
    //     document.getElementById("warning").textContent = '送信するにはチェックを入れてください。';
    //     //#send の button 要素に disabled 属性を設定
    //     document.getElementById("send").disabled = true;
    // };
    //
    // //確認メール送信モーダル
    // $(window).on('load', function () {
    //     const type = $('#js_modal_trigger').val();
    //
    //     if (type != undefined) {
    //         $('.contact_modal').fadeIn();
    //         $('.back_color_black').fadeIn();
    //     }
    // });
</script>
{{--<script src="https://www.google.com/recaptcha/api.js" async defer></script>--}}

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
