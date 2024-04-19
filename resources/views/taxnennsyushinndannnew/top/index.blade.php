@extends('taxnennsyushinndann.common.template')
@section('content')
    <script src="https://www.google.com/recaptcha/api.js?render=6LcxybIjAAAAAHvw6jrayDUzlSOSNsV9Fm8PN4Iz"></script>
    <header>
        <div class="header_orange_wrap">
            <div class="header_top">
                <a href="/" target="_blank" rel="noopener"><img
                        src="/nennsyu_images/logo_top.png" alt="MITSUKARU"></a>
                <div class="logo_text">税理士のための転職情報サイト</div>
            </div>
            <div class="top_img_wrap">
                <h1><img src="/nennsyu_images/fv_title02.png" alt="税理士事務所職員6.7万人のビッグデータから比較！あなたの最適年収がわかる"></h1>
                <div class="header_square_wrap">
                    <div class="header_square">
                        <ul>
                            <li><img src="/nennsyu_images/icon_check.svg" alt="">
                                <p>今の事務所の年収に対して疑問がある方</p></li>
                            <li><img src="/nennsyu_images/icon_check.svg" alt="">
                                <p>自分に適した年収が知りたい方</p></li>
                            <li><img src="/nennsyu_images/icon_check.svg" alt="">
                                <p class="p_03">キャリアアップして年収を上げたい方</p>
                            </li>
                        </ul>
                    </div>
                    <!-- <img src="/nennsyu_images/FV_icon.png" alt="" class="fv_human"> -->
                    <img src="/images/Gou-san_34.webp" alt="" class="fv_human">
                </div>
            </div>
            <p class="point_text">「中小企業からニッポンを元気にプロジェクト」<br>公式アンバサダー　郷ひろみ</p>
        </div>
        <div class="header_white_wrap">
            <p>あなたの<span class="orange">最適年収</span>を診断してみませんか？</p>
        </div>
    </header>
    <div class="main_content">
        <div class="top_btn_wrap">
            <a href="#sec_01">
                <div class="top_btn">
                    <p class="top_text">簡単15秒！</p>
                    <p class="bottom_text">診断スタート！</p>
                </div>
            </a>
            <div class="top_btn_arrow"></div>
        </div>

        <ol class="stepBar">
            <li class="visited"><span>1</span></li>
            <li><span>2</span></li>
            <li><span>3</span></li>
            <li><span>4</span></li>
            <li><span>5</span></li>
            <li><span>6</span></li>
            <li><span>7</span></li>
            <li><span>8</span></li>
            <li><span>9</span></li>
            <li><span>10</span></li>
            <li><span>11</span></li>
        </ol>

        <form action="/mail/send/1" method="post" id="work_form">
            @csrf
            <section class="sec_01 sec_03 change_area active" id="sec_01">
                <h1>生まれ年をお選びください</h1>
                <div class="form_li">
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
                <div class="btn_wrap">
                    <a href="#sec_n_02" id="btn_02" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>

            <input type="hidden" name="recaptchaToken" id="recaptchaToken">
            <section class="sec_02 change_area" id="sec_n_02">
                <h1>現在の勤務地をお選びください</h1>
                <ul class="region only_checked_area">
                    <li>
                        <input type="radio" id="1" name="region[]" value="北海道"><label class="text" for="1">北海道</label>
                    </li>
                    <li><p class="text">東北</p>
                        <ul class="{{ $isMobile ? 'sp_accordion' : '' }}">
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
                    <li><p class="text">九州</p>
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
                        </ul>
                    </li>
                    <li>
                        <input type="radio" id="47" name="region[]" value="沖縄県"><label class="text" for="47">沖縄県</label>
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_01" id="btn_01_return" class="previous_btn">戻る</a>
                    <a href="#sec_n_03" id="btn_03" class="change_btn">次へ</a>
                </div>
                <input type="hidden" id="region_list" name="region_list">
            </section>
            <section class="sec_n_03 change_area" id="sec_n_03">
                <h1>現在の資格をお選びください</h1>
                <ul>
                    <li><input type="checkbox" id="a2" name="license[]" value="税理士"><label for="a2"><p class="text">
                                税理士(登録済み)</p>
                        </label></li>
                    <li><input type="checkbox" id="b2" name="license[]" value="税理士未登録"><label for="b2"><p class="text">
                                税理士(未登録)</p></label></li>
                    <li><input type="checkbox" id="c2" name="license[]" value="公認会計士"><label for="c2"><p class="text">
                                公認会計士</p></label></li>
                    <li><input type="checkbox" id="c2" name="license[]" value="科目合格者"><label for="c2"><p class="text">
                                科目合格</p></label></li>
                    <li><input type="checkbox" id="d2" name="license[]" value="簿記2級"><label for="d2"><p class="text">
                                日商簿記2級</p></label></li>
                    <li><input type="checkbox" id="e2" name="license[]" value="その他"><label for="e2"><p class="text">
                                その他</p></label></li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_n_02" id="btn_02_return" class="previous_btn">戻る</a>
                    <a href="#sec_n_04" id="btn_04" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>
            <section class="sec_n_04 change_area" id="sec_n_04">
                <h1>税理士・会計事務所・役所での経験年数をお選びください</h1>
                <ul class="only_checked">
                    <li><input type="radio" id="a1" name="career" value="0"><label
                            for="a1">未経験</label></li>
                    <li><input type="radio" id="b1" name="career" value="1"><label
                            for="b1">1年未満</label></li>
                    <li><input type="radio" id="c1" name="career" value="2"><label
                            for="c1">1～4年</label></li>
                    <li><input type="radio" id="d1" name="career" value="3"><label
                            for="d1">5～7年</label></li>
                    <li><input type="radio" id="e1" name="career" value="4"><label
                            for="e1">8年以上</label></li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_n_03" id="btn_03_return" class="previous_btn">戻る</a>
                    <a href="#sec_n_05" id="btn_05" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>
            <section class="sec_n_05 change_area" id="sec_n_05">
                <h1>ご担当されている件数（法人・個人合計）をお選びください</h1>
                <ul class="only_checked">
                    <li><input type="radio" id="j" name="charge_number[]" value="0件"><label for="j">0件</label></li>
                    <li><input type="radio" id="a" name="charge_number[]" value="1～5件"><label for="a">1～5件</label></li>
                    <li><input type="radio" id="b" name="charge_number[]" value="6～10件"><label for="b">6～10件</label>
                    </li>
                    <li><input type="radio" id="c" name="charge_number[]" value="11～15件"><label for="c">11～15件</label>
                    </li>
                    <li><input type="radio" id="d" name="charge_number[]" value="16～20件"><label for="d">16～20件</label>
                    </li>
                    <li><input type="radio" id="e" name="charge_number[]" value="21～25件"><label for="e">21～25件</label>
                    </li>
                    <li><input type="radio" id="f" name="charge_number[]" value="26～30件"><label for="f">26～30件</label>
                    </li>
                    <li><input type="radio" id="g" name="charge_number[]" value="31～35件"><label for="g">31～35件</label>
                    </li>
                    <li><input type="radio" id="h" name="charge_number[]" value="36～40件"><label for="h">36～40件</label>
                    </li>
                    <li><input type="radio" id="i" name="charge_number[]" value="41件以上"><label for="i">41件以上</label>
                    </li>
                </ul>

                <div class="btn_wrap">
                    <a href="#sec_n_04" id="btn_04_return" class="previous_btn">戻る</a>
                    <a href="#sec_n_06" id="btn_06" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>
            <section class="sec_n_06 change_area" id="sec_n_06">
                <h1>あなたの年間担当売り上げをお選びください</h1>
                <ul class="only_checked">
                    <li><input type="radio" id="s06-01" name="annual_sales[]" value="1000万円未満"><label
                            for="s06-01">1000万円未満</label></li>
                    <li><input type="radio" id="s06-02" name="annual_sales[]" value="1500万円以上"><label
                            for="s06-02">1500万円以上</label></li>
                    <li><input type="radio" id="s06-03" name="annual_sales[]" value="2000万円以上"><label
                            for="s06-03">2000万円以上</label></li>
                    <li><input type="radio" id="s06-04" name="annual_sales[]" value="2500万円以上"><label
                            for="s06-04">2500万円以上</label></li>
                    <li><input type="radio" id="s06-05" name="annual_sales[]" value="不明"><label
                            for="s06-05">不明</label></li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_n_05" id="btn_05_return" class="previous_btn">戻る</a>
                    <a href="#sec_n_07" id="btn_07" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>
            <section class="sec_n_07 change_area" id="sec_n_07">
                <h1>従業員に対するマネジメント経験をお選びください</h1>
                <ul class="only_checked" style="justify-content: center">
                    <li><input type="radio" id="a4" name="management_experience[]" value="あり"><label for="a4">あり</label>
                    </li>
                    <li><input type="radio" id="b4" name="management_experience[]" value="なし"><label for="b4">なし</label>
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_n_06" id="btn_06_return" class="previous_btn">戻る</a>
                    <a href="#sec_n_08" id="btn_08" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>
            <section class="sec_03 sec_n_08 change_area" id="sec_n_08">
                <h1>+αの付加価値業務（年間件数）をお選びください</h1>
                <div class="form_li">
                    <p class="title">財務コンサル</p>
                    <div class="form_wrap">
                        <div class="select_wrap">
                            <select name="plus_finance_consulting">
                                <option value="0件">0件</option>
                                <option value="1～10件">1～10件</option>
                                <option value="11～20件">11～20件</option>
                                <option value="21～30件">21～30件</option>
                                <option value="31～40件">31～40件</option>
                                <option value="41件～50件">41～50件</option>
                                <option value="51件以上">51件以上</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form_li">
                    <p class="title">相続</p>
                    <div class="form_wrap">
                        <div class="select_wrap">
                            <select name="plus_inheritance">
                                <option value="0件">0件</option>
                                <option value="1～10件">1～10件</option>
                                <option value="11～20件">11～20件</option>
                                <option value="21～30件">21～30件</option>
                                <option value="31～40件">31～40件</option>
                                <option value="41件～50件">41～50件</option>
                                <option value="51件以上">51件以上</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form_li">
                    <p class="title">その他</p>
                    <div class="form_wrap">
                        <div class="select_wrap">
                            <select name="plus_others">
                                <option value="0件">0件</option>
                                <option value="1～10件">1～10件</option>
                                <option value="11～20件">11～20件</option>
                                <option value="21～30件">21～30件</option>
                                <option value="31～40件">31～40件</option>
                                <option value="41件～50件">41～50件</option>
                                <option value="51件以上">51件以上</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="btn_wrap">
                    <a href="#sec_n_07" id="btn_07_return" class="previous_btn">戻る</a>
                    <a href="#sec_n_09" id="btn_09" class="change_btn">次へ</a>
                </div>
            </section>
            <section class="sec_03 sec_n_09 change_area" id="sec_n_09">
                <h1>理想の働き方（職場環境）をお選びください（3つまで）</h1>
                <ul class="only_checked" style="justify-content: center">
                    <li><input type="checkbox" id="s09-01" name="env[]" value="福利厚生充実"><label for="s09-01"><p
                                class="text">
                                福利厚生充実</p></label></li>
                    <li><input type="checkbox" id="s09-02" name="env[]" value="高年収"><label for="s09-02"><p class="text">
                                高年収</p></label></li>
                    <li><input type="checkbox" id="s09-03" name="env[]" value="研修充実"><label for="s09-03"><p
                                class="text">
                                研修充実</p></label></li>
                    <li><input type="checkbox" id="s09-04" name="env[]" value="残業少"><label for="s09-04"><p class="text">
                                残業少</p></label></li>
                    <li><input type="checkbox" id="s09-05" name="env[]" value="産休育休実績"><label for="s09-05"><p
                                class="text">
                                産休育休実績</p></label></li>
                    <li><input type="checkbox" id="s09-06" name="env[]" value="フレックス導入"><label for="s09-06"><p
                                class="text">
                                フレックス導入</p></label></li>
                    <li><input type="checkbox" id="s09-07" name="env[]" value="将来独立"><label for="s09-07"><p
                                class="text">
                                将来独立</p></label></li>
                    <li><input type="checkbox" id="s09-08" name="env[]" value="資格取得支援制度"><label for="s09-08"><p
                                class="text">
                                資格取得支援制度</p></label></li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_n_08" id="btn_08_return" class="previous_btn">戻る</a>
                    <a href="#sec_n_010" id="btn_010" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>
            <section class="sec_03 sec_n_010 change_area" id="sec_n_010">
                <h1>あなたの現在の年収をお選びください</h1>
                <ul class="only_checked">
                    <li><input type="radio" id="a3" name="yearly_income[]" value="400万円未満"><label
                            for="a3">400万円未満</label></li>
                    <li><input type="radio" id="b3" name="yearly_income[]" value="400～500万円未満"><label for="b3">400～500万円未満</label>
                    </li>
                    <li><input type="radio" id="c3" name="yearly_income[]" value="500～600万円未満"><label for="c3">500～600万円未満</label>
                    </li>
                    <li><input type="radio" id="d3" name="yearly_income[]" value="600～700万円未満"><label for="d3">600～700万円未満</label>
                    </li>
                    <li><input type="radio" id="e3" name="yearly_income[]" value="700～800万円未満"><label for="e3">700～800万円未満</label>
                    </li>
                    <li><input type="radio" id="f3" name="yearly_income[]" value="800～900万円未満"><label for="f3">800～900万円未満</label>
                    </li>
                    <li><input type="radio" id="g3" name="yearly_income[]" value="900～1000万円未満"><label for="g3">900～1000万円未満</label>
                    </li>
                    <li><input type="radio" id="h3" name="yearly_income[]" value="1000万円以上"><label
                            for="h3">1000万円以上</label></li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_n_09" id="btn_09_return" class="previous_btn">戻る</a>
                    <a href="#sec_n_011" id="btn_011" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>
            <section class="sec_03 sec_n_011 change_area" id="sec_n_011">
                <h1>ご連絡先</h1>
                <div class="form_li">
                    <p class="title">姓</p>
                    <p class="required">必須</p>
                    <div class="form_wrap">
                        <div class="form_box">
                            <input type="text" name="lastname" placeholder="ミツカル" autocomplete="off"
                                                     required maxlength="30">
                        </div>
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
                                                     placeholder="08012345648(ハイフン無し,半角英数)" autocomplete="off" required>
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
                <input type="hidden" name="facebook" value="{{ preg_match('/face/', URL::previous()) }}">
                <input type="hidden" name="src" value=" {{ url()->full() }}">
                <div class="bottom_btn_wrap">
                    <input type="submit" id="submit_btn">
                    <label for="submit_btn" class="btn_label">
                        <div class="bottom_btn">
                            <p id="submit_text">あなたに最適な年収を確認する</p>
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
                    <a href="#sec_n_010" id="btn_010_return" class="previous_btn">戻る</a>
                </div>
                <div class="bottom_logo"><a href="https://kaikeizimusyotennsyoku.com/" target="_blank"
                                            rel="noopener"><img src="/nennsyu_images/logo_footer.png"
                                                                alt="MITSUKARU"></a></div>
            </section>
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
                        <p class="text">〒141-0031<br>東京都品川区上大崎３丁目２−１ 目黒センタービル 8階</p>
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
        <div class="return_btn"><img src="/nennsyu_images/icon_arrow_bk.svg" alt=""></div>
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
                $('#sec_n_02').addClass('active');
                $('.top_btn_wrap, .header_white_wrap').hide();

                $(".stepBar li").slice(3, 9).removeClass('visited');
                $(".stepBar li").slice(0, 2).addClass('visited');
            });

            @for($i = 3; $i < 12; $i++)
            $('#btn_0{{ $i }}').click(function () {
                console.log(true)
                $('.change_area').removeClass('active');
                $('#sec_n_0{{ $i }}').addClass('active');

                $(".stepBar li").slice({{ $i-1 }}, 9).removeClass('visited');
                $(".stepBar li").slice(0, {{ $i }}).addClass('visited');
            });
            @endfor
        })

        //ページ切替 戻る
        $(function () {
            $('#btn_01_return').click(function () {
                $('.change_area').removeClass('active');
                $('#sec_01').addClass('active');
                $('#top_btn_wrap, #header_white_wrap').hide();

                $(".stepBar li").slice(1, 9).removeClass('visited');
                $(".stepBar li").slice(0, 1).addClass('visited');
            });

            @for($i = 2; $i < 11; $i++)
            $('#btn_0<?= $i ?>_return').click(function () {
                $('.change_area').removeClass('active');
                $('#sec_n_0<?= $i ?>').addClass('active');

                $(".stepBar li").slice(<?= $i - 1 ?>, 11).removeClass('visited');
                $(".stepBar li").slice(0, <?= $i ?>).addClass('visited');
            });
            @endfor
        })

        //チェック後次へボタン有効
        $(function () {
            // 生まれ年
            $('#btn_02').addClass('active');

            // 勤務地
            $('#sec_n_02 input').on('change', function () {
                $('#btn_03').addClass('active');
            });

            // 資格
            $('#sec_n_03 li').click(function () {
                if ($("#sec_n_03 input").is(':checked')) {
                    $('#btn_04').addClass('active');
                } else {
                    $('#btn_04').removeClass('active');
                }
            });

            // 経験年数
            $('#sec_n_04 li').on('change', function () {
                $('#btn_05').addClass('active');
            });

            // 担当件数
            $('#sec_n_05 input').on('change', function () {
                $('#btn_06').addClass('active');
            });

            // 年間売り上げ
            $('#sec_n_06 input').on('change', function () {
                $('#btn_07').addClass('active');
            });

            // マネジメント経験
            $('#sec_n_07 input').on('change', function () {
                $('#btn_08').addClass('active');
            });

            // 付加業務
            $('#btn_09').addClass('active');

            // 保有資格
            $("#sec_n_09 ul li input").on('change',
                function () {
                    var $count = $("#sec_n_09 input[type=checkbox]:checked").length;
                    var $not = $("#sec_n_09 input[type=checkbox]").not(':checked');

                    if ($count < 3) {
                        $not.attr("disabled", false);
                        console.log('3以下')

                    } else {
                        $not.attr("disabled", true);
                        console.log('3以上')
                    }
                    if ($count >= 1) {
                        $('#btn_010').addClass('active');
                        console.log('1以上')

                    } else {
                        $('#btn_010').removeClass('active');
                        console.log('未選択')

                    }
                    console.log($count)
                })

            $('#sec_n_010 input').on('change', function () {
                $('#btn_011').addClass('active');
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
                if (lastname && firstname) {
                    name = true;
                } else {
                    name = false;
                }
            });

            $(document).on('keyup', "input[name='lastname']", function (e) {
                $("input[name='lastname']").val() !== '' ? lastname = true : lastname = false;

                // 姓、名入力されているかチェック
                if (lastname && firstname) {
                    name = true;
                } else {
                    name = false;
                }
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

            $('.btn_label').on('click', function () {
                if ($(this).hasClass('active') === true) {
                    $(this).removeClass('active');
                    $('#submit_text').text('送信中...');
                }
            })

        });
    </script>
@endsection
