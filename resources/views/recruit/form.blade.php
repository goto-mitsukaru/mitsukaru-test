@extends('common.template')
@include('common.header')
@section('content')
    <style>
    </style>

    <link href="/css/form.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    <link href="/css/sp_form.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    <script src="/js/index.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LcxybIjAAAAAHvw6jrayDUzlSOSNsV9Fm8PN4Iz"></script>
    @if($isMobile)
        <script src="/js/sp_index.js"></script>
    @endif
    <div class="header_bg">
        <div class="header_orange_wrap">
        </div>
    </div>
    <div class="main_content">
        @if(isset($recruit))
            <a style="{{ $isMobile ? 'margin-top: 0' : 'margin-top: 50px' }}" class="jobdetail_link"
               href="/jobdetail/{{ $id }}" target="_blank">{{ $recruit->name }}</a>
            <p class="jobdetail_text">{!! $isMobile ? 'こちらの求人に興味を持っていただき<br>ありがとうございます。' : 'こちらの求人に興味を持っていただきありがとうございます。' !!}</p>
        @endif
        <div class="top_wrap">
            <div class="top_btn_wrap">
                <h1><img style="{{ $isMobile ? 'width: 100%' : 'width: 35vw' }}" src="/images/entry.png" alt=""></h1>
            </div>
        </div>
        <form action="/work/mail" method="post" id="work_form">
            @csrf
            <input type="hidden" name="recaptchaToken" id="recaptchaToken">
            <section class="sec_01 change_area active" id="sec_01">
                <ol class="stepBar">
                    <li class="visited"><span>1</span></li>
                    <li><span>2</span></li>
                    <li><span>3</span></li>
                    <li><span>4</span></li>
                </ol>
                <h1>あなたの現在の状態は？</h1>
                <ul style="justify-content: center">
                    <li id="work_style_a" class="work_style">
                        <div><p class="text">在職中</p></div>
                    </li>
                    <li id="work_style_b" class="work_style">
                        <div><p class="text">離職中</p></div>
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_03" id="btn_02" class="change_btn">次へ</a>
                </div>
                <input id="style" type="hidden" name="style">
            </section>
            <section class="sec_02 change_area" id="sec_02">
                <ol class="stepBar">
                    <li class="visited"><span>1</span></li>
                    <li class="visited"><span>2</span></li>
                    <li><span>3</span></li>
                    <li><span>4</span></li>
                </ol>
                <h1>保有資格</h1>
                <ul>
                    <li><input type="checkbox" id="g" name="license[]" value="税理士"><label for="g"><p class="text">
                                税理士</p>
                        </label></li>
                    <li><input type="checkbox" id="h" name="license[]" value="会計士"><label for="h"><p class="text">
                                会計士</p>
                        </label></li>
                    <li><input type="checkbox" id="i" name="license[]" value="税理士科目合格者"><label for="i"><p class="text">
                                税理士科目合格者</p>
                        </label></li>
                    {{--                    <li><input type="checkbox" id="j" name="license[]" value="簿記2級"><label for="j"><p>簿記2級</p></label>--}}
                    {{--                    </li>--}}
                    <li><input type="checkbox" id="k" name="license[]" value="その他"><label for="k"><p class="text">
                                その他</p></label>
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_01" id="btn_01_return" class="previous_btn">戻る</a>
                    <a href="#sec_03" id="btn_03" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>
            <section class="sec_03 change_area" id="sec_03">
                <ol class="stepBar">
                    <li class="visited"><span>1</span></li>
                    <li class="visited"><span>2</span></li>
                    <li class="visited"><span>3</span></li>
                    <li><span>4</span></li>
                </ol>
                <h1>希望エリア</h1>
                <ul class="region only_checked_area">
                    <li><p class="text">北海道・東北</p>
                        <ul class="{{ $isMobile ? 'sp_accordion' : '' }}">
                            <li><input type="radio" id="1" name="region[]" value="北海道"><label for="1">北海道</label>
                            </li>
                            <li><input type="radio" id="2" name="region[]" value="青森県"><label for="2">青森県</label>
                            </li>
                            <li><input type="radio" id="3" name="region[]" value="岩手県"><label for="3">岩手県</label>
                            </li>
                            <li><input type="radio" id="4" name="region[]" value="宮城県"><label for="4">宮城県</label>
                            </li>
                            <li><input type="radio" id="5" name="region[]" value="秋田県"><label for="5">秋田県</label>
                            </li>
                            <li><input type="radio" id="6" name="region[]" value="山形県"><label for="6">山形県</label>
                            </li>
                            <li><input type="radio" id="7" name="region[]" value="福島県"><label for="7">福島県</label>
                            </li>
                        </ul>
                    </li>
                    <li><p class="text">関東</p>
                        <ul class="{{ $isMobile ? 'sp_accordion' : '' }}">
                            <li><input type="radio" id="8" name="region[]" value="茨城県"><label for="8">茨城県</label>
                            </li>
                            <li><input type="radio" id="9" name="region[]" value="栃木県"><label for="9">栃木県</label>
                            </li>
                            <li><input type="radio" id="10" name="region[]" value="群馬県"><label for="10">群馬県</label>
                            </li>
                            <li><input type="radio" id="11" name="region[]" value="埼玉県"><label for="11">埼玉県</label>
                            </li>
                            <li><input type="radio" id="12" name="region[]" value="千葉県"><label for="12">千葉県</label>
                            </li>
                            <li><input type="radio" id="13" name="region[]" value="東京都"><label for="13">東京都</label>
                            </li>
                            <li><input type="radio" id="14" name="region[]" value="神奈川県"><label for="14">神奈川県</label>
                            </li>
                        </ul>
                    </li>
                    <li><p class="text">中部</p>
                        <ul class="{{ $isMobile ? 'sp_accordion' : '' }}">
                            <li><input type="radio" id="15" name="region[]" value="新潟県"><label for="15">新潟県</label>
                            </li>
                            <li><input type="radio" id="16" name="region[]" value="富山県"><label for="16">富山県</label>
                            </li>
                            <li><input type="radio" id="17" name="region[]" value="石川県"><label for="17">石川県</label>
                            </li>
                            <li><input type="radio" id="18" name="region[]" value="福井県"><label for="18">福井県</label>
                            </li>
                            <li><input type="radio" id="19" name="region[]" value="山梨県"><label for="19">山梨県</label>
                            </li>
                            <li><input type="radio" id="20" name="region[]" value="長野県"><label for="20">長野県</label>
                            </li>
                            <li><input type="radio" id="21" name="region[]" value="岐阜県"><label for="21">岐阜県</label>
                            </li>
                            <li><input type="radio" id="22" name="region[]" value="静岡県"><label for="22">静岡県</label>
                            </li>
                            <li><input type="radio" id="23" name="region[]" value="愛知県"><label for="23">愛知県</label>
                            </li>
                        </ul>
                    </li>
                    <li><p class="text">近畿</p>
                        <ul class="{{ $isMobile ? 'sp_accordion' : '' }}">
                            <li><input type="radio" id="24" name="region[]" value="三重県"><label for="24">三重県</label>
                            </li>
                            <li><input type="radio" id="25" name="region[]" value="滋賀県"><label for="25">滋賀県</label>
                            </li>
                            <li><input type="radio" id="26" name="region[]" value="京都府"><label for="26">京都府</label>
                            </li>
                            <li><input type="radio" id="27" name="region[]" value="大阪府"><label for="27">大阪府</label>
                            </li>
                            <li><input type="radio" id="28" name="region[]" value="兵庫県"><label for="28">兵庫県</label>
                            </li>
                            <li><input type="radio" id="29" name="region[]" value="奈良県"><label for="29">奈良県</label>
                            </li>
                            <li><input type="radio" id="30" name="region[]" value="和歌山県"><label for="30">和歌山県</label>
                            </li>
                        </ul>
                    </li>
                    <li><p class="text">中国</p>
                        <ul class="{{ $isMobile ? 'sp_accordion' : '' }}">
                            <li><input type="radio" id="31" name="region[]" value="鳥取県"><label for="31">鳥取県</label>
                            </li>
                            <li><input type="radio" id="32" name="region[]" value="島根県"><label for="32">島根県</label>
                            </li>
                            <li><input type="radio" id="33" name="region[]" value="岡山県"><label for="33">岡山県</label>
                            </li>
                            <li><input type="radio" id="34" name="region[]" value="広島県"><label for="34">広島県</label>
                            </li>
                            <li><input type="radio" id="35" name="region[]" value="山口県"><label for="35">山口県</label>
                            </li>
                        </ul>
                    </li>
                    <li><p class="text">四国</p>
                        <ul class="{{ $isMobile ? 'sp_accordion' : '' }}">
                            <li><input type="radio" id="36" name="region[]" value="徳島県"><label for="36">徳島県</label>
                            </li>
                            <li><input type="radio" id="37" name="region[]" value="香川県"><label for="37">香川県</label>
                            </li>
                            <li><input type="radio" id="38" name="region[]" value="愛媛県"><label for="38">愛媛県</label>
                            </li>
                            <li><input type="radio" id="39" name="region[]" value="高知県"><label for="39">高知県</label>
                            </li>
                        </ul>
                    </li>
                    <li><p class="text">九州・沖縄</p>
                        <ul class="{{ $isMobile ? 'sp_accordion' : '' }}">
                            <li><input type="radio" id="40" name="region[]" value="福岡県"><label for="40">福岡県</label>
                            </li>
                            <li><input type="radio" id="41" name="region[]" value="佐賀県"><label for="41">佐賀県</label>
                            </li>
                            <li><input type="radio" id="42" name="region[]" value="長崎県"><label for="42">長崎県</label>
                            </li>
                            <li><input type="radio" id="43" name="region[]" value="熊本県"><label for="43">熊本県</label>
                            </li>
                            <li><input type="radio" id="44" name="region[]" value="大分県"><label for="44">大分県</label>
                            </li>
                            <li><input type="radio" id="45" name="region[]" value="宮崎県"><label for="45">宮崎県</label>
                            </li>
                            <li><input type="radio" id="46" name="region[]" value="鹿児島県"><label for="46">鹿児島県</label>
                            </li>
                            <li><input type="radio" id="47" name="region[]" value="沖縄県"><label for="47">沖縄県</label>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_02" id="btn_02_return" class="previous_btn">戻る</a>
                    <a href="#sec_04" id="btn_04" class="change_btn">次へ</a>
                </div>
                <input type="hidden" id="region_list" name="region_list">
            </section>
            {{--            <section class="sec_04" id="sec_04">--}}
            {{--                <h1><img style="width: {{ $isMobile ? '40%' : '14vw' }}" src="/images/experience.png" alt=""></h1>--}}
            {{--                <ul>--}}
            {{--                    <li id="exp_a" class="experience">--}}
            {{--                        <div><p>1社</p></div>--}}
            {{--                    </li>--}}
            {{--                    <li id="exp_b" class="experience">--}}
            {{--                        <div><p>2社</p></div>--}}
            {{--                    </li>--}}
            {{--                    <li id="exp_c" class="experience">--}}
            {{--                        <div><p>3社</p></div>--}}
            {{--                    </li>--}}
            {{--                    <li id="exp_d" class="experience">--}}
            {{--                        <div><p>4社</p></div>--}}
            {{--                    </li>--}}
            {{--                    <li id="exp_e" class="experience">--}}
            {{--                        <div><p>5社以上</p></div>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}
            {{--                <input id="experience" type="hidden" name="experience">--}}
            {{--            </section>--}}
            <section class="sec_03 change_area" id="sec_04">
                <ol class="stepBar">
                    <li class="visited"><span>1</span></li>
                    <li class="visited"><span>2</span></li>
                    <li class="visited"><span>3</span></li>
                    <li class="visited"><span>4</span></li>
                </ol>
                <h1>ご連絡先</h1>
                <div class="form_li">
                    <p class="title">姓</p>
                    <p class="required">必須</p>
                    <div class="form_wrap">
                        <div class="form_box"><input type="text" name="lastname" placeholder="ミツカル" autocomplete="off"
                                                     required maxlength="30"></div>
                    </div>
                </div>
                <div class="form_li">
                    <p class="title">名</p>
                    <p class="required">必須</p>
                    <div class="form_wrap">
                        <div class="form_box"><input type="text" name="firstname" placeholder="太郎" autocomplete="off"
                                                     required maxlength="30"></div>
                    </div>
                </div>
                <div class="form_li">
                    <p class="title">電話番号</p>
                    <p class="required">必須</p>
                    <div class="form_wrap">
                        <div class="form_box"><input type="text" name="phone_number"
                                                     placeholder="08012345648(ハイフン無し,半角英数)" autocomplete="off"
                                                     required>
                        </div>
                        <p class="phone_notice">※正しい電話番号を入力してください</p>
                    </div>
                </div>
                <div class="form_li">
                    <p class="title">メールアドレス</p>
                    <p class="required">必須</p>
                    <div class="form_wrap">
                        <div class="form_box">
                            <input type="email" name="mail_address" placeholder="info@mitsukaru.com" autocomplete="off"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="form_li">
                    <p class="title">業界経験年数</p>
                    <p class="required">必須</p>
                    <div class="form_wrap">
                        <div class="select_wrap">
                            <select name="career" required>
                                <option value="0">未経験</option>
                                <option value="1">1年未満</option>
                                <option value="2">1～4年</option>
                                <option value="3">5～7年</option>
                                <option value="4">8年以上</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form_li">
                    <p class="title">年齢</p>
                    <p class="required">必須</p>
                    <div class="form_wrap">
                        <div class="select_wrap">
                            <select name="age">
                                <option value="1">未回答</option>
                                @for($val = 1950; $val <= date("Y"); $val++)
                                    <option value="{{$val}}">{{$val}}年</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form_li last">
                    <p class="title">その他ご要望</p>
                    <p class="any">任意</p>
                    <div class="form_wrap">
                        <div class="form_box textarea_box">
                            <textarea style="white-space: pre-wrap" name="text_form" placeholder="お気軽にご相談ください。"
                                      autocomplete="off"></textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="facebook" value="{{preg_match('/face/', URL::previous())}}">
                <input type="hidden" name="src" value="{{ URL::previous() }}">
                <div class="bottom_btn_wrap">
                    {{--                    <div class="g-recaptcha" data-sitekey="6LcbV10jAAAAABmKN4rOdxApj1sIYgA-jYnpXq54"--}}
                    {{--                         data-callback="myAlert"></div>--}}
                    <input type="submit" id="submit_btn">
                    <label for="submit_btn" class="btn_label">
                        <div class="bottom_btn">
                            <p style="margin-right: 3%; font-weight: 600" id="submit_text">申し込みをする</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="77" height="77" viewBox="0 0 77 77">
                                <g id="グループ_41" data-name="グループ 41" transform="translate(-1217 -451)">
                                    <circle id="楕円形_3" data-name="楕円形 3" cx="38.5" cy="38.5" r="38.5"
                                            transform="translate(1217 451)" fill="#fff"/>
                                    <g id="グループ_38" data-name="グループ 38" transform="translate(1234.608 473.891)">
                                        <path id="パス_17" class="svg_arrow" data-name="パス 17" d="M1228.915,473h38.738"
                                              transform="translate(-1228.915 -457.153)" fill="none" stroke="#FD7F23"
                                              stroke-linecap="round" stroke-width="5"/>
                                        <path id="パス_18" class="svg_arrow" data-name="パス 18"
                                              d="M1240.772,465.9l17.608,15.847-17.608,15.847"
                                              transform="translate(-1216.863 -465.898)" fill="none" stroke="#FD7F23"
                                              stroke-linecap="round" stroke-width="5"/>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </label>

                </div>
                <div class="btn_wrap">
                    <a href="#sec_03" id="btn_03_return" class="previous_btn">戻る</a>
                </div>
                <div class="bottom_logo"><a href="https://kaikeizimusyotennsyoku.com/" target="_blank"
                                            rel="noopener"><img src="/images/logo_footer.png" alt="MITSUKARU"></a></div>
            </section>
            <input type="hidden" name="id" value="{{ $id ?? 0 }}">
        </form>
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
                        <span class="c-text-mini">※本社移転しました（移転日2024/3/27）</span></p>
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
        <div class="return_btn"><img src="/images/icon_arrow_bk.svg" alt=""></div>
    </footer>
    <script>
        document.getElementById("work_form").addEventListener('submit', onSubmit);

        function onSubmit(e) {
            e.preventDefault();
            grecaptcha.ready(function () {
                grecaptcha.execute('6LcxybIjAAAAAHvw6jrayDUzlSOSNsV9Fm8PN4Iz', {action: 'submit'}).then(function (token) {
                    // Add your logic to submit to your backend server here.
                    var recaptchaToken = document.getElementById('recaptchaToken');
                    recaptchaToken.value = token;
                    document.getElementById("work_form").submit();
                });
            });
        }
    </script>
    <script>
        //ページ切替 次へ
        $(function () {
            $('#btn_02').click(function () {
                $('.change_area').removeClass('active');
                $('#sec_02').addClass('active');
                $('#top_btn_wrap, #header_white_wrap').hide();
            });
            $('#btn_03').click(function () {
                $('.change_area').removeClass('active');
                $('#sec_03').addClass('active');
            });
            $('#btn_04').click(function () {
                $('.change_area').removeClass('active');
                $('#sec_04').addClass('active');
            });
        })

        //ページ切替 戻る
        $(function () {
            $('#btn_01_return').click(function () {
                $('.change_area').removeClass('active');
                $('#sec_01').addClass('active');
                $('#top_btn_wrap, #header_white_wrap').hide();
            });
            $('#btn_02_return').click(function () {
                $('.change_area').removeClass('active');
                $('#sec_02').addClass('active');
            });
            $('#btn_03_return').click(function () {
                $('.change_area').removeClass('active');
                $('#sec_03').addClass('active');
            });
        })

        //チェック後次へボタン有効
        $(function () {
            $('#btn_02').addClass('active');
        });
        $(function () {
            $('#sec_02 li').click(function () {
                if ($("#sec_02 li p").hasClass("click_color")) {
                    $('#btn_03').addClass('active');
                } else {
                    $('#btn_03').removeClass('active');
                }
            });
        });
        $(function () {
            $('#sec_03 li').click(function () {
                if ($("#sec_03 li").hasClass("click_color")) {
                    $('#btn_04').addClass('active');
                } else {
                    $('#btn_04').removeClass('active');
                }
            });
        });

        $(function () {
            var a = true;
            $('#work_style_a').children().children().addClass('click_color').addClass('font_white');
            $('#style').val("在職中");

            $(".work_style").on('click', function () {
                a = !a;
                $('#work_style_a').children().children().toggleClass('click_color').toggleClass('font_white');
                $('#work_style_b').children().children().toggleClass('click_color').toggleClass('font_white');
                var val = a ? '在職中' : '離職中'
                $('#style').val(val);
            });

            var exp_num = 0;
            var exp = [
                '1社',
                '2社',
                '3社',
                '4社',
                '5社以上',
            ]

            $('#exp_a').addClass('click_color_li');
            $('#exp_a').children().children().addClass('click_color').addClass('font_white');
            $('#experience').val(exp[exp_num]);

            $(".experience").on('click', function () {
                $('#exp_a, #exp_b, #exp_c, #exp_d, #exp_e').removeClass('click_color_li');
                $('#exp_a, #exp_b, #exp_c, #exp_d, #exp_e').children().children().removeClass('click_color').removeClass('font_white');
                $(this).toggleClass('click_color_li');
                $(this).children().children().toggleClass('click_color').toggleClass('font_white');

                var id = $(this).attr('id');
                if (id === 'exp_a') {
                    exp_num = 0;
                } else if (id === 'exp_b') {
                    exp_num = 1;
                } else if (id === 'exp_c') {
                    exp_num = 2;
                } else if (id === 'exp_d') {
                    exp_num = 3;
                } else if (id === 'exp_e') {
                    exp_num = 4;
                }
                $('#experience').val(exp[exp_num]);
                console.log($('#experience').val());
            });

            var name = false;
            var mail_address = false;
            var phone_number = false;
            // var career = false;

            $(document).on('keyup', "input[name='firstname']", function (e) {
                $("input[name='name']").val() !== '' ? name = true : name = false;
            });

            $("input[name='phone_number']").on("keyup", function () {
                const regex_1 = /^0\d{9}$/;
                const regex_2 = /^(050|070|080|090)\d{8}$/;
                const regex_3 = /^0120\d{6}$/;
                const regex_4 = /^(050|070|080|090)\d{7}$/;
                const number = $(this).val();

                if (regex_1.test(number) == !regex_4.test(number) || regex_2.test(number) || regex_3.test(number)) {
                    $('.phone_notice').hide();
                    phone_number = true;
                } else {
                    $('.phone_notice').show();
                    phone_number = false;
                }


                if (phone_number) $('.phone_notice').hide();
                else $('.phone_notice').show();

            });

            $("input[name='mail_address']").on('keyup', function() {
                const regex = /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;
                const address = $(this).val();
                if(regex.test(address)){
                    mail_address = true;
                }else{
                    mail_address = false;
                }
            });

            $(document).on('keyup', 'input', function (e) {
                if (name && mail_address && phone_number) {
                    $('.btn_label').addClass('active');
                } else {
                    $('.btn_label').removeClass('active');
                }
            });

            $('.btn_label').on('click', function(){
                if($(this).hasClass('active') === true){
                    $(this).removeClass('active');
                    $('#submit_text').text('送信中...');
                }
            })

        });
    </script>
@endsection
