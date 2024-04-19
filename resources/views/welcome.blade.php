@extends('common.template')
@include('common.header')
@include('common.footer')
@section('content')
    <div class="site">
        <div class="site-content">
            <div class="mv">
                <div class="inner_content">
                    <div class="slide_tab">
                        <ul>
                            <li class="active">
                                <img src="/images/title_pick_up.png">
                            </li>
                        </ul>
                    </div>
                    <div class="slide_image">
                        <div class="slide_wrap hall_of_name active">
                            <ul class="active slick_slide slick_slide_1">
                                @foreach($pickup_article_list as $article)
                                    <li class="img_wrap"><a href="/article/{{$article->slug}}/{{$article->id}}">
                                            <img src="{{$article->thumb_image}}">
                                            <div class="text_area">{{$article->title}}</div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content_wrap new_article">
                <div class="main_inner_wrap">
                    <h2>
                        <img src="/images/title_new_article.png">
                    </h2>
                    <div class="top_article">
                        <ul class="article_wrap first_article">
                            @foreach($top_article_list as $article)
                                <li>
                                    <a href="/article/{{$article->slug}}/{{$article->id}}">
                                        <div class="img_wrap"><img src="{{$article->thumb_image}}"></div>
                                        <div class="bottom_wrap">
                                            <div class="tag_wrap">
                                                <span>{{$article->category->name}}</span>
                                            </div>
                                            <div class="text_wrap">
                                                {{$article->title}}
                                                @if($device == 'mobile')
                                                    <div class="sp_date_wrap">
                                                        <span><img src="">{{ date('Y.m.d',strtotime($article->created_at)) }}</span>/
                                                        <span><img src="">{{ date('Y.m.d',strtotime($article->updated_at)) }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="date_wrap">
                                            <span><img src="">{{ date('Y.m.d',strtotime($article->created_at)) }}</span>/
                                            <span><img src="">{{ date('Y.m.d',strtotime($article->updated_at)) }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <ul class="article_wrap">
                        @foreach($other_article_list as $article)
                            <li>
                                <a href="/article/{{$article->slug}}/{{$article->id}}">
                                    <div class="img_wrap"><img src="{{$article->thumb_image}}"></div>
                                    <div class="bottom_wrap">
                                        <div class="tag_wrap">
                                            <span>{{$article->category->name}}</span>
                                        </div>
                                        <div class="text_wrap">
                                            {{$article->title}}
                                        </div>
                                    </div>
                                    <div class="date_wrap">
                                        <span><img src="">{{ date('Y.m.d',strtotime($article->created_at)) }}</span>/
                                        <span><img src="">{{ date('Y.m.d',strtotime($article->updated_at)) }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="more_btn">
                        <a href="/article/list">もっと見る<img src="../images/bg_cv_arrow.svg"></a>
                    </div>
                </div>
            </div>

            <div class="content_wrap youtube_links">
                <div class="main_inner_wrap">
                    <h2>
                        <img src="/images/title_youtube.png">
                    </h2>
                    <div class="youtube_link_wrap">
                        <h3><img src="/images/icon_tv.png">就職/転職につながる<span>学習動画</span></h3>
                        <ul class="youtube_wrap">
                            @foreach($movie_list as $movie)
                                <li>
                                    <iframe class="youtube" width="100%" height="" data-src="{{ $movie->src }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <p>{{ $movie->title }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="content_wrap general_editor">
                <div class="main_inner_wrap">
                    <h2>
                        <img src="/images/title_general_editor.png">
                    </h2>
                    <ul class="editor_wrap">
                        <li>
                            @if($device == 'mobile')
                                <div class="img_wrap">
                                    <img src="/images/ceo.png">
                                </div>
                            @endif
                            <div class="profile">
                                <p><img src="/images/icon_youtube.png">城之内 楊（じょうのうち　よう）</p>
                                <div class="text_wrap">
                                    株式会社ミツカル　代表取締役社長<br>
                                    20代では士業向けのコンサルティング会社（株式会社アックスコンサルティング）で<br>
                                    8年ほど最年少役員（営業統括）として勤務する一方、不動産やスモール事業にも個人投資を行う。<br>
                                    さらにはスタートアップから上場企業まで外部顧問や役員としても活躍する。<br>
                                    <br>
                                    税理士業界に最も詳しい男として、累計3,000以上の税理士事務所代表と面談。<br>
                                    ミツカルでは年間2,400名以上の税理士の転職者面談から得られた情報を発信。
                                </div>
                                <ul class="link_list">
                                    <li class="twitter">
                                        <a href="https://twitter.com/jonouti1990">Twitter</a>
                                    </li>
                                </ul>
                                <div class="more_info">
                                    <div class="img_wrap">
                                        <img src="/images/header_youtube.png">
                                    </div>
                                    <div class="img_wrap">
                                        <a href="/">
                                            <img src="/images/youtube_link.png">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if($device == 'pc')
                                <div class="img_wrap">
                                    <img src="/images/ceo.png">
                                </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @if($device == "mobile")
        <script>
            $(function () {
                $('.slick_slide_1').slick({
                    dots: true,
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                });
            });
            $(function () {
                $('.slick_slide_2').slick({
                    dots: true,
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                });
            });
        </script>
    @else
        <script>
            $(function () {
                $('.slick_slide_1').slick({
                    dots: true,
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1
                });
            });
            $(function () {
                $('.slick_slide_2').slick({
                    dots: true,
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1
                });
            });
        </script>
    @endif
@endsection