@extends('taxtennsyokusinndann.common.template')
@section('css')
    <link href="/css/tennsyoku/thanks.css" rel="stylesheet">
@endsection

@section('content')
    <header>
        <div class="header_orange_wrap">
            <div class="header_top">
                <a href="https://kaikeizimusyotennsyoku.com/" target="_blank" rel="noopener"><img
                        src="/images/logo_top.png" alt="MITSUKARU"></a>
                <div class="logo_text">税理士のための転職情報サイト</div>
            </div>
        </div>
        @if($isMobile)
            <img src="/images/LOGINBACK.jpg" class="sp_img">
        @endif
    </header>
    <div class="main_content">
        <img src="/images/thank_you.png" alt="ThankYou" class="thank_you">
        <p class="navy_text thanks_text">ミツカルへの申込み<br class="sp">ありがとうございます！</p>
        <div class="gray_wrap">
            <p class="please orange_text">お願い</p>
            <p class="top_text navy_text">あなたの市場価値を高めるために<br><span class="marker_yellow">30秒だけ</span>お時間ください！</p>
            <div class="speech_bubble">
                <p>事前の準備は不要です！</p>
            </div>
            <p class="number_title navy_text">①お電話にてヒアリングさせて下さい。</p>
            <p>面談時に詳細な情報をお伝えするために、お電話にて、あなたの状況をヒアリングさせてください。<br><span class="orange_text">1時間以内</span>に下記の電話番号からお電話いたします。
            </p>
            <p class="tel_wrap">担当電話番号 090-8506-6780 or 080-4449-0163</p>
            <p class="number_title navy_text">②zoom面談の日程を調整して下さい。</p>
            <p>あなたに<span class="orange_text">適切な事務所</span>をお伝えするための、面談日程の調整をお願いします。<br>無理な事務所紹介などはありません。<br>地域専門のキャリアコンシェルジュが対応いたします。
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
                        <p class="step_text">面談にて、あなたに適切な事務所をお伝えします。<br>無理な事務所の紹介は一切ありません。<br>すぐに転職したい方も、そうでない方も、その状況に合わせて市場価値を高めるための<br>アドバイスを差し上げます。
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
        {{-- <div class="img_wrap">
            <img src="/images/thanks_icon.png" class="img_right">
            <div class="text_wrap">
                <p class="point_text">「中小企業からニッポンを元気にプロジェクト」<br>公式アンバサダー　郷ひろみ</p>
            </div>
        </div> --}}
        <a href="/" class="bottom_logo">
            <img src="/images/logo_top.png" alt="MITSUKARU">
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
                        <p class="text">〒150-0022<br>
                            東京都渋谷区恵比寿南三丁目1-1<br>
                        いちご恵比寿グリーングラス6階<br>
                    <soan class="c-text-mini">※本社移転しました（移転日2024/3/27）</soan></p>
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
@endsection
