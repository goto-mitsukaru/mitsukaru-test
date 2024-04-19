@extends('common.template')
@include('common.header')
@section('content')
    <link href="/css/form.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    <link href="/css/sp_form.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    <link href="/css/thanks.css" rel="stylesheet">
    <div class="header_bg">
        <div class="header_orange_wrap">
            {{--            <div class="top_img_wrap">--}}
            {{--                <h1><img src="/images/fv_title.png" alt="あなたにマッチした職場がミツカル"></h1>--}}
            {{--                <div class="header_square_wrap">--}}
            {{--                    <div class="header_square">--}}
            {{--                        <ul>--}}
            {{--                            <li><img src="/images/icon_check.svg" alt="">--}}
            {{--                                <p>ワークライフバランスの取れた生活がしたい方</p></li>--}}
            {{--                            <li><img src="/images/icon_check.svg" alt="">--}}
            {{--                                <p>今よりも年収を上げたい方</p></li>--}}
            {{--                            <li><img src="/images/icon_check.svg" alt="">--}}
            {{--                                <p>もっとスキルを高めてキャリアアップしたい方</p>--}}
            {{--                            </li>--}}
            {{--                        </ul>--}}
            {{--                    </div>--}}
            {{--                    <img src="/images/fv_human.png" alt="" class="fv_human">--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--        <div class="header_white_wrap">--}}
            {{--            <p><span class="orange">ミツカル</span>で<span class="orange">最適</span>な<span class="orange">職場</span>を見つけて<br class="sp"><span class="sp_line">人生豊かにしませんか？</span></p>--}}
        </div>
    </div>
    <div class="main_content">
        <h1 style="font-size: 32px;padding: 0.8% 5%">受付完了</h1>
        @if($isMobile)
            <p class="text_01">お問い合わせいただきありがとうございます。</p>
            <p>確認のためお客様へ自動返信メールを<br class="sp">お送りさせていただきました。</p>
            <p>後日担当者よりご連絡させていただきます。</p>
        @else
            <p class="text_01" style="line-height: 2.5em; padding-top: 2%">お問い合わせいただきありがとうございます。</p>
            <p style="line-height: 2.5em">確認のためお客様へ自動返信メールを<br class="sp">お送りさせていただきました。</p>
            <p style="line-height: 2.5em">後日担当者よりご連絡させていただきます。</p>
        @endif
        {{--        <img src="/images/human_ok_2.png" class="img_left">--}}
        @if($isMobile)
            {{-- <img src="/images/thanks_sp.png" class="img_right"> --}}
        @else
            {{-- <img src="/images/thanks_icon.png" class="img_right"> --}}
        @endif
        {{-- <p class="point_text">「中小企業からニッポンを元気にプロジェクト」<br>公式アンバサダー　郷ひろみ</p> --}}
        <a class="top_btn" href="/">TOPに戻る</a>
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
                        <p class="text">〒150-0022<br>東京都渋谷区恵比寿南三丁目1-1<br>いちご恵比寿グリーングラス6階<br><span class="c-mini-text">※本社移転しました（移転日2024/3/27）</span></p>
                    </li>
                    <li>
                        <p class="title">サイト</p>
                        <p class="text"><a href="https://mitsukaru.cc/" target="_blank">https://mitsukaru.cc/</a></p>
                    </li>
                </ul>
            </div>
            <div class="copyright">COPYRIGHT 2022. MITSUKARU ALL RIGHT RESERVED.</div>
        </div>
        {{--        <div class="return_btn"><img src="/images/icon_arrow_bk.svg" alt=""></div>--}}
    </footer>
@endsection
