@extends('common.template')
@php
    //タイトルタグ・パンくずリスト等
        if(!empty($search_data['income_id'])){
            $income = "";
            foreach($income_list as $i => $item)
            if(in_array($i + 1, $search_data['income_id']) == true)
            $income .= ' '.$item->name;
        }else{
            $income = '';
        }

        if(!empty($search_data['feature_id'])){
            $feature = "";
            foreach($feature_list as $i => $item)
            if(in_array($i, $search_data['feature_id']) == true)
            $feature .= ' '.$item;
        }else{
            $feature = '';
        }

        if(!empty($search_data['scale_id'])){
            $scale = "";
            foreach($scale_list as $i => $item)
            if(in_array($i, $search_data['scale_id']) == true)
            $scale .= ' '.$item;
        }else{
            $scale = '';
        }

        if(!empty($search_data['license_id'])){
            $license = "";
            $one_license = "";
            foreach($license_list as $i => $item){
                if(in_array($i + 1, $search_data['license_id']) == true){
                $license .= ' '.$item->name;
                }
                if(count($search_data['license_id']) === 1 && in_array($i + 1, $search_data['license_id']) == true){
                $one_license = $item->name;
                $one_license_id = $item->id;
                }
            }
        }else{
            $license = '';
            $one_license = "";
        }

        if(!empty($search_data['local_id'])){
            $region = "";
            $one_region = "";

            foreach($region_list as $i => $item){
                if(in_array($i, $search_data['local_id']) == true){
                $region .= ' '.$item;
                }
                if(count($search_data['local_id']) === 1 && in_array($i, $search_data['local_id']) == true && !array_diff($search_data['area_id'], $local_area_id)){
                $one_region = $item;
                $one_region_id = $i;
                }
            }
        }else{
            $region = '';
            $one_region = "";
        }

        if(!empty($search_data['occupation_id'])){
            $occupation = "";
            $one_occupation = "";
            foreach($occupation_list as $i => $item){
            if(in_array($i + 1, $search_data['occupation_id']) == true)
            $occupation .= ' '.$item->name;
                if(count($search_data['occupation_id']) === 1 && in_array($i + 1, $search_data['occupation_id']) == true){
                    $one_occupation = $item->name;
                    $one_occupation_id = $item->id;
                }
            }
        }else{
            $occupation = '';
            $one_occupation = '';
        }

        if(!empty($search_data['area_id'])){
            $area = "";
            $one_area = "";
            $region_name = "";
            foreach($area_master_list as $i => $item){
                if(in_array($i + 1, $search_data['area_id']) == true) {
                    $area .= ' '.$item->name;
                }
                if(count($search_data['area_id']) === 1 && in_array($i + 1, $search_data['area_id']) == true){
                    $one_area = $item->name;
                    $one_area_id = $item->id;

                    foreach ($region_list as $region_i => $region_item) {
                        if ($region_i === $item->region_id) {
                            $region_name = $region_item;
                            $region_id = $region_i;
                            break;
                        }
                    }
                }
            }
        }else{
            $area = '';
            $one_area = "";
            $region_name = "";
        }
        $last_text = '税理士事務所求人一覧';
        if(!empty($scale)){
            $last_text = 'の求人一覧';
        }
@endphp
@section('title', $income. $feature. $license. $occupation. $region. $area. $scale. $last_text. ' | ')
@include('common.header')
@include('common.footer')
@section('content')
    <link href="/css/joblist.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    <ul class="breadcrumb">
        <li>
            <a href="/"><img src="/images/home.png" alt="" id="breadcrumb_home"><span>ホーム</span></a>
        </li>
        <li>
            <img src="/images/triangular-arrow.png" alt="" class="breadcrumb_arrow"><a
                href="/jobsearch"><span>求人検索</span></a>
        </li>
        @if($region_name && empty($one_license))
            <li>
                <img src="/images/triangular-arrow.png" alt="" class="breadcrumb_arrow"><a
                    href="/joblink/local/{{$region_id}}"><span>{{$region_name}}の求人</span></a>
            </li>
        @endif
        @if($one_license && ($income || $feature || $occupation || $area || $scale))
            <li>
                <img src="/images/triangular-arrow.png" alt="" class="breadcrumb_arrow"><a
                    href="/joblink/license/{{$one_license_id}}"><span>{{$one_license}}の求人</span></a>
            </li>
        @elseif($one_area && ($income || $feature || $license || $occupation || $scale))
            <li>
                <img src="/images/triangular-arrow.png" alt="" class="breadcrumb_arrow"><a
                    href="/joblink/area/{{$one_area_id}}"><span>{{$one_area}}の求人</span></a>
            </li>
        @elseif($one_occupation && ($income || $feature || $license || $area || $scale))
            <li>
                <img src="/images/triangular-arrow.png" alt="" class="breadcrumb_arrow"><a
                    href="/joblink/occupation/{{$one_occupation_id}}"><span>{{$one_occupation}}の求人</span></a>
            </li>
        @endif
        @if($income || $feature || $license || $occupation || $area || $scale || $one_region)
            <li>
                <img src="/images/triangular-arrow.png" alt=""
                     class="breadcrumb_arrow"><span>{{$income}} {{$feature}} {{$license}} {{$occupation}} {{$one_region}}@if(!$one_region){{$area}}@endif {{$scale}}の求人</span>
            </li>
        @endif
    </ul>
    <div class="container_wrap">
        <div class="search-top">
            <h2 class="heading pc no-txt">税理士の転職・求人情報</h2>
            <h2 class="heading sp "> 税理士の転職・求人情報</h2>
        </div>
        <div class="search-main-wrap">
            <section class="search-main">
                <div class="search-main-header">
                    <div class="left">
                        <h1>求人情報の検索結果一覧<span
                                class="h1_small">{{$income}} {{$feature}} {{$license}} {{$occupation}} {{$one_region}}@if(!$one_region){{$area}}@endif {{$scale}}</span>
                        </h1>
                        @if(!empty($local_area_links))
                            <ul class="search_results_link">
                                @foreach($local_area_links as $local_area_link)
                                <li><a href="/joblink/area/{{$local_area_link->id}}">{{$local_area_link->name}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                        <h3>該当求人数<span class="number">{{ number_format($recruit_list->count()) }}</span>件<span
                                class="small"><!-- (1〜10件を表示) --></span></h3>
                    </div>
                </div>
                @if($recruit_list->count() == null)
                    <div class="not_recruit_wrap">
                        <p class="text_01">公開している求人には、<br class="spOnly">条件に合う求人はございませんでした。</p>
                        <p class="text_02">ご登録いただくと<span class="orange">非公開求人</span>を含むすべての求人の中から、<br class="pcOnly">
                        キャリアアドバイザーが希望に沿った求人をご紹介します。</p>
                        <a href="/recruit" class="link_btn"><p>無料転職サービスに申し込む</p></a>
                    </div>
                    <div class="nearly_recruit_wrap">
                        <p class="nearly_title">現在の検索条件に近い求人</p>
                        <div class="slide_wrap hall_of_name slick-initialized active">
                            <ul class="active slick_slide slick_slide_1">
                                @php $count = 0 @endphp
                                @foreach($nearly_list as $recruit)
                                    @if ($count < 6)
                                        @php $count++ @endphp
                                    <li class="slick-slide">
                                        <a href="/jobdetail/{{ $recruit->id }}" target="_blank">
                                            <div class="border_wrap">
                                            </div>
                                            <div class="container">
                                                <div class="title_wrap">
                                                    <h2>{{ $recruit->name }}</h2>
                                                </div>
                                                <div class="company_wrap">
                                                    <h2>{{ $company_list->find($recruit->company_id) ? $company_list->find($recruit->company_id)->name : '企業名非公開' }}
                                                    </h2>
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
                                                            <div class="feature_text nearly_feature">
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
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <ul class="search-results">
                    @foreach($recruit_list as $recruit)
                        {{-- 記事カード --}}
                        <li class="rslt-new">
                            <div class="rslt-header">
                                <div class="rslt-heading">
                                    @if(strtotime(date('Y-m-d')) < strtotime($recruit->updated_at.'30day'))
                                        <div class="new_wrap">
                                            <div class="new_text">NEW</div>
                                        </div>
                                    @endif
                                    <div class="rslt-info">
                                        <div class="rslt-cat"
                                             style="{{$recruit->category == '-' ? 'display: none' : ''}}">
                                            {{ $recruit->category }}
                                        </div>
                                    </div>
                                    <span class="rslt-update">更新日：{{ $recruit->updated_at->format('Y年m月d日') }}</span>
                                    <h2 class="rslt-title"><a href="/jobdetail/{{ $recruit->id }}"
                                                              target="_blank">{{ $recruit->name }}</a>
                                    </h2>
                                    <div class="sub_title_wrap">
                                        <h3 class="rslt-subtitle">
                                            $recruit->company_idからCompany::
                                            {{ $company_list->find($recruit->company_id) ? $company_list->find($recruit->company_id)->name : '企業名非公開' }}
                                        </h3>
                                        <h3 style="margin-left: 40px" class="rslt-subtitle">
                                            {{ $recruit->scale_id ? $scale_list[$recruit->scale_id] : '' }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <dl class="rslt-detail">
                                <dt><span class="icon"><img src="/images/white_location.svg"></span>勤務地</dt>
                                <dd><span class="icon"><img
                                            src="/images/white_location.svg"></span>{{ $recruit->area_id ? $area_list[$recruit->area_id] : '-' }}
                                </dd>
                                <dt><span class="icon"><img src="/images/white_legal.svg"></span>保有資格</dt>
                                <dd><span class="icon"><img
                                            src="/images/white_legal.svg"></span>
                                    @if($recruit->licenses()->oldest()->get()->count())
                                        @foreach($recruit->licenses()->oldest()->get() as $license)
                                            {{ $license->name }}
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </dd>
                                <dt><span class="icon"><img src="/images/white_document.svg"></span>仕事内容</dt>
                                <dd><span class="icon"><img src="/images/white_document.svg"></span>
                                    <div class="excerpt long limited_text">
                                        @if(!empty($recruit->job_description))
                                            <span class="title_bold">【仕事概要】</span>{{$recruit->job_description}}
                                        @endif
                                        @if(!empty($recruit->specific_content))
                                            <span class="title_bold">【具体的な業務内容】</span>{{ $recruit->specific_content }}
                                        @endif
                                        @if(!empty($recruit->work_environment))
                                            <span class="title_bold">【働く環境】</span>{{ $recruit->work_environment }}
                                        @endif
                                        @if(!empty($recruit->position_worthwhile))
                                            <span
                                                class="title_bold">【ポジションの魅力・やりがい】</span>{{ $recruit->position_worthwhile }}
                                        @endif
                                        @if(!empty($recruit->job_worthwhile))
                                            <span class="title_bold">【仕事の魅力・やりがい】</span>{{ $recruit->job_worthwhile }}
                                        @endif
                                        @if(!empty($recruit->career_path))
                                            <span class="title_bold">【入社後のキャリアパス】</span>{{ $recruit->career_path }}
                                        @endif
                                        @if(!empty($recruit->content))
                                            <p class="text_replace">{{ $recruit->content }}</p>
                                        @endif
                                        {{--                                        <span class="btn-expand"></span>--}}
                                    </div>
                                </dd>
                                @if($recruit->movie != null && $recruit->movie != '')
                                    <dt><span class="icon"><img src="/images/play-button.svg"></span>企業動画</dt>
                                    <dd><span class="icon"><img
                                                src="/images/play-button.svg"></span>
                                        <a href="{{ $recruit->movie }}" target="_blank"
                                           style="border-bottom: solid 1px; color: #F7790B">
                                            @if($recruit->movie_title != null && $recruit->movie_title != '')
                                                {{ $recruit->movie_title }}
                                            @endif
                                        </a>
                                    </dd>
                                @endif
                            </dl>
                            @if(!empty($recruit->features()->first()->name))
                                <div class="rslt-tags">
                                    <ul>
                                        @foreach($recruit->features()->oldest()->get() as $feature)
                                            <li>{{ $feature->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="rslt-btn">
                                <a href="/recruit/{{ $recruit->id }}" class="rslt-confirm" target="_blank"><i
                                        class="fas fa-pen-square"></i>この求人に応募する</a>
                                <a href="/jobdetail/{{ $recruit->id }}" class="rslt-more" target="_blank">求人を詳しく見る<i
                                        class="fas fa-angle-right"></i></a>
                            </div>
                        </li>
                        {{-- //記事カード --}}
                    @endforeach
                </ul>
                <div class="search-main-footer">
                    <div class="left">
                        <!--
                        <label class="select-wrap">
                            <i class="fas fa-angle-down"></i>
                            <select name="">
                                <option value="">条件で並べ替え</option>
                                <option value="1">新着順</option>
                                <option value="2">新着順</option>
                            </select>
                        </label>
                        -->
                    </div>
                    <div class="right">
                        {{--                        <div class="pagenavi-wrap">--}}
                        {{--                            <div class="pagenavi pc">--}}
                        {{--                                <!-- <span class="start" rel="start" href=""><i class="fas fa-angle-double-left"></i></span> -->--}}
                        {{--                                <span class="prev"><i class="fas fa-angle-left"></i></span><b><span--}}
                        {{--                                            class="current">1</span></b><span><a--}}
                        {{--                                            href="http://zeirishi.mynavi-agent.jp/jobresult/?pageID=2" class="page"--}}
                        {{--                                            title="page 2">2</a></span><span><a--}}
                        {{--                                            href="http://zeirishi.mynavi-agent.jp/jobresult/?pageID=3" class="page"--}}
                        {{--                                            title="page 3">3</a></span><span><a--}}
                        {{--                                            href="http://zeirishi.mynavi-agent.jp/jobresult/?pageID=4" class="page"--}}
                        {{--                                            title="page 4">4</a></span><span><a--}}
                        {{--                                            href="http://zeirishi.mynavi-agent.jp/jobresult/?pageID=5" class="page"--}}
                        {{--                                            title="page 5">5</a></span><span><a--}}
                        {{--                                            href="http://zeirishi.mynavi-agent.jp/jobresult/?pageID=2" class="page"--}}
                        {{--                                            title="next page"><i class="fas fa-angle-right"></i></a></span>--}}
                        {{--                                <!-- <a class="end" rel="end" href=""><i class="fas fa-angle-double-right"></i></a> -->--}}
                        {{--                            </div>--}}
                        {{--                            <div class="pagenavi sp">--}}
                        {{--                                <!-- <span class="start" rel="start" href=""><i class="fas fa-angle-double-left"></i></span> -->--}}
                        {{--                                <span class="prev"><i class="fas fa-angle-left"></i></span><b><span--}}
                        {{--                                            class="current">1</span></b><span><a--}}
                        {{--                                            href="http://zeirishi.mynavi-agent.jp/jobresult/?pageID=2" class="page"--}}
                        {{--                                            title="page 2">2</a></span><span><a--}}
                        {{--                                            href="http://zeirishi.mynavi-agent.jp/jobresult/?pageID=3" class="page"--}}
                        {{--                                            title="page 3">3</a></span><span><a--}}
                        {{--                                            href="http://zeirishi.mynavi-agent.jp/jobresult/?pageID=4" class="page"--}}
                        {{--                                            title="page 4">4</a></span><span><a--}}
                        {{--                                            href="http://zeirishi.mynavi-agent.jp/jobresult/?pageID=5" class="page"--}}
                        {{--                                            title="page 5">5</a></span><span><a--}}
                        {{--                                            href="http://zeirishi.mynavi-agent.jp/jobresult/?pageID=2" class="page"--}}
                        {{--                                            title="next page"><i class="fas fa-angle-right"></i></a></span>--}}
                        {{--                                <!-- <a class="end" rel="end" href=""><i class="fas fa-angle-double-right"></i></a> -->--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>

            </section>


            <aside class="search-side">

                <section class="search-current">
                    <h2 class="heading">現在の検索条件</h2>
                    <div class="txt">
                        <dl class="current-1st">
                            <dt>希望年収</dt>
                            <dd>
                                <ul>
                                    @if(!empty($search_data['income_id']))
                                        @foreach($income_list as $i => $item)
                                            @if(in_array($i + 1, $search_data['income_id']) == true)
                                                <li>{{ $item->name }}&nbsp;&nbsp;</li>
                                            @endif
                                        @endforeach
                                    @else
                                        <li>指定なし</li>
                                    @endif
                                </ul>
                            </dd>
                            <dt>特徴</dt>
                            <dd>
                                <ul>
                                    @if(!empty($search_data['feature_id']))
                                        @foreach($feature_list as $i => $item)
                                            @if(in_array($i, $search_data['feature_id']) == true)
                                                <li>{{ $item }}&nbsp;&nbsp;</li>
                                            @endif
                                        @endforeach
                                    @else
                                        <li>指定なし</li>
                                    @endif
                                </ul>
                            </dd>
                            <dt>事務所規模</dt>
                            <dd>
                                <ul>
                                    @if(!empty($search_data['scale_id']))
                                        @foreach($scale_list as $i => $item)
                                            @if(in_array($i, $search_data['scale_id']) == true)
                                                <li>{{ $item }}&nbsp;&nbsp;</li>
                                            @endif
                                        @endforeach
                                    @else
                                        <li>指定なし</li>
                                    @endif
                                </ul>
                            </dd>
                        </dl>
                        <div class="current-2nd">
                            <dt>資格</dt>
                            <dd>
                                <ul>
                                    @if(!empty($search_data['license_id']))
                                        @foreach($license_list as $i => $item)
                                            @if(in_array($i + 1, $search_data['license_id']) == true)
                                                <li>{{ $item->name }}&nbsp;&nbsp;</li>
                                            @endif
                                        @endforeach
                                    @else
                                        <li>指定なし</li>
                                    @endif
                                </ul>
                            </dd>
                            <dt>ポジション</dt>
                            <dd>
                                <ul>
                                    @if(!empty($search_data['occupation_id']))
                                        @foreach($occupation_list as $i => $item)
                                            @if(in_array($i + 1, $search_data['occupation_id']) == true)
                                                <li>{{ $item->name }}&nbsp;&nbsp;</li>
                                            @endif
                                        @endforeach
                                    @else
                                        <li>指定なし</li>
                                    @endif
                                </ul>
                            </dd>
                            <dl>
                                <dt>勤務地</dt>
                                <dd>
                                    <ul>
                                        @if(!empty($search_data['area_id']))
                                            @foreach($area_list as $i => $item)
                                                @if(in_array($i, $search_data['area_id']) == true)
                                                    <li>{{ $item }}&nbsp;&nbsp;</li>
                                                @endif
                                            @endforeach
                                        @else
                                            <li>指定なし</li>
                                        @endif
                                    </ul>
                                </dd>
                            </dl>
                            <div class="btn-show-filter"><img src="/images/search.svg">検索条件を変更</div>
                        </div>
                        <div class="current-toggle">
                            <span class="toggle_text">
                                <i class="fas fa-angle-down"></i>
                            </span>
                            <span class="toggle_arrow"></span>
                        </div>
                    </div>
                </section>


                <section class="search-filter">
                    <div class="close"></div>
                    <h2 class="heading">検索条件を変更</h2>
                    <form action="/joblist" method="get">
                        <dl>
                            <dt class="filter_dt"><span class="icon"><img src="/images/star.svg"></span>希望年収<img
                                    src="/images/up-arrow.svg" class="arrow"></dt>
                            <dd class="filter_dd">
                                <ul class="side-checkbox">
                                    @foreach($income_list as $item)
                                        <li>
                                            <input type="checkbox" name="income[]" value="{{ $loop->index + 1 }}"
                                                   id="income_{{ $loop->index + 1 }}"
                                            @if(!empty($search_data["income_id"]))
                                                {{ in_array($item->id, $search_data["income_id"]) ? 'checked' : '' }}
                                                @endif>
                                            <label for="income_{{ $loop->index + 1 }}">{{ $item->name }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </dd>
                            <dt class="filter_dt"><span class="icon"><img src="/images/star.svg"></span>特徴<img
                                    src="/images/up-arrow.svg" class="arrow"></dt>
                            <dd class="filter_dd">
                                <ul class="side-checkbox">
                                    @foreach($feature_list as $item)
                                        @if($loop->index == 0)
                                            @continue
                                        @else
                                            <li><input type="checkbox" name="feature[]" value="{{ $loop->index }}"
                                                       id="feature_{{ $loop->index }}"
                                                @if(!empty($search_data['feature_id']))
                                                    {{ in_array($loop->index, $search_data['feature_id']) ? 'checked' : '' }}
                                                    @endif>
                                                <label for="feature_{{ $loop->index }}">{{ $item }}</label>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </dd>
                            <dt class="filter_dt"><span class="icon"><img src="/images/office.svg"></span>事務所規模<img
                                    src="/images/up-arrow.svg" class="arrow"></dt>
                            <dd class="filter_dd">
                                <ul class="side-checkbox">
                                    @foreach($scale_list as $item)
                                        @if($loop->index == 0)
                                            @continue
                                        @else
                                            <li><input type="checkbox" name="scale[]" value="{{ $loop->index }}"
                                                       id="scale_{{ $loop->index }}"
                                                @if(!empty($search_data['scale_id']))
                                                    {{ in_array($loop->index, $search_data['scale_id']) ? 'checked' : '' }}
                                                    @endif>
                                                <label for="scale_{{ $loop->index }}">{{ $item }}</label>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </dd>
                            <dt class="filter_dt"><span class="icon"><img
                                        src="/images/legal-document.svg"></span>保有資格<img
                                    src="/images/up-arrow.svg" class="arrow"></dt>
                            <dd class="filter_dd">
                                <ul class="side-checkbox">
                                    @foreach($license_list as $item)
                                        <li>
                                            <input type="checkbox" name="license[]" value="{{ $loop->index + 1 }}"
                                                   id="license_{{ $loop->index + 1 }}"
                                            @if(!empty($search_data['license_id']))
                                                {{ in_array($item->id, $search_data['license_id']) ? 'checked' : '' }}
                                                @endif>
                                            <label for="license_{{ $loop->index + 1 }}">{{ $item->name }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </dd>
                            <dt class="filter_dt"><span class="icon"><img src="/images/match.svg"></span>ポジションを選択<img
                                    src="/images/up-arrow.svg" class="arrow"></dt>
                            <dd class="select-job-wrap filter_dd">
                                <ul class="side-checkbox">
                                    @foreach($occupation_list as $item)
                                        <li><input type="checkbox" name="occupation[]" value="{{ $loop->index + 1 }}"
                                                   id="occupation_{{ $loop->index + 1 }}"
                                            @if(!empty($search_data['occupation_id']))
                                                {{ in_array($item->id, $search_data['occupation_id']) ? 'checked' : '' }}
                                                @endif>
                                            <label for="occupation_{{ $loop->index + 1 }}">{{ $item->name }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </dd>
                            <dt class="filter_dt"><span class="icon"><img src="/images/location.svg"></span>勤務地を選択<img
                                    src="/images/up-arrow.svg" class="arrow"></dt>
                            <dd class="filter_dd">
                                <ul class="checkbox-wrap area">
                                    <ul>
                                        @foreach($area_list as $area)
                                            @if($loop->index == 0)
                                                @continue
                                            @elseif($loop->index == 1)
                                                <p class="local"><input class="spot_allCheck"
                                                                        @if(!empty($search_data['local_id']))
                                                                        {{ in_array(1, $search_data['local_id']) ? 'checked' : '' }}
                                                                        @endif
                                                                        type="checkbox" name="local[]" value="1"
                                                                        id="area_101"><label
                                                        for="area_101">北海道・東北</label></p>
                                                <ul class="area_ul">
                                                    @elseif($loop->index == 8)
                                                </ul>
                                                <p class="local"><input class="spot_allCheck"
                                                                        @if(!empty($search_data['local_id']))
                                                                        {{ in_array(2, $search_data['local_id']) ? 'checked' : '' }}
                                                                        @endif
                                                                        type="checkbox" name="local[]"
                                                                        value="2" id="area_102"><label
                                                        for="area_102">関東・甲信越</label></p>
                                                <ul class="area_ul">
                                                    @elseif($loop->index == 15)
                                                </ul>
                                                <p class="local"><input class="spot_allCheck"
                                                                        @if(!empty($search_data['local_id']))
                                                                        {{ in_array(3, $search_data['local_id']) ? 'checked' : '' }}
                                                                        @endif
                                                                        type="checkbox" name="local[]"
                                                                        value="3" id="area_103"><label
                                                        for="area_103">東海・北陸</label></p>
                                                <ul class="area_ul">
                                                    @elseif($loop->index == 24)
                                                </ul>
                                                <p class="local"><input class="spot_allCheck"
                                                                        @if(!empty($search_data['local_id']))
                                                                        {{ in_array(4, $search_data['local_id']) ? 'checked' : '' }}
                                                                        @endif
                                                                        type="checkbox"
                                                                        name="local[]" value="4" id="area_104"><label
                                                        for="area_104">関西</label></p>
                                                <ul class="area_ul">
                                                    @elseif($loop->index == 31)
                                                </ul>
                                                <p class="local"><input class="spot_allCheck"
                                                                        @if(!empty($search_data['local_id']))
                                                                        {{ in_array(5, $search_data['local_id']) ? 'checked' : '' }}
                                                                        @endif
                                                                        type="checkbox"
                                                                        name="local[]" value="5" id="area_105"><label
                                                        for="area_105">中国・四国</label></p>
                                                <ul class="area_ul">
                                                    @elseif($loop->index == 40)
                                                </ul>
                                                <p class="local"><input class="spot_allCheck"
                                                                        @if(!empty($search_data['local_id']))
                                                                        {{ in_array(6, $search_data['local_id']) ? 'checked' : '' }}
                                                                        @endif
                                                                        type="checkbox" name="local[]"
                                                                        value="6" id="area_106"><label
                                                        for="area_106">九州・沖縄</label>
                                                </p>
                                                <ul class="area_ul">
                                                    @endif
                                                    <li><input type="checkbox" name="area[]" class="child_input"
                                                               @if(!empty($search_data['area_id']))
                                                               {{ in_array($loop->index, $search_data['area_id']) ? 'checked' : '' }}
                                                               @endif
                                                               value="{{$loop->index}}"
                                                               id="area_{{$loop->index}}"><label
                                                            for="area_{{$loop->index}}">{{ $area }}</label>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                    </ul>
                                </ul>
                            </dd>
                            <!--
                            <dt><span class="icon"><img src="/images/businessman.svg"></span>業種<img
                                        src="/images/up-arrow.svg" class="arrow"></dt>
                            <dd>
                                <ul class="side-checkbox">
                                    <li><label><input type="checkbox" name="ind[]" value="2">会計事務所・税理士法人</label></li>
                                    <li><label><input type="checkbox" name="ind[]" value="3">コンサルティングファーム</label></li>
                                    <li><label><input type="checkbox" name="ind[]" value="5">事業会社</label></li>
                                    <li><label><input type="checkbox" name="ind[]" value="4">金融機関</label></li>
                                </ul>
                            </dd>
                            -->
                        </dl>
                        <!--
                        <dt><span class="icon"><img src="/images/japanese-yen.svg"></span>年収を選択<img
                                    src="/images/up-arrow.svg" class="arrow"></dt>
                        <dd>
                            <label class="select-wrap">
                                <i class="fas fa-angle-down"></i>
                                <select name="ic">
                                    <option value="">特に指定しない</option>
                                    <option value="200">200万円</option>
                                    <option value="300">300万円</option>
                                    <option value="400">400万円</option>
                                    <option value="500">500万円</option>
                                    <option value="600">600万円</option>
                                    <option value="700">700万円</option>
                                    <option value="800">800万円</option>
                                    <option value="900">900万円</option>
                                    <option value="1000">1000万円</option>
                                    <option value="1100">1100万円</option>
                                    <option value="1200">1200万円</option>
                                </select>
                            </label>以上
                        </dd>
                        -->

                        <!--
                        <dt><span class="icon"><img src="/images/search/icon-new.svg"></span>新着求人<img src="/images/search/btn-open.svg" class="arrow"></dt>
                        <dd>
                            <ul class="side-checkbox">
                                <li><label><input type="checkbox" name="" value="" id="">新着</label></li>
                            </ul>
                        </dd>
                        -->
                        <!--
                        <dt><span class="icon"><img src="/images/group.svg"></span>従業員数<img
                                    src="/images/up-arrow.svg" class="arrow"></dt>
                        <dd>
                            <label class="select-wrap">
                                <i class="fas fa-angle-down"></i>
                                <select name="em">
                                    <option value="">特に指定しない</option>
                                    <option value="0001">10人以下</option>
                                    <option value="0002">10～100人</option>
                                    <option value="0003">100～500人</option>
                                    <option value="0004">500～1,000人</option>
                                    <option value="0005">1,000人以上</option>

                                </select>
                            </label>
                        </dd>
                        -->
                        <div class="side-btn-area">

                            <!-- <p>この条件の求人数<span class="number">525</span>件</p> -->

                            <button type="submit" id="searchSubmitBtn">
                                <i class="fas fa-search"></i>検索する
                            </button>
                        </div>
                    </form>
                </section>

            </aside>


        </div>
    </div>

    <script>

        {{--サイドバー開閉系--}}
        $(function () {
            $(".toggle").show();
            $(".filter_dt").on("click", function () {
                $(this).next().slideToggle();
                $(this).toggleClass("active");
            });
            $(".filter_dt").mouseover(function () {
                $(this).addClass("over");
            });
            $(".filter_dt").mouseout(function () {
                $(this).removeClass("over");
            });
        });

        $(function () {
            $(".current-toggle").on("click", function () {
                $(".current-2nd").slideToggle();
                $(".current-toggle").toggleClass("active");
                $(".toggle_arrow").toggleClass("active");
            });
        });

        //【】→太字に置換
        // $(function () {
        //     $(".text_replace").each(function () {
        //         var test = $(this).html();
        //         $(this).html(test.replace(/【/g, '<span class="title_bold">').replace(/】/g, ' </span>'));
        //     });
        // });

        @if($device == "mobile")
        //文字数表示制限、仕事内容
        $(document).ready(function () {

            function textTrim() {
                // テキストをトリミングする要素
                var selector = document.getElementsByClassName('limited_text');

                // 制限する文字数
                var wordCount = 75;

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
        //文字数表示制限、類似求人
        $(document).ready(function () {

            function textTrim() {
                // テキストをトリミングする要素
                var selector = document.getElementsByClassName('nearly_feature');

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

        //類似案件モバイルスリック
        $(document).ready(function () {

            $('.slick_slide_1').slick({
                infinite: true,
                slidesToShow: 1,
                centerMode: true,
                slidesToScroll: 1,
                dots: false,
                autoplay: true,
            });

        });
        @else
        //文字数表示制限、仕事内容
        $(document).ready(function () {

            function textTrim() {
                // テキストをトリミングする要素
                var selector = document.getElementsByClassName('limited_text');

                // 制限する文字数
                var wordCount = 150;

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
        //文字数表示制限、類似求人
        $(document).ready(function () {

            function textTrim() {
                // テキストをトリミングする要素
                var selector = document.getElementsByClassName('nearly_feature');

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

        document.addEventListener('DOMContentLoaded', function () {
            // サイドメニュー固定
            const searchSideElement = document.querySelector('.search-side');
            let lastScrollTop = 0; // 前回のスクロール位置を保存する変数
            const searchSideHeight = searchSideElement.clientHeight;
            const searchMainHeight = document.querySelector('.search-main').clientHeight;

            // スクロールイベントを監視(件数がサイドバーを超えない場合に発動)
            if (searchSideHeight < searchMainHeight) {
                window.addEventListener('scroll', function () {
                    const scrollTop = document.documentElement.scrollTop;
                    const viewportHeight = window.innerHeight;
                    const scrollBottom = scrollTop + viewportHeight;

                    // .search-side要素の位置情報を取得
                    const elementRect = searchSideElement.getBoundingClientRect();

                    // スクロールが下向きの場合
                    if (scrollTop > lastScrollTop) {
                        // .search-side要素の終わり部分が画面の下に到達したかを確認
                        if (elementRect.bottom <= window.innerHeight) {
                            // 到達した場合に実行したいアクションをここに記述
                            searchSideElement.classList.add('fixed');
                        }
                        // スクロールが上向きの場合
                    } else {
                        if (elementRect.height > scrollBottom) {
                            // 到達した場合に実行したいアクションをここに記述
                            searchSideElement.classList.remove('fixed');
                        }
                    }

                    lastScrollTop = scrollTop; // スクロール位置を更新

                    // .footerが画面上に現れたら、.search-sideに.bottom_spaceを追加
                    const footer = document.querySelector('.footer');
                    if (footer.getBoundingClientRect().top <= viewportHeight) {
                        searchSideElement.classList.add('bottom_space');
                    } else {
                        searchSideElement.classList.remove('bottom_space');
                    }
                });
            }
        });



        @endif
    </script>

@endsection
