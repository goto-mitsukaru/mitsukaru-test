@extends('common.template')
@include('common.header')
@include('common.footer')
@section('content')
    <link href="/css/recruit.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    <ul class="breadcrumb">
        <li>
            <a href="/"><img src="/images/home.png" alt="" id="breadcrumb_home"><span>ホーム</span></a>
        </li>
        <li>
            <img src="/images/triangular-arrow.png" alt="" class="breadcrumb_arrow"><a
                    href="/jobsearch"><span>求人検索</span></a>
        </li>
    </ul>
    <div class="container_wrap">
        <div class="jobsearch-wrap">

            <div class="main">

                <form class="jobsearch-filter" action="/joblist" method="get">
{{--                    @csrf--}}
                    <h1 class="heading">求人情報を検索する</h1>
                    <dl>
                        <dt><span class="icon"><img src="/images//legal-document.svg"></span>希望年収<img
                                    src="/images/up-arrow.svg" class="arrow"></dt>
                        <dd>
                            <ul class="checkbox-wrap">
                                @foreach($income_list as $item)
                                    <li><input type="checkbox" name="income[]" value="{{ $loop->index + 1 }}"
                                               id="income_{{ $loop->index + 1 }}"><label
                                                for="income_{{ $loop->index + 1 }}">{{ $item->name }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </dd>
                        <dt><span class="icon"><img src="/images//star.svg"></span>特徴<img
                                    src="/images/up-arrow.svg" class="arrow"></dt>
                        <dd>
                            <ul class="checkbox-wrap">
                                @foreach($feature_list as $item)
                                    @if($loop->index == 0)
                                        @continue
                                    @endif
                                    <li><input type="checkbox" name="feature[]" value="{{ $loop->index }}"
                                               id="feature_{{ $loop->index }}"><label
                                                for="feature_{{ $loop->index }}">{{ $item }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </dd>
                        <dt><span class="icon"><img src="/images//office.svg"></span>事務所規模<img
                                    src="/images/up-arrow.svg" class="arrow"></dt>
                        <dd>
                            <ul class="checkbox-wrap">
                                @foreach($scale_list as $item)
                                    @if($loop->index == 0)
                                        @continue
                                    @endif
                                    <li><input type="checkbox" name="scale[]" value="{{ $loop->index }}"
                                               id="scale_{{ $loop->index }}"><label
                                                for="scale_{{ $loop->index }}">{{ $item }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </dd>
                        <dt><span class="icon"><img src="/images//legal-document.svg"></span>保有資格<img
                                    src="/images/up-arrow.svg" class="arrow"></dt>
                        <dd>
                            <ul class="checkbox-wrap">
                                @foreach($license_list as $item)
                                    <li><input type="checkbox" name="license[]" value="{{ $loop->index + 1 }}"
                                               id="license_{{ $loop->index + 1 }}"><label
                                                for="license_{{ $loop->index + 1 }}">{{ $item->name }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </dd>
                        <dt><span class="icon"><img src="/images/match.svg"></span>ポジション<img
                                    src="/images/up-arrow.svg" class="arrow"></dt>

                        <dd class="narrow">
                            <ul class="choseList">
                                @foreach($occupation_list as $item)
                                    <li><input type="checkbox" name="occupation[]" value="{{ $loop->index + 1 }}"
                                               id="occupation_{{ $loop->index + 1 }}"><label
                                                for="occupation_{{ $loop->index + 1 }}">{{ $item->name }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </dd>
                        <dt><span class="icon"><img src="/images/location.svg"></span>勤務地<img
                                    src="/images/up-arrow.svg" class="arrow"></dt>
                        <dd>
                            <ul class="checkbox-wrap area">
                                <li>
                                    @foreach($area_list as $area)
                                        @if($loop->index == 0)
                                            @continue
                                        @elseif($loop->index == 1)
                                            <p class="local"><input class="spot_allCheck" type="checkbox" name="local[]" value="1"
                                                      id="area_101"><label
                                                        for="area_101">北海道・東北</label></p>
                                            <ul class="area_ul">
                                                @elseif($loop->index == 8)
                                            </ul>
                                            <p class="local"><input class="spot_allCheck" type="checkbox" name="local[]"
                                                      value="2" id="area_102"><label
                                                        for="area_102">関東・甲信越</label></p>
                                            <ul class="area_ul">
                                                @elseif($loop->index == 15)
                                            </ul>
                                            <p class="local"><input class="spot_allCheck" type="checkbox" name="local[]"
                                                      value="3" id="area_103"><label
                                                        for="area_103">東海・北陸</label></p>
                                            <ul class="area_ul">
                                                @elseif($loop->index == 24)
                                            </ul>
                                            <p class="local"><input class="spot_allCheck" type="checkbox"
                                                      name="local[]" value="4" id="area_104"><label
                                                        for="area_104">関西</label></p>
                                            <ul class="area_ul">
                                                @elseif($loop->index == 31)
                                            </ul>
                                            <p class="local"><input class="spot_allCheck" type="checkbox"
                                                      name="local[]" value="5" id="area_105"><label
                                                    for="area_105">中国・四国</label></p>
                                            <ul class="area_ul">
                                                @elseif($loop->index == 40)
                                            </ul>
                                            <p class="local"><input class="spot_allCheck"
                                                      type="checkbox" name="local[]"
                                                      value="6" id="area_106"><label
                                                        for="area_106">九州・沖縄</label>
                                            </p>
                                            <ul class="area_ul">
                                                @endif
                                                <li><input type="checkbox" name="area[]" class="child_input"
                                                           value="{{$loop->index}}"
                                                           id="area_{{$loop->index}}"><label
                                                            for="area_{{$loop->index}}">{{ $area }}</label>
                                                </li>
                                                @endforeach
                                                </li>
                                            </ul>
                        </dd>
                    </dl>
                    <div class="btn-area">
                        <button type="submit" id="searchSubmitBtn" class="btn-search"><i
                                    class="fas fa-search"></i><span>検索する</span></button>
                        <button class="btn-form_clear">クリア</button>
                    </div>
                </form>

            </div><!-- .main -->

        </div>
    </div>

@endsection

