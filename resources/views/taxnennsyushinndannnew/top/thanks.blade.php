@extends('taxnennsyushinndann.common.template')
@section('css')
    <link href="/css/nennsyu/thanks.css" rel="stylesheet">
@endsection

@section('content')
    <style>
        .main_content .gray_wrap .please {
            text-align: center;
        }
        .main_content .gray_wrap .small_text{
            font-weight: normal;
        }

        .main_content .step_wrap{
            padding: 1em 4em 1em 4em;
        }

        .step_wrap .please{
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 0.5em;
        }

        @media screen and (max-width: 700px){

            .main_content .gray_wrap .small_text{
                font-size: 10px;
            }

            .step_wrap .please{
                text-align: center;
                font-weight: bold;
                font-size: 20px;
                margin: 0 0 1em;
            }

            .main_content .step_wrap{
                padding: 1em 0 1.3em;
            }
        }
    </style>

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
        <p class="navy_text thanks_text">ミツカルの年収診断を実施いただき<br class="sp">ありがとうございます！</p>
        <div class="gray_wrap" style="text-align: left">
            <p class="please orange_text">診断結果</p>
            <p class="top_text navy_text">ご入力いただいた<span class="marker_yellow">メールアドレス宛て</span>に<br class="sp">
                診断結果をお送りいたしました。<br><span class="marker_yellow">メールにて診断結果をご確認ください。</span></p>
            <p class="top_text small_text">
                ※メールが届かない場合<br>
                迷惑メールに振り分けられている場合がございます。<br>
                それでも届いていない場合が、入力誤りの可能性がございます。<br>
                再度お試しいただくか、当社担当からのご連絡をお待ちください。<br>
            </p>
            <p class="please orange_text">ミツカルとは？</p>
            <p>税理士業界を変えるべく、<span class="marker_yellow">厳しい審査を通過したホワイトな優良事務所の求人</span>を保有し、業界平均年収が420万といわれるなか、<span class="marker_yellow">優良事務所で最高年収2,500万まで</span>の求人をご用意しています。
            </p><br>
            <p>診断結果をもとに{{ !empty(session('name')) ? session('name').'様に' : '' }}マッチした求人をご紹介させていただくために、<span class="marker_yellow">キャリアアドバイザーよりご連絡させていただく場合がございます。</span>
            </p><br>
            <p>{{ !empty(session('name')) ? session('name').'様の' : '' }}今後のキャリアアップ、働き方のご相談も無料で実施しておりますので、お気軽に受電及びお問い合わせいただけますと幸いです。
            </p>
        </div>
        <div class="speech_bubble">
            <p>事前の準備は不要です！</p>
        </div>
        <div class="step_wrap">
            <p class="please orange_text">求人ご紹介の流れ</p>
            <ul class="step_ul">
                <li>
                    <div class="step_square">
                        <p class="text">STEP</p>
                        <p class="num">01</p>
                    </div>
                    <div class="text_wrap">
                        <p class="step_title navy_text">ヒアリング</p>
                        <p class="step_text">お電話にて、エリア・担当案件の詳細・資格などについてヒアリングさせてください。<br>担当電話番号 090-8506-6780 or 080-4449-0163</p>
                    </div>
                </li>
                <li>
                    <div class="step_square">
                        <p class="text">STEP</p>
                        <p class="num">02</p>
                    </div>
                    <div class="text_wrap">
                        <p class="step_title navy_text">キャリアコンシェルジュとの面談</p>
                        <p class="step_text">無理な事務所の紹介は一切ありません。<br>すぐに転職したい方も、そうでない方も、その状況に合わせて市場価値を高めるための<br>アドバイスを差し上げます。
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
    </footer>
@endsection
