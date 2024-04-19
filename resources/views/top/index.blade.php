@extends('common.template')
@include('common.header')
@include('common.footer')
@section('content')

    <div class="site">
{{--        12/1過ぎたら消す--}}
        @if(strtotime('now') < strtotime('2023-12-01'))
            <a class="floating_banner" href="https://mitsukaru-kaikeitensyoku-lp.jp/seminar/" target="_blank">
                <img src="{{$device == "mobile" ? "images/banner_sp.png" : "images/banner.png"}}" alt="">
            </a>
        @endif
{{--        ここまで--}}

        <div class="site-content">
            <div class="mv02">
                <div class="flex">
                    <div class="flex_left">
                        <h2>税理士・科目合格者<span>のための</span>求人サイト</h2>
                        <h1>MITSUKARU</h1>
                        <ul class="topic_list">
                            <li>・ 審査通過の<span>全国ホワイト税理士事務所</span>のみ掲載</li>
                            <li>・ <span>業界大手</span>、<span>地域最大手</span>多数</li>
                        </ul>
                        <div class="btn_wrap">
                            <a href="/recruit" class="btn01_wrap"><p>無料転職サービスに申し込む</p></a>
                            <a href="/jobsearch" class="btn02_wrap"><p>求人を探す</p></a>
                        </div>
                    </div>
                    <div class="flex_right">
                        <img src="/images/images/Gou-san_34.webp" alt="写真：郷ひろみ">
                        <p>「中小企業からニッポンを元気にプロジェクト」<br>公式アンバサダー　郷ひろみ</p>
                    </div>
                </div>
            </div>
            <form action="/joblist" method="get">
                <div class="job_search_wrap">
                    <p class="title">簡単求人検索</p>

                    <div class="search01 search">
                        <select name="area[]">
                            <option value="999">エリア</option>
                            @foreach($area_list as $area)
                                @if($loop->index == 0)
                                    @continue
                                @else
                                    <option value="{{$loop->index}}">{{ $area }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="search02 search">
                        <select name="income[]">
                            <option value="999">年収</option>
                            @foreach($income_list as $item)
                                <option value="{{$loop->index + 1}}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search03 search">
                        <select name="feature[]">
                            <option value="999">特徴</option>
                            @foreach($feature_list as $item)
                                <option value="{{$loop->index + 1}}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{--                    <div class="search04 search">--}}
                    {{--                        <select name="occupation[]">--}}
                    {{--                            <option value="999">ポジション</option>--}}
                    {{--                            @foreach($occupation_list as $item)--}}
                    {{--                                <option value="{{$loop->index + 1}}">{{ $item->name }}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}

                    <button type="submit" class="search_btn_wrap">
                        <p>検索する</p>
                    </button>
                </div>
            </form>
            {{-- オンライン事務所見学バナー --}}
            <a class="p-top-main__link" href="https://kaikeizimusyotennsyoku.com/onlinetour">
                <img class="p-top-main__img" src="/images/banner/online-banner__tour.webp" alt="バナー">
            </a>
            {{-- //オンライン事務所見学バナー --}}
            @if(!$recommendation_recruit_list->isEmpty())
                <div class="mv">
                    <div class="inner_content">
                        <div class="slide_tab">
                            <div class="title_wrap">
                                <p>おすすめ求人</p>
                                <h2>PICK UP</h2>
                            </div>
                        </div>
                        <div class="slide_image">
                            <div class="slide_wrap hall_of_name active">
                                <ul class="active slick_slide slick_slide_1">
                                    @foreach($recommendation_recruit_list as $recruit)
                                        <li>
                                            <a href="/jobdetail/{{ $recruit->id }}" target="_blank">
                                                <div class="border_wrap">
                                                </div>
                                                @if(strtotime(date('Y-m-d')) < strtotime($recruit->updated_at.'30day'))
                                                    <div class="new_wrap">
                                                        <div class="new_text">NEW</div>
                                                    </div>
                                                @endif
                                                <div class="container">
                                                    <div class="title_wrap">
                                                        <h2>{{ Str::limit($recruit->name, 50, '...') }}</h2>
                                                    </div>
                                                    <div class="company_wrap">
                                                        <h2>{{ $company_list->find($recruit->company_id) ? Str::limit($company_list->find($recruit->company_id)->name, 30, '...') : '企業名非公開' }}</h2>
                                                    </div>
                                                    <div class="text_wrap">
                                                        <div class="category_wrap">
                                                            <div class="area_wrap">
                                                                <div class="title">勤務地</div>
                                                                <p class="area_text">{{ $recruit->area_id ? $area_list[$recruit->area_id] : '-' }}</p>
                                                            </div>
                                                            <div class="income_wrap">
                                                                <div class="title">年収</div>
                                                                <p class="income_text">{{ $recruit->income }}</p>
                                                            </div>
                                                            <div class="feature_wrap">
                                                                <div class="title">特徴</div>
                                                                <div class="feature_text limited_text">
                                                                    @if($recruit->features()->get()->count())
                                                                        @foreach($recruit->features()->get() as $feature)
                                                                            {{ $feature->name }}
                                                                            @if ($loop->last)
                                                                            @else
                                                                                /
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <p>-</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--                                                    <div class="content">--}}
                                                        {{--                                                        <div class="title">仕事内容</div>--}}
                                                        {{--                                                        <div class="limited_text"--}}
                                                        {{--                                                             style="line-height: 1.5; font-size: 12px; padding: 8px 0;">--}}
                                                        {{--                                                            @if(!empty($recruit->job_description))--}}
                                                        {{--                                                                <span--}}
                                                        {{--                                                                    class="title_bold">【仕事概要】</span>{{$recruit->job_description}}--}}
                                                        {{--                                                            @endif--}}
                                                        {{--                                                            @if(!empty($recruit->specific_content))--}}
                                                        {{--                                                                <span--}}
                                                        {{--                                                                    class="title_bold">【具体的な業務内容】</span>{{ $recruit->specific_content }}--}}
                                                        {{--                                                            @endif--}}
                                                        {{--                                                            @if(!empty($recruit->work_environment))--}}
                                                        {{--                                                                <span--}}
                                                        {{--                                                                    class="title_bold">【働く環境】</span>{{ $recruit->work_environment }}--}}
                                                        {{--                                                            @endif--}}
                                                        {{--                                                            @if(!empty($recruit->position_worthwhile))--}}
                                                        {{--                                                                <span--}}
                                                        {{--                                                                    class="title_bold">【ポジションの魅力・やりがい】</span>{{ $recruit->position_worthwhile }}--}}
                                                        {{--                                                            @endif--}}
                                                        {{--                                                            @if(!empty($recruit->job_worthwhile))--}}
                                                        {{--                                                                <span--}}
                                                        {{--                                                                    class="title_bold">【仕事の魅力・やりがい】</span>{{ $recruit->job_worthwhile }}--}}
                                                        {{--                                                            @endif--}}
                                                        {{--                                                            @if(!empty($recruit->career_path))--}}
                                                        {{--                                                                <span--}}
                                                        {{--                                                                    class="title_bold">【入社後のキャリアパス】</span>{{ $recruit->career_path }}--}}
                                                        {{--                                                            @endif--}}
                                                        {{--                                                            @if(!empty($recruit->content))--}}
                                                        {{--                                                                <p class="text_replace">{{ $recruit->content }}</p>--}}
                                                        {{--                                                            @endif--}}
                                                        {{--                                                        </div>--}}
                                                        {{--                                                        --}}{{--                                                        <p>{{ Str::limit($recruit->content, 200, '...') ?? '-' }}</p>--}}
                                                        {{--                                                    </div>--}}
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="mv">
                <div class="inner_content">
                    <div class="slide_tab">
                        <div class="title_wrap">
                            <p>新着求人</p>
                            <h2>NEW OFFER</h2>
                        </div>
                    </div>
                    <div class="slide_image">
                        <div class="slide_wrap hall_of_name active">
                            <ul class="active slick_slide slick_slide_1">
                                @foreach($new_recruit_list as $recruit)
                                    <li>
                                        <a href="/jobdetail/{{ $recruit->id }}" target="_blank">
                                            <div class="border_wrap">
                                            </div>
                                            @if(strtotime(date('Y-m-d')) < strtotime($recruit->updated_at.'30day'))
                                                <div class="new_wrap">
                                                    <div class="new_text">NEW</div>
                                                </div>
                                            @endif
                                            <div class="container">
                                                <div class="title_wrap">
                                                    <h2>{{ Str::limit($recruit->name, 50, '...') }}</h2>
                                                </div>
                                                <div class="company_wrap">
                                                    <h2>{{ $company_list->find($recruit->company_id) ? Str::limit($company_list->find($recruit->company_id)->name, 30, '...') : '企業名非公開' }}</h2>
                                                </div>
                                                <div class="text_wrap">
                                                    <div class="category_wrap">
                                                        <div class="area_wrap">
                                                            <div class="title">勤務地</div>
                                                            <p class="area_text">{{ $recruit->area_id ? $area_list[$recruit->area_id] : '-' }}</p>
                                                        </div>
                                                        <div class="income_wrap">
                                                            <div class="title">年収</div>
                                                            <p class="income_text">{{ $recruit->income }}</p>
                                                        </div>
                                                        <div class="feature_wrap">
                                                            <div class="title">特徴</div>
                                                            <div class="feature_text limited_text">
                                                                @if($recruit->features()->get()->count())
                                                                    @foreach($recruit->features()->get() as $feature)
                                                                        {{ $feature->name }}@unless ($loop->last)/@endunless
                                                                    @endforeach
                                                                @else
                                                                    <p>-</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content_wrap one_click_search">
                <div class="main_inner_wrap">
                    <div class="title_wrap">
                        <p>エリア検索</p>
                        <h2>AREA SEARCH</h2>
                    </div>
                    <div class="map_search">
                        @include('top.map')
                        @foreach($region_list as $region)
                            @php
                                if($loop->index == 1){
                                    $num_down = 0;
                                    $num_up = 7;
                                }elseif ($loop->index == 2){
                                    $num_down = 7;
                                    $num_up = 14;
                                }elseif ($loop->index == 3){
                                    $num_down = 14;
                                    $num_up = 23;
                                }elseif ($loop->index == 4){
                                    $num_down = 23;
                                    $num_up = 30;
                                }elseif ($loop->index == 5){
                                    $num_down = 30;
                                    $num_up = 39;
                                }elseif ($loop->index == 6){
                                        $num_down = 39;
                                    $num_up = 47;
                                }
                            @endphp
                            @if($loop->index == 0)
                                @continue
                            @endif
                            <div class="map_box map_{{$loop->index}}" id="map_{{$loop->index}}">
                                <div class="region_title">
                                    <a href="/joblink/local/{{$loop->index}}" class="link_{{$loop->index}}">{{$region}}</a>
                                </div>
{{-- <ul class="link_list">--}}
{{--     @foreach($area_list as $area)--}}
{{--         @if($loop->index <= $num_down)--}}
{{--             @continue--}}
{{--         @elseif($loop->index <= $num_up)--}}
{{--             <li>--}}
{{--                 <a href="/joblink/area/{{$loop->index}}">{{ $area }}</a>--}}
{{--             </li>--}}
{{--         @endif--}}
{{--     @endforeach--}}
{{-- </ul>--}}
                            </div>
                        @endforeach
                    </div>
                    <div class="other_search">
                        <div class="flex_wrap">
                            <div class="other_box license_box">
                                <h3 class="other_title">資格<span>から探す</span></h3>
                                <ul class="other_list">
                                    @foreach($license_list as $license)
                                        <li>
                                            <a href="/joblink/license/{{$loop->index + 1}}">{{ $license->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="other_box income_box">
                                <h3 class="other_title">年収<span>から探す</span></h3>
                                <ul class="other_list">
                                    @foreach($income_list as $income)
                                        <li>
                                            <a href="/joblink/income/{{$loop->index + 1}}">{{ $income->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="other_box feature_box">
                            <h3 class="other_title">特徴<span>から探す</span></h3>
                            <ul class="other_list">
                                @foreach($feature_list as $feature)
                                    <li>
                                        <a href="/joblink/feature/{{$loop->index + 1}}">{{ $feature }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content_wrap new_article">
                <div class="main_inner_wrap">
                    <div class="title_wrap">
                        <p>新着記事</p>
                        <h2>NEW ARTICLE</h2>
                    </div>
                    <div class="top_article">
                        <ul class="article_wrap first_article">
                            @foreach($top_article_list as $article)
                                <li>
                                    <a href="/article/{{$article->slug}}/{{$article->id}}">
                                        <div class="img_wrap"><img loading="lazy" src="{{$article->thumb_image}} " alt="thumb"></div>
                                        <div class="bottom_wrap">
                                            <div class="tag_wrap">
                                                <object>
                                                    <a href="/article/list/{{ $article->category_id }}">{{$article->category->name}}</a>
                                                </object>
                                            </div>
                                            <div class="text_wrap">
                                                {{$article->title}}
                                                @if($device == 'mobile')
                                                    <div class="sp_date_wrap">
                                                        <span><img loading="lazy" src="">{{ date('Y.m.d',strtotime($article->created_at)) }}</span>/
                                                        <span><img loading="lazy" src="">{{ date('Y.m.d',strtotime($article->updated_at)) }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="date_wrap">
                                            <span><img loading="lazy" src="">{{ date('Y.m.d',strtotime($article->created_at)) }}</span>/
                                            <span><img loading="lazy" src="">{{ date('Y.m.d',strtotime($article->updated_at)) }}</span>
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
                                    <div class="img_wrap"><img loading="lazy" src="{{$article->thumb_image}}" alt="サムネ"></div>
                                    <div class="bottom_wrap">
                                        <div class="tag_wrap">
                                            <object>
                                                <a href="/article/list/{{ $article->category_id }}">{{$article->category->name}}</a>
                                            </object>
                                        </div>
                                        <div class="text_wrap">
                                            {{$article->title}}
                                        </div>
                                    </div>
                                    <div class="date_wrap">
                                        <span><img loading="lazy" src="">{{ date('Y.m.d',strtotime($article->created_at)) }}</span>/
                                        <span><img loading="lazy" src="">{{ date('Y.m.d',strtotime($article->updated_at)) }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="more_btn">
                        <a href="/article/list">もっと見る<img loading="lazy" src="../images/bg_cv_arrow.svg" alt="arrow"></a>
                    </div>
                </div>
            </div>

            <div class="content_wrap youtube_links" id="youtube">
                <div class="main_inner_wrap">
                    <div class="title_wrap">
                        <h2>YOUTUBE</h2>
                        <p>おすすめ動画コンテンツ</p>
                    </div>
                    <div class="youtube_link_wrap">
                        <h3><img loading="lazy" src="/images/icon_tv.png" alt="tv">就職/転職につながる<span>学習動画</span></h3>
                        <ul class="youtube_wrap">
                            @foreach($movie_list as $movie)
                                <li>
                                    <div class="youtube">
                                        <iframe width="100%" height="" data-src="{{ $movie->src }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                    </div>
                                    <p>{{ $movie->title }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="content_wrap general_editor">
                <div class="main_inner_wrap">
                    <div class="title_wrap">
                        <h2>DOWN LOAD</h2>
                        <p>お役立ち資料</p>
                    </div>
                    <div class="p-white-list__box --top">
                        <a class="p-white-list__link" href="/whitepaper/wp01">
                            <img loading="lazy" class="p-white-list__img" src="/images/whitepaper/pdf1-income_resize.webp" alt="サムネ1">
                            <p class="p-white-list__text" style="height: 62px;">保存版 税理士事務所スタッフ・税理士の年収事情を徹底解説</p>
                            <span class="p-note__link">
                                <span class="p-dli-caret-right"></span>
                                <span class="ja">無料で読む</span>
                            </span>
                        </a>
                        <a class="p-white-list__link" href="/whitepaper/wp02">
                            <img loading="lazy" class="p-white-list__img" src="/images/whitepaper/pdf2-break_through_income_resize.webp" alt="サムネ2">
                            <p class="p-white-list__text" style="height: 62px;">税理士業界で年収1000万円を突破する方法とは</p>
                             <span class="p-note__link">
                                <span class="p-dli-caret-right"></span>
                                <span class="ja">無料で読む</span>
                            </span>
                        </a>
                        <a class="p-white-list__link" href="/whitepaper/wp03">
                            <img loading="lazy" class="p-white-list__img" src="/images/whitepaper/pdf3-black_resize.webp" alt="サムネ3">
                            <p class="p-white-list__text" style="height: 62px;">ブラック税理士事務所の見分け方</p>
                             <span class="p-note__link">
                                <span class="p-dli-caret-right"></span>
                                <span class="ja">無料で読む</span>
                            </span>
                        </a>
                    </div>
                    <div class="more_btn">
                        <a href="/whitepaper/">もっと見る<img loading="lazy" src="../images/bg_cv_arrow.svg"　alt="arrow"></a>
                    </div>
                </div>
            </div>

            <div class="content_wrap general_editor">
                <div class="main_inner_wrap">
                    <div class="title_wrap">
                        <h2>GENERAL EDITOR</h2>
                        <p>記事を監修してる人</p>
                    </div>
                    <ul class="editor_wrap">
                        <li>
                            @if($device == 'mobile')
                                <div class="img_wrap">
                                    <img loading="lazy" src="/images/ceo.webp" alt="ceo">
                                </div>
                            @endif
                            <div class="profile">
                                <p><img loading="lazy" src="/images/icon_youtube.png" alt="icon_youtube">城之内 楊（じょうのうち　よう）</p>
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
                                        <img loading="lazy" src="/images/header_youtube.webp" alt="youtube">
                                    </div>
                                    <div class="img_wrap">
                                        <a target="_blank" rel="noopener"
                                           href="https://www.youtube.com/@zeirishi_tensyoku_mitsukaru">
                                            <img loading="lazy" src="/images/youtube_link.png" alt="youtube_link">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if($device == 'pc')
                                <div class="img_wrap">
                                    <img loading="lazy" src="/images/ceo.webp" alt="ceo">
                                </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <div class="content_wrap link_collection">
                <div class="main_inner_wrap">
                    <div class="summary_wrap">
                        <h2>求人を探す</h2>
                        <div class="cassette_body">
                            <h3 class="category_title">年収から探す</h3>
                            <ul class="link_list">
                                @foreach($income_list as $income)
                                    <li>
                                        <a href="/joblink/income/{{$loop->index + 1}}">{{ $income->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <h3 class="category_title">特徴から探す</h3>
                            <ul class="link_list">
                                @foreach($feature_list as $feature)
                                    <li>
                                        <a href="/joblink/feature/{{$loop->index + 1}}">{{ $feature }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <h3 class="category_title">事務所規模から探す</h3>
                            <ul class="link_list">
                                @foreach($scale_list as $scale)
                                    @if($loop->index == 0)
                                        @continue
                                    @else
                                        <li>
                                            <a href="/joblink/scale/{{$loop->index}}">{{ $scale }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <h3 class="category_title">保有資格から探す</h3>
                            <ul class="link_list">
                                @foreach($license_list as $license)
                                    <li>
                                        <a href="/joblink/license/{{$loop->index + 1}}">{{ $license->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <h3 class="category_title">ポジションから探す</h3>
                            <ul class="link_list">
                                @foreach($occupation_list as $occupation)
                                    <li>
                                        <a href="/joblink/occupation/{{$loop->index + 1}}">{{ $occupation->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <h3 class="category_title">勤務地から探す</h3>
                            @foreach($region_list as $region)
                                @php
                                    if($loop->index == 1){
                                        $num_down = 0;
                                        $num_up = 7;
                                    }elseif ($loop->index == 2){
                                        $num_down = 7;
                                        $num_up = 14;
                                    }elseif ($loop->index == 3){
                                        $num_down = 14;
                                        $num_up = 23;
                                    }elseif ($loop->index == 4){
                                        $num_down = 23;
                                        $num_up = 30;
                                    }elseif ($loop->index == 5){
                                        $num_down = 30;
                                        $num_up = 39;
                                    }elseif ($loop->index == 6){
                                            $num_down = 39;
                                        $num_up = 47;
                                    }
                                @endphp
                                @if($loop->index == 0)
                                    @continue
                                @endif
                                <div class="flex_wrap">
                                    <h4 class="region_title"><a href="/joblink/local/{{$loop->index}}">{{$region}}</a>
                                    </h4>
                                    <ul class="link_list">
                                        @foreach($area_list as $area)
                                            @if($loop->index <= $num_down)
                                                @continue
                                            @elseif($loop->index <= $num_up)
                                                <li>
                                                    <a href="/joblink/area/{{$loop->index}}">{{ $area }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @if($device == "mobile")
        <script>
            // $(function () {
            //     $('.slick_slide_1').slick({
            //         dots: false,
            //         infinite: true,
            //         slidesToShow: 1,
            //         slidesToScroll: 1,
            //         centerMode: true,
            //         centerPadding: "20%",
            //     });
            // });
            // $(function () {
            //     $('.slick_slide_2').slick({
            //         dots: true,
            //         infinite: true,
            //         slidesToShow: 1,
            //         slidesToScroll: 1
            //     });
            // });
            //文字数表示制限SP
            $(document).ready(function () {
                function textTrim() {
                    // テキストをトリミングする要素
                    var selector = document.getElementsByClassName('limited_text');
                    // 制限する文字数
                    var wordCount = 30;
                    // 文末に追加したい文字
                    var clamp = '...';
                    for (var i = 0; i < selector.length; i++) {
                        // 文字数を超えたら
                        if (selector[i].innerText.length > wordCount) {
                            var str = selector[i].innerText; // 文字数を取得
                            str = str.substr(0, (wordCount - 1)); // 1文字削る
                            selector[i].innerText = str + clamp; // 文末にテキストを足す
                        }
                    }
                }
                textTrim();
            });
            //SPだけエリア検索の四国・中国と関西を入れ替える
            $(function () {
                $('#map_4').before($('#map_5'));
            });
        </script>
    @else
        <script>
            // let num = 5;
            // $(window).on('load', function () {
            //     let wid = document.body.clientWidth;
            //     if (wid >= 1440) {
            //         num = 5;
            //     } else {
            //         num = 4;
            //     }
            //     $('.slick_slide_1').slick({
            //         infinite: true,
            //         slidesToShow: num,
            //         slidesToScroll: 2,
            //         dots: false,
            //     });
            //     $('.slick_slide_2').slick({
            //         infinite: true,
            //         slidesToShow: num,
            //         slidesToScroll: 2,
            //         dots: false,
            //     });
            // });

            //文字数表示制限PC
            $(document).ready(function () {
                function textTrim() {
                    // テキストをトリミングする要素
                    var selector = document.getElementsByClassName('limited_text');
                    // 制限する文字数
                    var wordCount = 45;
                    // 文末に追加したい文字
                    var clamp = '...';
                    for (var i = 0; i < selector.length; i++) {
                        // 文字数を超えたら
                        if (selector[i].innerText.length > wordCount) {
                            var str = selector[i].innerText; // 文字数を取得
                            str = str.substr(0, (wordCount - 1)); // 1文字削る
                            selector[i].innerText = str + clamp; // 文末にテキストを足す
                        }
                    }
                }
                textTrim();
            });
        </script>
    @endif
    {{-- 要素の高さ揃える --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
    {{-- <script>
     $(document).ready(function(){
        $('.p-white-list__link').matchHeight();
      });
    </script> --}}
    {{-- //要素の高さ揃える --}}
    <script>
        $(function () {
            $('.youtube').each(function () {
                var iframe = $(this).children('iframe');
                var url = iframe.attr('data-src');
                var id = url.match(/[\/?=]([a-zA-Z0-9_-]{11})[&\?]?/)[1];
                iframe.before('<img loading="lazy" alt="youtube_thumb" src="http://img.youtube.com/vi/' + id + '/mqdefault.jpg" />').remove();
                $(this).on('click', function () {
                    $(this).after('<div class="youtube"><iframe src="https://www.youtube.com/embed/' + id + '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>').remove();
                });
            });
        });

        $('select').each(function () {
            var $this = $(this), numberOfOptions = $(this).children('option').length;

            $this.addClass('select-hidden');
            $this.wrap('<div class="select"></div>');
            $this.after('<div class="select-styled"></div>');

            var $styledSelect = $this.next('div.select-styled');
            $styledSelect.text($this.children('option').eq(0).text());

            var $list = $('<ul />', {
                'class': 'select-options'
            }).insertAfter($styledSelect);

            for (var i = 0; i < numberOfOptions; i++) {
                $('<li />', {
                    text: $this.children('option').eq(i).text(),
                    rel: $this.children('option').eq(i).val()
                }).appendTo($list);
                //if ($this.children('option').eq(i).is(':selected')){
                //  $('li[rel="' + $this.children('option').eq(i).val() + '"]').addClass('is-selected')
                //}
            }

            var $listItems = $list.children('li');

            $styledSelect.click(function (e) {
                e.stopPropagation();
                $('div.select-styled.active').not(this).each(function () {
                    $(this).removeClass('active').next('ul.select-options').hide();
                });
                $(this).toggleClass('active').next('ul.select-options').toggle();
            });

            $listItems.click(function (e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val($(this).attr('rel'));
                $list.hide();
                //console.log($this.val());
            });

            $(document).click(function () {
                $styledSelect.removeClass('active');
                $list.hide();
            });

        });

        //mapホバー
        $(function () {
            $('#hokkaido, #tohoku').hover(function () {
                $('.cls-5, .cls-10').toggleClass('active');
            });

            $('#kanto').hover(function () {
                $('.cls-7').toggleClass('active');
            });

            $('#tokai, #hokuriku').hover(function () {
                $('.cls-2, .cls-9').toggleClass('active');
            });

            $('#kansai').hover(function () {
                $('.cls-4').toggleClass('active');
            });

            $('#chugoku, #shikoku').hover(function () {
                $('.cls-3, .cls-6').toggleClass('active');
            });

            $('#kyusyu').hover(
                function () {
                    $('.cls-8').toggleClass('active');
                });
        });

    </script>
@endsection
