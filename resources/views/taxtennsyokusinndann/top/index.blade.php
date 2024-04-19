@extends('taxtennsyokusinndann.common.template')
@section('content')
    <script src="https://www.google.com/recaptcha/api.js?render=6LeQzyElAAAAAJoGldoEHuloUlJn3edb6v94xhrV"></script>
    <header>
        <div class="header_orange_wrap">
            <div class="header_top">
                <a href="/" target="_blank" rel="noopener"><img
                            src="/tennsyoku_images/logo_top.png" alt="MITSUKARU"></a>
                <div class="logo_text">税理士のための転職情報サイト</div>
            </div>
            <div class="top_img_wrap">
                <h1><img src="/tennsyoku_images/fv_title.png" alt="あなたにマッチした職場がミツカル"></h1>
                <div class="header_square_wrap">
                    <div class="header_square">
                        <ul>
                            <li><img src="/tennsyoku_images/icon_check.svg" alt="">
                                <p>ワークライフバランスの取れた生活がしたい方</p></li>
                            <li><img src="/tennsyoku_images/icon_check.svg" alt="">
                                <p>今よりも年収を上げたい方</p></li>
                            <li><img src="/tennsyoku_images/icon_check.svg" alt="">
                                <p>もっとスキルを高めてキャリアアップしたい方</p>
                            </li>
                        </ul>
                    </div>
                    {{-- <img src="/tennsyoku_images/FV_icon.png" alt="" class="fv_human"> --}}
                    <img src="/images/Gou-san_34.webp" alt="" class="fv_human">
                </div>
            </div>
            <p class="point_text">「中小企業からニッポンを元気にプロジェクト」<br>公式アンバサダー　郷ひろみ</p>
        </div>
        <div class="header_white_wrap" id="header_white_wrap">
            <p><span class="orange">ミツカル</span>で<span class="orange">最適</span>な<span class="orange">職場</span>を見つけて<br
                        class="sp"><span class="sp_line">働き方と人生に選択肢を増やしませんか？</span></p>
        </div>
    </header>
    <div class="main_content">
        <div class="top_btn_wrap" id="top_btn_wrap">
            <a href="#sec_01">
                <div class="top_btn">
                    <p class="top_text">簡単15秒</p>
                    <p class="bottom_text">悩むなら、まずは無料診断</p>
                </div>
            </a>
            <div class="top_btn_arrow"></div>
        </div>
        <form action="/mail/send/2" method="post" id="work_form">
            @csrf
            <input type="hidden" name="recaptchaToken" id="recaptchaToken">
            <section class="sec_01 change_area active" id="sec_01" data-page_id="1">
                <ol class="stepBar">
                    <li class="visited"><span>1</span></li>
                    <li><span>2</span></li>
                    <li><span>3</span></li>
                    <li><span>4</span></li>
                    <li><span>5</span></li>
                </ol>
                <h1>診断の目的を教えてください。</h1>
                <ul class="only_checked" style="justify-content: center">
                    <li><input type="radio" id="1-1" name="reason" value="自分の市場価値を測りたい"><label for="1-1">自分の市場価値を測りたい</label></li>
                    <li><input type="radio" id="1-2" name="reason" value="診断結果を利用して、転職活動したい"><label for="1-2">診断結果を利用して、転職活動したい</label></li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_02" id="btn_02" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>
            <section class="sec_02 change_area" id="sec_02" data-page_id="2">
                <ol class="stepBar">
                    <li class="visited"><span>1</span></li>
                    <li class="visited"><span>2</span></li>
                    <li><span>3</span></li>
                    <li><span>4</span></li>
                    <li><span>5</span></li>
                </ol>
                <h1>あなたの理想の働き方は</h1>
                <ul>
                    <li><input type="checkbox" id="a" name="work_style[]" value="相続もやりたい" class="tag_checkbox"><label for="a"><p class="text">相続もやりたい</p>
                        </label></li>
                    <li><input type="checkbox" id="b" name="work_style[]" value="財務コンサルをやりたい" class="tag_checkbox"><label for="b"><p class="text">財務コンサルをやりたい</p></label></li>
                    <li><input type="checkbox" id="c" name="work_style[]" value="年収アップしたい" class="tag_checkbox"><label for="c"><p class="text">年収アップしたい</p>
                        </label></li>
                    <li><input type="checkbox" id="d" name="work_style[]" value="人間関係を良くしたい" class="tag_checkbox"><label for="d"><p class="text">人間関係を良くしたい</p></label></li>
                    <li><input type="checkbox" id="e" name="work_style[]" value="ワークライフバランスを整えたい" class="tag_checkbox"><label for="e"><p class="text">ワークライフバランスを整えたい</p></label></li>
                    <li><input type="checkbox" id="f" name="work_style[]" value="受験に向かって勉強していきたい" class="tag_checkbox"><label for="f"><p class="text">受験に向かって勉強していきたい</p></label></li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_01" id="btn_01_return" class="previous_btn">戻る</a>
                    <a href="#sec_03" id="btn_03" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>
            <section class="sec_03 change_area" id="sec_03" data-page_id="3">
                <ol class="stepBar">
                    <li class="visited"><span>1</span></li>
                    <li class="visited"><span>2</span></li>
                    <li class="visited"><span>3</span></li>
                    <li><span>4</span></li>
                    <li><span>5</span></li>
                </ol>
                <h1>保有資格</h1>
                <ul>
                    <li><input type="checkbox" id="g" name="license[]" value="税理士"><label for="g"><p class="text">税理士</p>
                        </label></li>
                    <li><input type="checkbox" id="h" name="license[]" value="税理士未登録"><label for="h"><p class="text">税理士未登録</p></label></li>
                    <li><input type="checkbox" id="i" name="license[]" value="科目合格者"><label for="i"><p class="text">科目合格者</p>
                        </label></li>
                    <li><input type="checkbox" id="j" name="license[]" value="簿記2級"><label for="j"><p class="text">簿記2級</p></label></li>
                    <li><input type="checkbox" id="k" name="license[]" value="その他"><label for="k"><p class="text">その他</p></label></li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_02" id="btn_02_return" class="previous_btn">戻る</a>
                    <a href="#sec_04" id="btn_04" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>
            <section class="sec_04 change_area" id="sec_04" data-page_id="4">
                <ol class="stepBar">
                    <li class="visited"><span>1</span></li>
                    <li class="visited"><span>2</span></li>
                    <li class="visited"><span>3</span></li>
                    <li class="visited"><span>4</span></li>
                    <li><span>5</span></li>
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
                            <li><input type="radio" id="8" name="region[]" value="茨城県"><label for="8">茨城県</label></li>
                            <li><input type="radio" id="9" name="region[]" value="栃木県"><label for="9">栃木県</label></li>
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
                    <a href="#sec_03" id="btn_03_return" class="previous_btn">戻る</a>
                    <a href="#sec_05" id="btn_05" class="change_btn">次へ</a>
                </div>
                <input type="hidden" id="region_list" name="region_list">
            </section>
            <section class="sec_03 sec_05 change_area" id="sec_05" data-page_id="5">
                <ol class="stepBar">
                    <li class="visited"><span>1</span></li>
                    <li class="visited"><span>2</span></li>
                    <li class="visited"><span>3</span></li>
                    <li class="visited"><span>4</span></li>
                    <li class="visited"><span>5</span></li>
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
                        <div class="form_box"><input type="text" name="phone_number" placeholder="08012345648(ハイフン無し,半角英数)" autocomplete="off" required>
                        </div>
                        <p class="phone_notice">※正しい電話番号を入力してください</p>
                    </div>
                </div>
                <div class="form_li">
                    <p class="title">メールアドレス</p>
                    <p class="required">必須</p>
                    <div class="form_wrap">
                        <div class="form_box">
                            <input type="email" name="mail_address" placeholder="info@mitsukaru.com" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="form_li">
                    <p class="title">業界経験年数</p>
                    <p class="required">必須</p>
                    <div class="form_wrap">
                        <div class="select_wrap">
                            <select name="career">
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
                    <p class="title">生まれ年</p>
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
                            <textarea name="text_form" placeholder="お気軽にご相談ください。" autocomplete="off"></textarea>
                        </div>
                    </div>
                </div>
                <p class="form_comment">診断結果をCメール・Eメールへお送りするため、<br class="sp">正しい番号とメールアドレスのご記入をお願いします</p>
                <input type="hidden" name="facebook" value="{{preg_match('/face/', URL::previous())}}">
                <input type="hidden" name="src" value="{{ url()->full() }}">
                <div class="bottom_btn_wrap">
                    <input type="submit" id="submit_btn">
                    <label for="submit_btn" class="btn_label">
                        <div class="bottom_btn">
                            <p id="submit_text">あなたに最適な職場を確認する</p>
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
                    <a href="#sec_04" id="btn_04_return" class="previous_btn">戻る</a>
                </div>
                <div class="bottom_logo"><a href="https://kaikeizimusyotennsyoku.com/" target="_blank"
                                            rel="noopener"><img src="/tennsyoku_images/logo_footer.png" alt="MITSUKARU"></a></div>
            </section>
            {!! no_captcha()->input() !!}
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
                        <p class="text"><a href="https://mitsukaru.cc/" target="_blank">https://mitsukaru.cc/</a></p>
                    </li>
                </ul>
            </div>
            <div class="copyright">COPYRIGHT 2022. MITSUKARU ALL RIGHT RESERVED.</div>
        </div>
        <div class="return_btn"><img src="/tennsyoku_images/icon_arrow_bk.svg" alt=""></div>
        {!! no_captcha()->script() !!}
        {!! no_captcha()->getApiScript() !!}
        <script>
            const btn = document.getElementById('submit_button');
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                grecaptcha.ready(function () {
                    const siteKey = {{ Js::from(config('no-captcha.sitekey')) }}
                    grecaptcha.execute(siteKey,  {action: 'Submit'}).then(function (token) {
                        document.getElementById('g-recaptcha-response').value = token;
                        document.getElementById('work_form').submit();
                    })
                })
            }, false);
        </script>
    </footer>
    <script>
        // document.getElementById("work_form").addEventListener('submit', onSubmit);
        //
        // function onSubmit(e)
        // {
        //     e.preventDefault();
        //     grecaptcha.ready(function()
        //     {
        //         grecaptcha.execute('6LeQzyElAAAAAJoGldoEHuloUlJn3edb6v94xhrV', {action: 'submit'}).then(function(token)
        //         {
        //             // Add your logic to submit to your backend server here.
        //             var recaptchaToken = document.getElementById('recaptchaToken');
        //             recaptchaToken.value = token;
        //             document.getElementById("work_form").submit();
        //         });
        //     });
        // }
    </script>
    <script>
        //ページ切替 次へ
        $(function () {
            $('#btn_02').click(function(){
                $('.change_area').removeClass('active');
                $('#sec_02').addClass('active');
                $('#top_btn_wrap, #header_white_wrap').hide();
            });
            $('#btn_03').click(function(){
                $('.change_area').removeClass('active');
                $('#sec_03').addClass('active');
            });
            $('#btn_04').click(function(){
                $('.change_area').removeClass('active');
                $('#sec_04').addClass('active');
            });
            $('#btn_05').click(function(){
                $('.change_area').removeClass('active');
                $('#sec_05').addClass('active');
            });
        })

        //ページ切替 戻る
        $(function () {
            $('#btn_01_return').click(function(){
                $('.change_area').removeClass('active');
                $('#sec_01').addClass('active');
                $('#top_btn_wrap, #header_white_wrap').hide();
            });
            $('#btn_02_return').click(function(){
                $('.change_area').removeClass('active');
                $('#sec_02').addClass('active');
            });
            $('#btn_03_return').click(function(){
                $('.change_area').removeClass('active');
                $('#sec_03').addClass('active');
            });
            $('#btn_04_return').click(function(){
                $('.change_area').removeClass('active');
                $('#sec_04').addClass('active');
            });
        })

        //チェック後次へボタン有効
        $(function() {
            $('#sec_01 li').click(function() {
                if ($("#sec_01 input").is(':checked')) {
                    $('#btn_02').addClass('active');
                } else {
                    $('#btn_02').removeClass('active');
                }
            });

            $('#sec_02 li').click(function() {
                if ($("#sec_02 li p").hasClass("click_color")) {
                    $('#btn_03').addClass('active');
                } else {
                    $('#btn_03').removeClass('active');
                }
            });

            $('#sec_03 li').click(function() {
                if ($("#sec_03 li p").hasClass("click_color")) {
                    $('#btn_04').addClass('active');
                } else {
                    $('#btn_04').removeClass('active');
                }
            });

            $('#sec_04 li').on('change', function() {
                $('#btn_05').addClass('active');
            });
        });

        $(function () {

            var name = false;
            var mail_address = false;
            var phone_number = false;
            var firstname = false;
            var lastname = false;

            $(document).on('keyup', "input[name='firstname']", function (e) {
                $("input[name='firstname']").val() !== '' ? firstname = true : firstname = false;

                // 姓、名入力されているかチェック
                if(lastname && firstname){
                    name = true;
                }else{
                    name = false;
                }
            });

            $(document).on('keyup', "input[name='lastname']", function (e) {
                $("input[name='lastname']").val() !== '' ? lastname = true : lastname = false;

                // 姓、名入力されているかチェック
                if(lastname && firstname){
                    name = true;
                }else{
                    name = false;
                }
            });

            $(document).on('keyup', "input[name='career']", function(e) {
                $("input[name='career']").val() !== '' ? career = true : career = false;
            });
            $("input[name='phone_number']").on("keyup",function () {
                const regex_1 = /^0\d{9}$/;
                const regex_2 = /^(050|070|080|090)\d{8}$/;
                const regex_3 = /^0120\d{6}$/;
                const regex_4 = /^(050|070|080|090)\d{7}$/;
                const number = $(this).val();

                if ( regex_1.test(number) == !regex_4.test(number)|| regex_2.test(number) || regex_3.test(number) ) {
                    $('.phone_notice').hide();
                    phone_number = true;
                }
                else {
                    $('.phone_notice').show();
                    phone_number = false;

                }

                if(phone_number) $('.phone_notice').hide();
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

            $(document).on('keyup', 'input', function(e) {
                if(name && mail_address && phone_number){
                    $('.btn_label').addClass('active');
                }else{
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
