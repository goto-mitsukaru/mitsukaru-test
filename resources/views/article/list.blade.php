@extends('common.template')
@include('common.header')
@include('common.footer')
@section('content')
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
                        @if($device == 'mobile')
                            <div class="top_article">
                        @endif
                            <ul class="article_wrap {{ ($device == 'mobile') ? 'first_article' : '' }}">
                                @foreach($article_list as $article)
                                    <li>
                                        <a href="/article/{{$article->slug}}/{{$article->id}}">
                                            <div class="img_wrap"><img src="{{$article->image}}"></div>
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
                                                <span><img src="">{{ date('Y.m.d',strtotime($article->created_at)) }}</span>/
                                                <span><img src="">{{ date('Y.m.d',strtotime($article->updated_at)) }}</span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @if($device == 'mobile')
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
