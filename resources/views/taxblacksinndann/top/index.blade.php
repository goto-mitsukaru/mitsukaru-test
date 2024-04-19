@extends('taxblacksinndann.common.template')
@section('content')
    <header>
        <div class="header_orange_wrap">
            <div class="header_top">
                <a href="/" target="_blank" rel="noopener"><img
                        src="/tennsyoku_images/logo_top.png" alt="MITSUKARU"></a>
                <div class="logo_text">税理士のための転職情報サイト</div>
            </div>
            <div class="top_img_wrap">
                <h1><img src="/images/black_fv.png" alt="あなたにマッチした職場がミツカル"></h1>
                <div class="header_square_wrap">
                    <div class="header_square">
                        <ul>
                            <li><img src="/tennsyoku_images/icon_check.svg" alt="">
                                <p>今の事務所に疑問のある方</p></li>
                            <li><img src="/tennsyoku_images/icon_check.svg" alt="">
                                <p>今の事務所が業界でホワイトかブラックを知りたい方</p></li>
                            <li><img src="/tennsyoku_images/icon_check.svg" alt="">
                                <p>自分の労働環境をよくしたい方</p>
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
            <p>今働いている<span class="orange">事務所</span>が<br class="sp"><span class="orange">ブラック</span>か？どうか<span
                    class="sp_line">診断してみませんか？</span></p>
        </div>
    </header>
    <div class="main_content">
        <div class="top_btn_wrap" id="top_btn_wrap">
            <a href="#sec_1">
                <div class="top_btn">
                    <p class="top_text">簡単1分</p>
                    <p class="bottom_text">悩むなら、まずは無料診断</p>
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
            <li><span>12</span></li>
            <li><span>13</span></li>
        </ol>

        <form action="/mail/send/3" method="post" id="work_form">
            @csrf
            <input type="hidden" name="recaptchaToken" id="recaptchaToken">
            <section class="sec_01 change_area active" id="sec_1" data-page_id="1">
                <h1>月間の実残業時間（みなしも含む）はどのくらいですか？</h1>
                <ul class="only_checked">
                    <li>
                        <input type="radio" id="a1" name="month_overtime[]" value="残業なし">
                        <label for="a1">残業なし</label>
                        <input type="checkbox" name="score[]" value="0">
                    </li>
                    <li>
                        <input type="radio" id="a2" name="month_overtime[]" value="1～10時間未満">
                        <label for="a2">1～10時間未満</label>
                        <input type="checkbox" name="score[]" value="1">
                    </li>
                    <li>
                        <input type="radio" id="a3" name="month_overtime[]" value="10～20時間未満">
                        <label for="a3">10～20時間未満</label>
                        <input type="checkbox" name="score[]" value="2">
                    </li>
                    <li>
                        <input type="radio" id="a4" name="month_overtime[]" value="21～30時間未満">
                        <label for="a4">21～30時間未満</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li>
                        <input type="radio" id="a5" name="month_overtime[]" value="31～40時間未満">
                        <label for="a5">31～40時間未満</label>
                        <input type="checkbox" name="score[]" value="4">
                    </li>
                    <li>
                        <input type="radio" id="a6" name="month_overtime[]" value="41～50時間未満">
                        <label for="a6">41～50時間未満</label>
                        <input type="checkbox" name="score[]" value="5">
                    </li>
                    <li>
                        <input type="radio" id="a7" name="month_overtime[]" value="50時間以上">
                        <label for="a7">50時間以上</label>
                        <input type="checkbox" name="score[]" value="6">
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_2" id="btn_02" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>
            <section class="sec_01 change_area" id="sec_2" data-page_id="2">
                <h1>みなし残業の設定はありますか？</h1>
                <ul class="only_checked">
                    <li>
                        <input type="radio" id="b1" name="set_overtime[]" value="設定なし">
                        <label for="b1">設定なし</label>
                        <input type="checkbox" name="score[]" value="0">
                    </li>
                    <li>
                        <input type="radio" id="b2" name="set_overtime[]" value="1～10時間未満">
                        <label for="b2">1～10時間未満</label>
                        <input type="checkbox" name="score[]" value="1">
                    </li>
                    <li>
                        <input type="radio" id="b3" name="set_overtime[]" value="10～20時間未満">
                        <label for="b3">10～20時間未満</label>
                        <input type="checkbox" name="score[]" value="2">
                    </li>
                    <li>
                        <input type="radio" id="b4" name="set_overtime[]" value="21～30時間未満">
                        <label for="b4">21～30時間未満</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li>
                        <input type="radio" id="b5" name="set_overtime[]" value="31～40時間未満">
                        <label for="b5">31～40時間未満</label>
                        <input type="checkbox" name="score[]" value="4">
                    </li>
                    <li>
                        <input type="radio" id="b6" name="set_overtime[]" value="41～50時間未満">
                        <label for="b6">41～50時間未満</label>
                        <input type="checkbox" name="score[]" value="5">
                    </li>
                    <li>
                        <input type="radio" id="b7" name="set_overtime[]" value="50時間以上">
                        <label for="b7">50時間以上</label>
                        <input type="checkbox" name="score[]" value="6">
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_1" id="btn_01_return" class="previous_btn">戻る</a>
                    <a href="#sec_3" id="btn_03" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>
            <section class="sec_01 change_area" id="sec_3" data-page_id="3">
                <h1>残業時間は正しく給料として支払われていますか？<br>（みなし設定ある場合は、それを超えた残業について）</h1>
                <ul class="only_checked">
                    <li>
                        <input type="radio" id="c1" name="right_overtime[]" value="全額支払われている">
                        <label for="c1">全額支払われている</label>
                        <input type="checkbox" name="score[]" value="0">
                    </li>
                    <li>
                        <input type="radio" id="c2" name="right_overtime[]" value="一部支払われている">
                        <label for="c2">一部支払われている</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li>
                        <input type="radio" id="c3" name="right_overtime[]" value="ほとんど支払われていない">
                        <label for="c3">ほとんど支払われていない</label>
                        <input type="checkbox" name="score[]" value="6">
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_2" id="btn_02_return" class="previous_btn">戻る</a>
                    <a href="#sec_4" id="btn_04" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>
            <section class="sec_01 change_area" id="sec_4" data-page_id="4">
                <h1>勤怠管理について当てはまるものをお選びください</h1>
                <ul class="only_checked">
                    <li>
                        <input type="radio" id="d1" name="attendance[]" value="時間外も全て正しく付けられている">
                        <label for="d1">時間外も全て正しく付けられている</label>
                        <input type="checkbox" name="score[]" value="0">
                    </li>
                    <li>
                        <input type="radio" id="d2" name="attendance[]" value="時間外の一部が付けられていない">
                        <label for="d2">時間外の一部が付けられていない</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li>
                        <input type="radio" id="d3" name="attendance[]" value="時間外は付けられていない">
                        <label for="d3">時間外は付けられていない</label>
                        <input type="checkbox" name="score[]" value="6">
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_3" id="btn_03_return" class="previous_btn">戻る</a>
                    <a href="#sec_5" id="btn_05" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>
            <section class="sec_01 change_area" id="sec_5" data-page_id="5">
                <h1>有給取得について当てはまるものをお選びください</h1>
                <ul class="only_checked">
                    <li>
                        <input type="radio" id="e1" name="paid_vacation[]" value="好きな時に自由に取得できる">
                        <label for="e1">好きな時に自由に取得できる</label>
                        <input type="checkbox" name="score[]" value="0">
                    </li>
                    <li>
                        <input type="radio" id="e2" name="paid_vacation[]" value="理由を伝えて許可を取れば取得できる">
                        <label for="e2">理由を伝えて許可を取れば取得できる</label>
                        <input type="checkbox" name="score[]" value="2">
                    </li>
                    <li>
                        <input type="radio" id="e3" name="paid_vacation[]" value="体調不良や忌引などでしか取得できない">
                        <label for="e3">体調不良や忌引などでしか取得できない</label>
                        <input type="checkbox" name="score[]" value="4">
                    </li>
                    <li>
                        <input type="radio" id="e4" name="paid_vacation[]" value="暗黙のルールで取得できない">
                        <label for="e4">暗黙のルールで取得できない</label>
                        <input type="checkbox" name="score[]" value="6">
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_4" id="btn_04_return" class="previous_btn">戻る</a>
                    <a href="#sec_6" id="btn_06" class="change_btn">次へ</a>
                </div>
                <input id="style_list" type="hidden" name="style_list">
            </section>
            <section class="sec_01 change_area" id="sec_6" data-page_id="6">
                <h1>休憩時間について当てはまるものをお選びください<br>（6時間以上8時間未満勤務の場合45分 8時間以上の場合1時間の休憩）</h1>
                <ul class="only_checked">
                    <li>
                        <input type="radio" id="f1" name="break_time[]" value="決まった時間に規定時間の休憩が取れている">
                        <label for="f1">決まった時間に<br>規定時間の休憩が取れている</label>
                        <input type="checkbox" name="score[]" value="0">
                    </li>
                    <li>
                        <input type="radio" id="f2" name="break_time[]" value="決まった時間ではないが規定時間の休憩が取れている">
                        <label for="f2">決まった時間ではないが<br>規定時間の休憩が取れている</label>
                        <input type="checkbox" name="score[]" value="2">
                    </li>
                    <li>
                        <input type="radio" id="f3" name="break_time[]" value="規定時間の休憩が取れるときと取れないときがある">
                        <label for="f3">規定時間の休憩が取れるときと<br>取れないときがある</label>
                        <input type="checkbox" name="score[]" value="4">
                    </li>
                    <li>
                        <input type="radio" id="f4" name="break_time[]" value="勤怠上は強制的に休憩時間が入っているものの実際は休憩できていない">
                        <label for="f4">勤怠上は強制的に休憩時間が<br>入っているものの実際は休憩できていない</label>
                        <input type="checkbox" name="score[]" value="6">
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_5" id="btn_05_return" class="previous_btn">戻る</a>
                    <a href="#sec_7" id="btn_07" class="change_btn">次へ</a>
                </div>
                <input type="hidden" id="region_list" name="region_list">
            </section>
            <section class="sec_01 change_area" id="sec_7" data-page_id="7">
                <h1>教育や研修について当てはまるものをお選びください</h1>
                <ul class="only_checked">
                    <li>
                        <input type="radio" id="g1" name="training[]" value="勤務時間内でおこなわれており、給料の対象になっている">
                        <label for="g1">勤務時間内でおこなわれており、<br>給料の対象になっている</label>
                        <input type="checkbox" name="score[]" value="0">
                    </li>
                    <li>
                        <input type="radio" id="g2" name="training[]" value="時間外でおこなわれているが、給料の対象になっている">
                        <label for="g2">時間外でおこなわれているが、<br>給料の対象になっている</label>
                        <input type="checkbox" name="score[]" value="1">
                    </li>
                    <li>
                        <input type="radio" id="g3" name="training[]" value="平日時間外で強制でおこなわれ、、給料の対象にならない">
                        <label for="g3">平日時間外で強制でおこなわれ、<br>給料の対象にならない</label>
                        <input type="checkbox" name="score[]" value="4">
                    </li>
                    <li>
                        <input type="radio" id="g4" name="training[]" value="休日に強制でおこなわれ、給料の対象にならない">
                        <label for="g4">休日に強制でおこなわれ、<br>給料の対象にならない</label>
                        <input type="checkbox" name="score[]" value="6">
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_6" id="btn_06_return" class="previous_btn">戻る</a>
                    <a href="#sec_8" id="btn_08" class="change_btn">次へ</a>
                </div>
                <input type="hidden" id="region_list" name="region_list">
            </section>
            <section class="sec_01 change_area" id="sec_8" data-page_id="8">
                <h1>評価制度について当てはまるものをお選びください</h1>
                <ul class="only_checked">
                    <li>
                        <input type="radio" id="h1" name="evaluation[]" value="評価制度があり、評価基準が明確かつ適正な評価がされている">
                        <label for="h1">評価制度があり、評価基準が明確かつ<br>適正な評価がされている</label>
                        <input type="checkbox" name="score[]" value="0">
                    </li>
                    <li>
                        <input type="radio" id="h2" name="evaluation[]" value="評価制度はあるが、基準があいまいで評価が不明瞭なところがある">
                        <label for="h2">評価制度はあるが、基準があいまいで<br>評価が不明瞭なところがある</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li>
                        <input type="radio" id="h3" name="evaluation[]" value="評価制度はあるが、形だけで好き嫌いでほぼ評価が決まっている">
                        <label for="h3">評価制度はあるが、形だけで好き嫌いで<br>ほぼ評価が決まっている</label>
                        <input type="checkbox" name="score[]" value="6">
                    </li>
                    <li>
                        <input type="radio" id="h4" name="evaluation[]" value="評価制度はなく、何をすれば評価されるのかわからない">
                        <label for="h4">評価制度はなく、<br>何をすれば評価されるのかわからない</label>
                        <input type="checkbox" name="score[]" value="6">
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_7" id="btn_07_return" class="previous_btn">戻る</a>
                    <a href="#sec_9" id="btn_09" class="change_btn">次へ</a>
                </div>
                <input type="hidden" id="region_list" name="region_list">
            </section>
            <section class="sec_01 change_area" id="sec_9" data-page_id="9">
                <h1>福利厚生について当てはまるものを<span class="marker_all">すべて</span>お選びください</h1>
                <ul>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="i1" name="employee_benefits[]" value="福利厚生は何もない">
                        <label for="i1">福利厚生は何もない</label>
                        <input type="checkbox" name="score[]" value="0">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="i2" name="employee_benefits[]" value="退職金制度がある">
                        <label for="i2">退職金制度がある</label>
                        <input type="checkbox" name="score[]" value="-1">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="i3" name="employee_benefits[]" value="家賃補助制度がある">
                        <label for="i3">家賃補助制度がある</label>
                        <input type="checkbox" name="score[]" value="-1">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="i4" name="employee_benefits[]" value="資格支援制度がある">
                        <label for="i4">資格支援制度がある</label>
                        <input type="checkbox" name="score[]" value="-1">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="i5" name="employee_benefits[]" value="資格保有者への手当がある">
                        <label for="i5">資格保有者への手当がある</label>
                        <input type="checkbox" name="score[]" value="-1">
                    </li>
                    <li class="only_checkbox">
                        <input type="checkbox" id="i6" name="employee_benefits[]" value="どれもあてはまらない">
                        <label for="i6">どれもあてはまらない</label>
                        <input type="checkbox" name="score[]" value="0">
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_8" id="btn_08_return" class="previous_btn">戻る</a>
                    <a href="#sec_10" id="btn_010" class="change_btn">次へ</a>
                </div>
                <input type="hidden" id="region_list" name="region_list">
            </section>
            <section class="sec_01 change_area" id="sec_10" data-page_id="10">
                <h1>職場の人間関係について当てはまるものを<span class="marker_all">すべて</span>お選びください</h1>
                <ul>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="j1" name="relationships[]" value="代表(所長)に対し、意見を述べられる人がいない">
                        <label for="j1">代表(所長)に対し、<br>意見を述べられる人がいない</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="j2" name="relationships[]" value="信頼できる人が少ない">
                        <label for="j2">信頼できる人が少ない</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="j3" name="relationships[]" value="相談できる人がいない">
                        <label for="j3">相談できる人がいない</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="j4" name="relationships[]" value="ハラスメント(パワハラ・モラハラ・セクハラ)がある">
                        <label for="j4">ハラスメント<br>(パワハラ・モラハラ・セクハラ)がある</label>
                        <input type="checkbox" name="score[]" value="5">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="j5" name="relationships[]" value="不平不満が裏側（陰口）で話されていることが多い">
                        <label for="j5">不平不満が裏側（陰口）で<br>話されていることが多い</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="j6" name="relationships[]" value="飲み会は断れない雰囲気がある">
                        <label for="j6">飲み会は<br>断れない雰囲気がある</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li class="only_checkbox">
                        <input type="checkbox" id="j7" name="relationships[]" value="どれもあてはまらない">
                        <label for="j7">どれもあてはまらない</label>
                        <input type="checkbox" name="score[]" value="0">
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_9" id="btn_09_return" class="previous_btn">戻る</a>
                    <a href="#sec_11" id="btn_011" class="change_btn">次へ</a>
                </div>
                <input type="hidden" id="region_list" name="region_list">
            </section>
            <section class="sec_01 change_area" id="sec_11" data-page_id="11">
                <h1>職場の状況に当てはまるものを<span class="marker_all">すべて</span>お選びください</h1>
                <ul>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="k1" name="workplace_situation[]" value="ワンマン経営">
                        <label for="k1">ワンマン経営</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="k2" name="workplace_situation[]" value="離職率が高い（人の入れ替わりが多い）">
                        <label for="k2">離職率が高い（人の入れ替わりが多い）</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="k3" name="workplace_situation[]" value="承継問題がある（後継ぎが決まっていない）">
                        <label for="k3">承継問題がある（後継ぎが決まっていない）</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="k4" name="workplace_situation[]" value="休日も関係なく仕事の連絡が入る">
                        <label for="k4">休日も関係なく<br>仕事の連絡が入る</label>
                        <input type="checkbox" name="score[]" value="5">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="k5" name="workplace_situation[]" value="掃除や朝礼などが勤務時間外に設定されている">
                        <label for="k5">掃除や朝礼などが<br>勤務時間外に設定されている</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="k6" name="workplace_situation[]" value="資格取得について配慮がない(勉強時間の確保、受験休暇など)">
                        <label for="k6">資格取得について配慮がない<br>(勉強時間の確保、受験休暇など)</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li class="only_checkbox">
                        <input type="checkbox" id="k7" name="workplace_situation[]" value="どれもあてはまらない">
                        <label for="k7">どれもあてはまらない</label>
                        <input type="checkbox" name="score[]" value="0">
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_10" id="btn_010_return" class="previous_btn">戻る</a>
                    <a href="#sec_12" id="btn_012" class="change_btn">次へ</a>
                </div>
                <input type="hidden" id="region_list" name="region_list">
            </section>
            <section class="sec_01 change_area" id="sec_12" data-page_id="12">
                <h1>あなたの状況に当てはまるものを<span class="marker_all">すべて</span>お選びください</h1>
                <ul>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="l1" name="my_situation[]" value="自己投資する時間が取れていない">
                        <label for="l1">自己投資する時間が取れていない</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="l2" name="my_situation[]" value="仕事場と家に往復で日々が過ぎている">
                        <label for="l2">仕事場と家に往復で日々が過ぎている</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="l3" name="my_situation[]" value="日々作業に追われ、成長を感じられない">
                        <label for="l3">日々作業に追われ、成長を感じられない</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="l4" name="my_situation[]" value="仕事内容、勤務時間に対し、給料が適正でないと感じる">
                        <label for="l4">仕事内容、勤務時間に対し、<br>給料が適正でないと感じる</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="l5" name="my_situation[]" value="転職したいが、その時間が取れない">
                        <label for="l5">転職したいが、<br>その時間が取れない</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li class="normal_checkbox">
                        <input type="checkbox" id="l6" name="my_situation[]" value="退職は言い出しづらいと感じる">
                        <label for="l6">退職は<br>言い出しづらいと感じる</label>
                        <input type="checkbox" name="score[]" value="3">
                    </li>
                    <li class="only_checkbox">
                        <input type="checkbox" id="l7" name="my_situation[]" value="どれもあてはまらない">
                        <label for="l7">どれもあてはまらない</label>
                        <input type="checkbox" name="score[]" value="0">
                    </li>
                </ul>
                <div class="btn_wrap">
                    <a href="#sec_11" id="btn_011_return" class="previous_btn">戻る</a>
                    <a href="#sec_13" id="btn_013" class="change_btn">次へ</a>
                </div>
                <input type="hidden" id="region_list" name="region_list">
            </section>
            <section class="sec_03 change_area" id="sec_13" data-page_id="13">
                <p class="form_comment">診断精度向とEメールorSMSにて診断結果を<br class="sp">お送りしますので、正しい情報をご入力お願いします。
                <h1>ご連絡先</h1>
                <div class="form_li">
                    <p class="title">姓</p>
                    <p class="required">必須</p>
                    <div class="form_wrap">
                        <div class="form_box"><input type="text" name="lastname" placeholder="ミツカル"
                                                     autocomplete="off"
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
                </p>
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
                <div class="form_li">
                    <p class="title">勤務地</p>
                    <p class="required">必須</p>
                    <div class="form_wrap">
                        <div class="select_wrap">
                            <select name="region">
                                <option value="1">未回答</option>
                                @foreach($prefectures as $prefecture)
                                    <option value="{{$prefecture->name}}">
                                        {{$prefecture->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form_li last">
                    <p class="title">その他ご要望</p>
                    <p class="any">任意</p>
                    <div class="form_wrap">
                        <div class="form_box textarea_box">
                            <textarea name="text_form" placeholder="お気軽にご相談ください。"
                                      autocomplete="off"></textarea>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="facebook" value="{{preg_match('/face/', URL::previous())}}">
                <input type="hidden" name="src" value="{{ url()->full() }}">
                <div class="bottom_btn_wrap">
                    <input type="submit" id="submit_btn">
                    <label for="submit_btn" class="btn_label">
                        <div class="bottom_btn">
                            <p id="submit_text">診断結果を見る</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="77" height="77" viewBox="0 0 77 77">
                                <g id="グループ_41" data-name="グループ 41" transform="translate(-1217 -451)">
                                    <circle id="楕円形_3" data-name="楕円形 3" cx="38.5" cy="38.5" r="38.5"
                                            transform="translate(1217 451)" fill="#fff"/>
                                    <g id="グループ_38" data-name="グループ 38" transform="translate(1234.608 473.891)">
                                        <path id="パス_17" class="svg_arrow" data-name="パス 17"
                                              d="M1228.915,473h38.738"
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
                @if(session('isRecaptchaError'))
                    <span class="error__message">メッセージの送信に失敗しました。</span>
                @endif
                <div class="btn_wrap">
                    <a href="#sec_12" id="btn_012_return" class="previous_btn">戻る</a>
                </div>
                <div class="bottom_logo"><a href="https://kaikeizimusyotennsyoku.com/" target="_blank"
                                            rel="noopener"><img src="/tennsyoku_images/logo_footer.png" alt="MITSUKARU"></a>
                </div>
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
                        <p class="text">
                            国家資格(税理士・医師・看護師)に特化した転職マッチングプラットフォームを運営。</p>
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
        <div class="return_btn"><img src="/tennsyoku_images/icon_arrow_bk.svg" alt=""></div>
    </footer>
    {!! no_captcha()->script() !!}
    {!! no_captcha()->getApiScript() !!}
    <script>
        //グーグルキャプチャ
        const btn = document.getElementById('submit_btn');
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            grecaptcha.ready(function () {
                const siteKey = {{ Js::from(config('no-captcha.sitekey')) }}
                grecaptcha.execute(siteKey, {action: 'Submit'}).then(function (token) {
                    document.getElementById('g-recaptcha-response').value = token;
                    document.getElementById('work_form').submit();
                })
            })
        }, false);
    </script>
    {{--    @if (session('scrollToAnchor'))--}}
    {{--        <script>--}}
    {{--            document.addEventListener("DOMContentLoaded", function () {--}}
    {{--                // リダイレクト後に処理を実行--}}
    {{--                $(document).ready(function () {--}}
    {{--                    $('.change_area').removeClass('active');--}}
    {{--                    $('#sec_07').addClass('active');--}}
    {{--                });--}}
    {{--            });--}}
    {{--        </script>--}}
    {{--    @endif--}}
    <script>
        //ページ切替 次へ
        $(function () {
            $('#btn_02').click(function () {
                $('.change_area').removeClass('active');
                $('#sec_2').addClass('active');
                $('#top_btn_wrap, #header_white_wrap').hide();

                $(".stepBar li").slice(3, 9).removeClass('visited');
                $(".stepBar li").slice(0, 2).addClass('visited');
            });

            @for($i = 3; $i < 14; $i++)
            $('#btn_0<?= $i ?>').click(function () {
                console.log(true)
                $('.change_area').removeClass('active');
                $('#sec_<?= $i ?>').addClass('active');

                $(".stepBar li").slice(<?= $i - 1 ?>, 11).removeClass('visited');
                $(".stepBar li").slice(0, <?= $i ?>).addClass('visited');
            });
            @endfor
        })

        //ページ切替 戻る
        $(function () {
            $('#btn_01_return').click(function () {
                $('.change_area').removeClass('active');
                $('#sec_1').addClass('active');
                $('#top_btn_wrap, #header_white_wrap').hide();

                $(".stepBar li").slice(1, 13).removeClass('visited');
                $(".stepBar li").slice(0, 1).addClass('visited');
            });

            @for($i = 2; $i < 13; $i++)
            $('#btn_0<?= $i ?>_return').click(function () {
                $('.change_area').removeClass('active');
                $('#sec_<?= $i ?>').addClass('active');

                $(".stepBar li").slice(<?= $i - 1 ?>, 13).removeClass('visited');
                $(".stepBar li").slice(0, <?= $i ?>).addClass('visited');
            });
            @endfor
        })

        //チェック後次へボタン有効
        $(function () {
            for (let i = 1; i <= 13; i++) {
                $(`#sec_${i} li`).click(function () {
                    if ($(`#sec_${i} li`).find('input:first-child').is(':checked')) {
                        $(`#btn_0${i + 1}`).addClass('active');
                    } else {
                        $(`#btn_0${i + 1}`).removeClass('active');
                    }
                });
            }
        });

        //スコアinputにもチェック
        $(function () {
            $(`section li`).click(function () {
                $(this).find('input:checked').each(function () {
                    $(this).siblings('input[name="score[]"]').prop('checked', true);
                });

                $(this).siblings('li').find('input:not(:checked)').each(function () {
                    $(this).siblings('input[name="score[]"]').prop('checked', false);
                });

            });
        });

        //どれもあてはまらないを選択した場合の他選択肢制御
        $(function () {
            $('.normal_checkbox').click(function () {
                const clickedCheckbox = $(this).find('input:first-child');
                const siblingOnlyCheckbox = $(this).siblings('.only_checkbox').find('input:first-child');

                if (siblingOnlyCheckbox.is(':checked')) {
                    clickedCheckbox.prop('checked', false);
                }
            });

            $('.only_checkbox').click(function () {
                const clickedCheckbox = $(this).find('input:first-child');
                const siblingNormalCheckboxes = $(this).siblings('.normal_checkbox').find('input:first-child:checked');

                if (siblingNormalCheckboxes.length > 0) {
                    clickedCheckbox.prop('checked', false);
                }
            });
        });

        //フォーム送信ボタン制御
        $(function () {

            var name = false;
            var mail_address = false;
            var phone_number = false;
            var firstname = false;
            var lastname = false;

            $(document).on('keyup change', "input[name='firstname']", function (e) {
                $("input[name='firstname']").val() !== '' ? firstname = true : firstname = false;

                // 姓、名入力されているかチェック
                if (lastname && firstname) {
                    name = true;
                } else {
                    name = false;
                }
            });

            $(document).on('keyup change', "input[name='lastname']", function (e) {
                $("input[name='lastname']").val() !== '' ? lastname = true : lastname = false;

                // 姓、名入力されているかチェック
                if (lastname && firstname) {
                    name = true;
                } else {
                    name = false;
                }
            });

            $("input[name='mail_address']").on('keyup change', function () {
                const regex = /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;
                const address = $(this).val();
                if (regex.test(address)) {
                    mail_address = true;
                } else {
                    mail_address = false;
                }
            });

            //電話番号バリデーション
            $("input[name='phone_number']").on("keyup change", function () {
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
