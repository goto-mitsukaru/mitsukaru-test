@extends('common.template')
@include('common.header')
@include('common.footer')
@section('content')
    <style>
        .article_wrap--youtube{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .p-movie__li{
            width: calc(25% - 23px);
            margin: 0 15px 35px;
        }
        .p-movie__li:nth-child(4n){
            margin-right: 0;
        }
        .p-movie__li:nth-child(4n+1){
            margin-left: 0;
        }
        .site .site-content .content_wrap p, .slide_tab .title_wrap p.--youtube{
            position: static;
            transform: none;
            font-size: clamp(10px,4vw,14px);
            white-space: wrap;
            font-weight: 700;
            line-height: 1.5;
        }
        .date_wrap{
            width: 100%;
            display:flex;
            justify-content:flex-start;
            align-items:center;
        }
        .c-date_wrap--span{
            content: "";
            width: 11px;
            height: 11px;
            background-size: 11px;
            background-image: url(/images/clock.svg);
            background-repeat: no-repeat;
            display: inline-block;
            margin-right: 5px;
        }
        .c-date_wrap--icon{
            background-image: url(/images/repeating.svg);
        }
        .c-date_wrap--text{
            display: block;
            width: fit-content;
        }
    </style>
    <div class="site">
        <div class="site-content">
            <ul class="breadcrumb">
                <li>
                    <a href="/"><img src="/images/home.png" alt="" id="breadcrumb_home"><span>ホーム</span></a>
                </li>
                <li>
                    <img src="/images/triangular-arrow.png" alt="" class="breadcrumb_arrow"><span>記事一覧</span>
                </li>
            </ul>
            <div class="article_list content_wrap">
                <div class="main_inner_wrap">
                    @if(!empty($writer))
                        <div class="content_area" id="list_writer_area">
                            <div class="profile_area">
                                <div class="profile_wrap">
                                    <div class="profile_left">
                                        <div class="profile_icon"><img src="{{ $writer->icon }}" alt=""></div>
                                    </div>
                                    <div class="profile_right">
                                        <p class="profile_name">{{ $writer->name }}</p>
                                        <p class="profile_company">{{ $writer->company }}</p>
                                    </div>
                                </div>
                                <div class="introduction_wrap">
                                    <p class="introduction_title">プロフィール</p>
                                    <div class="profile_text">
                                        {{ $writer->introduction }}
                                    </div>
                                </div>
                                <div class="link_wrap">
                                    <div class="inline_wrap">
                                        <a href="https://twitter.com/jounouti1990" target="_blank" rel="noopener" class="link">
                                            <p class="link_text">{{ $writer->link_url }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p id="article_wrap_title">監修した記事一覧</p>
                    @else
                        <div class="slide_tab" style="margin: 20px auto 70px;">
                            <div class="title_wrap">
                                <p>記事一覧</p>
                                <h2>ARTICLE</h2>
                            </div>
                        </div>
                    @endif
                    <div class="inner_wrap">
                        {{-- @if($device == 'mobile') --}}
                            <div class="top_article">
                                <ul class="article_wrap--youtube {{ ($device == 'mobile') ? 'first_article' : '' }}">
                                    @foreach($movie_list as $movie)
                                        <li class="p-movie__li">
                                            <div class="youtube">
                                                <iframe width="100%" height="" src="{{ $movie->src }}"
                                                        title="YouTube video player" frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe>
                                            </div>
                                            <p class="--youtube">{{ $movie->title }}</p>
                                            <div class="date_wrap">
                                                <span class="c-date_wrap--span"></span>
                                                <span class="c-date_wrap--text">{{ date('Y.m.d',strtotime($movie->created_at)) }} / </span>
                                                <span class="c-date_wrap--span c-date_wrap--icon"></span>
                                                <span class="c-date_wrap--text">{{ date('Y.m.d',strtotime($movie->updated_at)) }}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        {{-- @if($device == 'mobile') --}}

                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
