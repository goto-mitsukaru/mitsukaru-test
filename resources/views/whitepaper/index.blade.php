@extends('common.template')
@include('common.header')
@include('common.footer')
@section('content')


    <div class="p-white-fv">
        <img class="p-white-fv__img--bg" src="/images/whitepaper/white_bg.webp" alt="fv背景">
        <img class="p-white-fv__img" src="/images/whitepaper/white_fv.webp" alt="fv-cont">
    </div>
    {{-- <div class="p-anchors">
        <div class="p-note">
            ＼ かんたん10秒登録 ／</div>
        <a class="p-note__link" href="" data-anchor="contact">
            <span class="p-dli-caret-right"></span>
            <span class="ja">全ての無料で読む</span>
        </a>
    </div> --}}
    <div class="p-white-list__box">
        <a class="p-white-list__link" href="/whitepaper/wp01">
            <img class="p-white-list__img" src="/images/whitepaper/pdf1-income.webp" alt="サムネ1">
            <p class="p-white-list__text">保存版 税理士事務所スタッフ・税理士の年収事情を徹底解説</p>
            <span class="p-note__link">
                <span class="p-dli-caret-right"></span>
                <span class="ja">無料で読む</span>
            </span>
        </a>
        <a class="p-white-list__link" href="/whitepaper/wp02">
            <img class="p-white-list__img" src="/images/whitepaper/pdf2-break_through_income.webp" alt="サムネ2">
            <p class="p-white-list__text">税理士業界で年収1000万円を突破する方法とは</p>
             <span class="p-note__link">
                <span class="p-dli-caret-right"></span>
                <span class="ja">無料で読む</span>
            </span>
        </a>
        <a class="p-white-list__link" href="/whitepaper/wp03">
            <img class="p-white-list__img" src="/images/whitepaper/pdf3-black.webp" alt="サムネ3">
            <p class="p-white-list__text">ブラック税理士事務所の見分け方</p>
             <span class="p-note__link">
                <span class="p-dli-caret-right"></span>
                <span class="ja">無料で読む</span>
            </span>
        </a>
        <a class="p-white-list__link" href="/whitepaper/wp04">
            <img class="p-white-list__img" src="/images/whitepaper/pdf4-causes_of_failure.webp" alt="サムネ4">
            <p class="p-white-list__text">【独立開業したい税理士必見】独立開業が失敗する原因と対策について徹底解説！</p>
             <span class="p-note__link">
                <span class="p-dli-caret-right"></span>
                <span class="ja">無料で読む</span>
            </span>
        </a>
        <a class="p-white-list__link" href="/whitepaper/wp05">
            <img class="p-white-list__img" src="/images/whitepaper/pdf5-common.webp" alt="サムネ5">
            <p class="p-white-list__text">【失敗する開業税理士の4つの共通点とは？】軌道に乗せるポイントや失敗した後の転職先も紹介</p>
             <span class="p-note__link">
                <span class="p-dli-caret-right"></span>
                <span class="ja">無料で読む</span>
            </span>
        </a>
        <a class="p-white-list__link" href="/whitepaper/wp06">
            <img class="p-white-list__img" src="/images/whitepaper/pdf6-office_features.webp" alt="サムネ6">
            <p class="p-white-list__text">税理士試験勉強を支援している事務所の特徴</p>
             <span class="p-note__link">
                <span class="p-dli-caret-right"></span>
                <span class="ja">無料で読む</span>
            </span>
        </a>
        <a class="p-white-list__link" href="/whitepaper/wp07">
            <img class="p-white-list__img" src="/images/whitepaper/pdf7-question_in_return.webp" alt="サムネ7">
            <p class="p-white-list__text">【面接対策】税理士事務慮の面接で聞くべき逆質問とは？</p>
             <span class="p-note__link">
                <span class="p-dli-caret-right"></span>
                <span class="ja">無料で読む</span>
            </span>
        </a>
        <a class="p-white-list__link" href="/whitepaper/wp08">
            <img class="p-white-list__img" src="/images/whitepaper/pdf8-inexperienced.webp" alt="サムネ8">
            <p class="p-white-list__text">未経験から税理士事務所に転職する方法は○○！うまくいくポイントとは？</p>
             <span class="p-note__link">
                <span class="p-dli-caret-right"></span>
                <span class="ja">無料で読む</span>
            </span>
        </a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
    <script>
     $(document).ready(function(){
        $('.p-white-list__link').matchHeight();
      });
    </script>
@endsection
