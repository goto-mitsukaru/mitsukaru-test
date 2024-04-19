@section('header')
    <header class="site-header">
        <div class="flex-box">
            <div class="header-title">
                <a style="display: inline-block" href="/">
                    <img src="/images/logo.png" alt="logo">
                </a>
            </div>
            <div class="header-subtitle">
                <p>税理士・科目合格者のための求人サイト</p>
            </div>
            @if($device == 'mobile')
                <div class="flex-box">
                </div>
            @endif
            <div class="header-nav">
                <nav>
                    <ul>
                        <li style="display: none"><a href="/question">よくある質問</a></li>
                        <li><a href="/jobsearch">公開求人検索</a></li>
                        <li><a href="/article/list">転職ノウハウ</a></li>
                        <li><a href="/#youtube">動画コンテンツ</a></li>
                    </ul>
                </nav>
            </div>
            {{--            <div class="header-search">--}}
            {{--                <form>--}}
            {{--                    @csrf--}}
            {{--                    <input type="text" placeholder="検索">--}}
            {{--                    <button type="submit">--}}
            {{--                        <img src="/images/search.png" alt="">--}}
            {{--                    </button>--}}
            {{--                </form>--}}
            {{--            </div>--}}
            @if($device == 'pc')
                <div class="header_cta">
                    <a href="/nennsyushinndann" target="_blank">
                        <img class="header_cta__img" src="/images/button_nensyu_new.png" alt="">
                    </a>
                </div>
                {{-- <div class="header_cta">
                    <a href="/tennsyokusinndann" target="_blank">
                        <img src="/images/button_syokuba.png" alt="">
                    </a>
                </div> --}}
                <div class="header_cta">
                    <a href="/blacksinndann" target="_blank">
                        <img class="header_cta__img" src="/images/button_black_new.png" alt="">
                    </a>
                </div>
            @endif
            @if($device == 'mobile')
                <div class="sp_menu_btn">
                    <span class="sp_menu">
                        <span></span>
                    </span>
                </div>
            @endif
        </div>
        @if($device == 'mobile')
            <div class="flex-box header_02">
                <div class="header_cta --sp">
                    <a href="/nennsyushinndann" target="_blank">
                        <img src="/images/button_nensyu_new.png" alt="">
                    </a>
                </div>
                {{-- <div class="header_cta">
                    <a href="/tennsyokusinndann" target="_blank">
                        <img src="/images/button_syokuba.png" alt="">
                    </a>
                </div> --}}
                <div class="header_cta --sp">
                    <a href="/blacksinndann" target="_blank">
                        <img src="/images/button_black_new.png" alt="">
                    </a>
                </div>
            </div>
        @endif
    </header>
@stop
