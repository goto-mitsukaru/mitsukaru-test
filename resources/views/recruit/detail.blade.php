@extends('common.template')
@php
    $area = $recruit->area_id ? $area_array[$recruit->area_id] : '-';
    $company_name = $company->name ?? '企業名非公開';
    if($recruit->occupations->count()){
        $license_name = '';
        foreach ($recruit->occupations as $occupation)
            $license_name .= ' '.$occupation->name;
    }
@endphp
@section('title', $company_name.' | '.$license_name.'の求人詳細 | '.$area.' | ')
@include('common.header')
@include('common.footer')
@section('content')
    <link href="/css/recruit.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    <link href="/css/recruit_detail.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    <link href="/css/recruit_detail.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    <script>
          // 動画クリック拡大モーダル処理
          var contentAdded = false;
          $(function () {
            if (!navigator.userAgent.match(/iPhone|Android.+Mobile/)) {
                    $(".p-result-box__thumb").click(function (e) {
                        // まず、クリックした画像の HTML(<img>タグ全体)を#frayDisplay内にコピー
                        var $clone;
                        var $clone = $(this).clone();
                        $clone.addClass("js-active-modal");
                        if (!contentAdded) {
                            $(".p-modal-bg__inner").append($clone);
                        } else {
                            $(".p-result-box__thumb").addClass("js-active-modal");
                        }
                        //そして、fadeInで表示する。
                        $("#p-modal-bg").fadeIn(200);
                        $("#p-modal-bg").addClass('js-active');
                        $(this).addClass('js-active-modal');

                        $('html, body').css('overflow', 'hidden');
                        contentAdded = true;
                        return false;
                    });
                    $("#p-modal-bg").click(function () {
                        // 非表示にする
                        $(".p-result-box__thumb").removeClass('js-active-modal');
                        $("#p-modal-bg").removeClass('js-active');
                        $("#p-modal-bg").fadeOut(200);

                        $('html, body').css('overflow', 'auto');
                        return false;
                    });

                    $(document).on("click", ".js-active-modal", function (e) {
                        e.preventDefault();
                        return false;
                    });
                }
            });
    </script>
    <ul class="breadcrumb">
        <li>
            <a href="/"><img src="/images/home.png" alt="" id="breadcrumb_home"><span>ホーム</span></a>
        </li>
        <li>
            <img src="/images/triangular-arrow.png" alt="" class="breadcrumb_arrow"><a
                    href="/joblist"><span>求人一覧</span></a>
        </li>
        <li>
            <img src="/images/triangular-arrow.png" alt="" class="breadcrumb_arrow"><a
                    href="#"><span>{{ $recruit->name }}</span></a>
        </li>
    </ul>
    <div id="p-modal-bg">
        <div class="p-modal-bg__inner">
            <span class="c-square-btn__wrap">
                <span  class="c-square-btn"></span>
            </span>
        </div>
    </div>
    <div class="container_wrap">
        <div class="searchResultPanel">
            <div class="searchResultPanelIn">
                <div class="resultJobHead">
                    <div class="resultJobShoulder">
                        <span class="resultJobCate"
                              style="{{$recruit->category == '-' ? 'display: none' : ''}}">{{ $recruit->category }}</span>
                        <span class="resultJobNo" style="padding-left:20px;">求人No_{{ 1000 + $recruit->id }}</span>
                        <span class="resultJobNo resultJobDate">更新日：{{ $recruit->updated_at ? $recruit->updated_at->format('Y年m月d日') : $recruit->created_at->format('Y年m月d日')}}</span>
                    </div>
                    <div class="p-resultJobHead-flex">
                        <div class="p-result-box">
                            <h1 class="resultJobTit">{{ $recruit->name }}<span class="h1_small">{{ $company->name ?? '企業名非公開' }}</span></h1>
                            <dl class="resultJobCompany">
                                <div class="sub_title_wrap">
                                    <dt style="{{ $isMobile ? 'width: 100%' : 'margin-left: 0' }}">{{ $recruit->scale_id ? $scale_list[$recruit->scale_id] : '' }}</dt>
                                </div>
                            </dl>
                            <dl class="resultJobAddress">
                                <dt>所在地</dt>
                                <dd style="white-space: pre-wrap">{{ $company->workplace ?? '-' }}</dd>
                            </dl>
                        </div>
                        @if($recruit->movie != null && $recruit->movie != '')
                            <div class="p-result-box__thumb--wrap">
                                <div class="p-result-box__thumb">
                                    <div class="p-movie_frame">
                                        <iframe width="100%" height="100%" src="{{ $recruit->movie }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        @elseif($recruit->thumb_image != null && $recruit->thumb_image != '')
                        @endif
                    </div>
                </div>
                {{-- <div class="movie_wrap">
                    <img src="{{ $recruit->thumb_image }}" style="width: 100%">
                </div> --}}


                <div class="resultJobSummary">
                    <div class="resultJobSummaryIn">
                        <table>
                            <tbody>
                            <tr>
                                <th><i class="icnQualMini">&nbsp;</i>資格</th>
                                <td>
                                    @if($recruit->licenses->count())
                                        @foreach($recruit->licenses as $license)
                                            <p>{{ $license->name }}</p>
                                        @endforeach
                                    @else
                                        <p>-</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th><i class="icnJobCateMini">&nbsp;</i>募集<br>ポジション</th>
                                <td>
                                    @if($recruit->occupations->count())
                                        @foreach($recruit->occupations as $occupation)
                                            <p>{{ $occupation->name }}</p>
                                        @endforeach
                                    @else
                                        <p>-</p>
                                    @endif
                                </td>
                            </tr>
                            @if($recruit->status_id)
                                <tr>
                                    <th><i class="icnJobCateMini">&nbsp;</i>雇用形態</th>
                                    <td>{{ $status[$recruit->status_id] }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th><i class="icnIncomeMini">&nbsp;</i><span class="pcOnly">モデル</span>年収</th>
                                <td class="profile">{{ $recruit->income }}</td>
                            </tr>
                            <tr>
                                <th><i class="icnIncomeMini">&nbsp;</i>特徴</th>
                                <td>
                                    @if($recruit->features()->get()->count())
                                        @foreach($recruit->features()->get() as $feature)
                                            <p>{{ $feature->name }}</p>
                                        @endforeach
                                    @else
                                        <p>-</p>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="resulJobDetailBlock">
                    <div class="resultJobDetail">
                        <h4 class="jobDetailTit">仕事内容</h4>
                        @if(!empty($recruit->job_description))
                            <p><span class="title_bold">【仕事概要】</span><span>{{ $recruit->job_description }}</span></p>
                        @endif
                        @if(!empty($recruit->specific_content))
                            <p><span class="title_bold">【具体的な業務内容】</span>{{ $recruit->specific_content }}</p>
                        @endif
                        @if(!empty($recruit->work_environment))
                            <p><span class="title_bold">【働く環境】</span>{{ $recruit->work_environment }}</p>
                        @endif
                        @if(!empty($recruit->position_worthwhile))
                            <p><span class="title_bold">【ポジションの魅力・やりがい】</span>{{ $recruit->position_worthwhile }}</p>
                        @endif
                        @if(!empty($recruit->job_worthwhile))
                            <p><span class="title_bold">【仕事の魅力・やりがい】</span>{{ $recruit->job_worthwhile }}</p>
                        @endif
                        @if(!empty($recruit->career_path))
                            <p><span class="title_bold">【入社後のキャリアパス】</span>{{ $recruit->career_path }}</p>
                        @endif
                        @if(!empty($recruit->content))
                            <p class="text_replace">{!! $recruit->content !!}</p>
                        @endif
                    </div>
                    <div class="resultJobDetail">
                        <h4 class="jobDetailTit">応募条件</h4>
                        @if(!empty($recruit->required_condition))
                            <p><span class="title_bold">【必須条件】</span>{{ $recruit->required_condition }}</p>
                        @endif
                        @if(!empty($recruit->welcome_condition))
                            <p><span class="title_bold">【歓迎条件】</span>{{ $recruit->welcome_condition }}</p>
                        @endif
                        @if(!empty($recruit->ideal_image))
                            <p><span class="title_bold">【求める人物像※期待行動・コンピテンシー等】</span>{{ $recruit->ideal_image }}</p>
                        @endif
                        @if(!empty($recruit->match))
                            <p class="text_replace">{!! $recruit->match !!}</p>
                        @endif
                    </div>

                    <div class="resultJobDetail">
                        <h4 class="jobDetailTit">応募詳細</h4>

                        <div class="resultJobSummary">
                            <div class="resultJobSummaryIn">
                                <table>
                                    <tbody>
                                    <tr>
                                        <th>勤務地</th>
                                        <td>
                                            {{ $recruit->area_id ? $area_array[$recruit->area_id] : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>就業時間</th>
                                        <td>
                                            {{ $recruit->time }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>平均残業<br>時間</th>
                                        <td>
                                            {{ $recruit->overtime }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>福利厚生・手当</th>
                                        <td class="profile">{{ $recruit->welfare }}</td>
                                    </tr>
                                    <tr>
                                        <th>休日・休暇</th>
                                        <td>
                                            {{ $recruit->holiday }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                    <div class="resultJobBtn pc">
                        <a class="btnOrange" href="/recruit/{{ $recruit->id }}" target="_blank">この求人について話を聞いてみる</a>
                    </div>
                    {{--                    <div class="resultJobBtn sp">--}}
                    {{--                        <p class="btnOrange icnBtnArwR"><a href="/entry/?jno=10240918" target="_blank">この求人について話を聞いてみる</a></p>--}}
                    {{--                    </div>--}}
                </div>
            </div>


        </div>
        <div class="searchResultInfo">
            <p class="resultInfoTit">企業情報</p>
            <div class="resultInfoTitBody">
                <table>
                    <tbody>
                    @if(($company->profile != null && $company->profile != '-') || !empty($company->mvv) || !empty($company->scale) || !empty($company->number) || !empty($company->business) || !empty($company->average_number))
                        <tr>
                            <th>会社概要</th>
                            <td class="profile">
                                @if(!empty($company->mvv))
                                    <p><span class="title_bold">【ミッション・ビジョン・バリュー】</span>{{ $company->mvv }}</p>
                                @endif
                                @if(!empty($company->scale))
                                    <p><span class="title_bold">【顧問規模】</span>{{ $company->scale }}</p>
                                @endif
                                @if(!empty($company->number))
                                    <p><span class="title_bold">【顧問件数】</span>{{ $company->number }}</p>
                                @endif
                                @if(!empty($company->business))
                                    <p><span class="title_bold">【事業・サービス内容】</span>{{ $company->business }}</p>
                                @endif
                                @if(!empty($company->average_number))
                                    <p><span class="title_bold">【担当者の平均担当件数】</span>{{ $company->average_number }}</p>
                                @endif
                                @if(!empty($company->profile))
                                    <p class="text_replace top_space">{!! $company->profile ?? '-' !!}</p>
                                @endif
                            </td>
                        </tr>
                    @endif
                    @if($company->category != null && $company->category != '-')
                        <tr>
                            <th>業種</th>
                            <td>{{ $recruit->category ?? '-' }}</td>
                        </tr>
                    @endif
                    @if($company->feature != null && $company->feature != '-')
                        <tr>
                            <th>企業特徴</th>
                            <td>
                                {{ $company->feature ?? '-' }}
                            </td>
                        </tr>
                    @endif
                    @if($company->workplace != null && $company->workplace != '-')
                        <tr>
                            <th>住所</th>
                            <td>
                                {{ $company->workplace ?? '-' }}
                            </td>
                        </tr>
                    @endif
                    {{--                    <tr>--}}
                    {{--                        <th>設立年月</th>--}}
                    {{--                        <td>--}}
                    {{--                        </td>--}}
                    {{--                    </tr>--}}
                    @if($company->income != null && $company->income != '-')
                        <tr>
                            <th>平均年収</th>
                            <td>
                                {{ $company->income ?? '-' }}
                            </td>
                        </tr>
                    @endif
                    @if($company->adviser != null && $company->adviser != '-')
                        <tr>
                            <th>顧問件数</th>
                            <td>
                                {{ $company->adviser ?? '-' }}
                            </td>
                        </tr>
                    @endif
                    @if($company->matter != null && $company->matter != '-')
                        <tr>
                            <th>相続の年間対応件数</th>
                            <td>
                                {{ $company->matter ?? '-' }}
                            </td>
                        </tr>
                    @endif
                    @if($company->soft != null && $company->soft != '-')
                        <tr>
                            <th>使用している会計ソフト</th>
                            <td>
                                {{ $company->soft }}
                            </td>
                        </tr>
                    @endif
                    @if($company->url != null && $company->url != '-')
                        <tr>
                            <th>URL</th>
                            <td>
                                <a style="text-decoration: underline;" href="{{ $company->url }}"
                                   target="_blank">{{ $company->url }}</a>
                            </td>
                        </tr>
                    @endif
                    @if($company->employee != null && $company->employee != '-')
                        <tr>
                            <th>従業員数</th>
                            <td>
                                {{ $company->employee ?? '-' }}
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="searchFormPanel">
            <div class="resultJobBtn pc">
                <p class="btnOrange icnBtnArwR"><a href="/recruit" target="_blank">他の求人情報も聞いてみる</a></p>
            </div>
        </div>
    </div>
    <script>
        //【】→太字に置換
        // $(function () {
        //     $(".text_replace").each(function () {
        //         var test = $(this).html();
        //         $(this).html(test.replace(/【/g, '<span class="title_bold">').replace(/】/g, '</span>'));
        //     });
        // });

    </script>
@endsection
