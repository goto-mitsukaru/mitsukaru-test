@extends('common.template')
@include('common.header')
@include('common.footer')
@section('title', $article->title)
@section('content')
    <ul class="breadcrumb">
        <li>
            <a href="/"><img src="/images/home.png" alt="" id="breadcrumb_home"><span>ホーム</span></a>
        </li>
        <li>
            <img src="/images/triangular-arrow.png" alt="" class="breadcrumb_arrow"><a
                    href="/article/list"><span>記事一覧</span></a>
        </li>
        <li>
            <img src="/images/triangular-arrow.png" alt=""
                 class="breadcrumb_arrow"><span>{{ $article->title }}</span>
        </li>
    </ul>
    <div class="entry_header">
        <div class="tag_box">
            <div class="tag">
                <a href="/article/list/{{ $article->category_id }}">
                    {{ $category->name }}
                </a>
            </div>
        </div>
        <div class="title_box">
            <h1>{{ $article->title }}</h1>
        </div>
        <div class="date_box">
            <img src="/images/wall-clock.png" alt="">
            <time class="{{ $article->updated_at == null ? '' : 'created_date' }}">{{ $article->created_at->format('Y年m月d日') }}</time>
            @if($article->updated_at != null)
                <img class="updated_img" src="/images/update-arrow.png" alt="">
                <time class="updated_date">{{ $article->updated_at->format('Y年m月d日') }}</time>
            @endif
        </div>
        <div class="category_box">
            @foreach($tags as $tag)
                @if($tag['tag'] != "")
                    <a href="#">{{$tag['tag']}}</a>
                @endif
            @endforeach
        </div>
    </div>
    <div class="content_area">
        <main>
            @if($article->movie != null && $article->movie != '')
            <div class="movie_frame">
                <iframe class="iframe" width="100%" height="100%" src="{{ $article->movie }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
            </div>
            @else
                 <div class="post_thumbnail">
                    <img class="thumb_img" src="{{ $article->image }}" alt="">
                </div>
            @endif
            @if($article->id != 20)
                <div class="entry_content">
                    <div class="profile_area">
                        <div class="profile_wrap">
                            <div class="profile_left">
                                <div class="profile_icon"><img src="{{ $writer->icon }}" alt=""></div>
                            </div>
                            <div class="profile_right">
                                <div class="profile_title">執筆 ・ 監修</div>
                                <p class="profile_name">{{ $writer->name }}</p>
                                <p class="profile_company">{{ $writer->company }}</p>
                            </div>
                        </div>
                        <div class="introduction_wrap">
                            <div class="profile_text">
                                {{ $writer->introduction }}
                            </div>
                        </div>
                        <div class="link_wrap">
                            <div class="inline_wrap">
                                <a href="/article/list/writer/{{ $writer->id }}" class="link">
                                    <p class="link_text">{{ $writer->name }}が過去執筆・監修した記事一覧</p>
                                    <span class="arrow"></span>
                                </a>
                            </div>
                            <div class="inline_wrap">
                                <a href="{{ $writer->link_url }}" target="_blank" rel="noopener" class="link">
                                    <p class="link_text">{{ $writer->link_name }}</p>
                                    <span class="arrow"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div id="article_text">
                {!! $article->text !!}
            </div>
        </main>
        <div class="relation">
            <h3>関連記事</h3>
            <ul>
                @foreach($relations as $relation)
                    <li>
                        <a href="/article/{{ $relation->slug }}/{{ $relation->id }}">
                            <div class="relation_flexbox">
                                <div class="flex_photo">
                                    <img src="{{ $relation->image }}" alt="">
                                </div>
                                <div class="flex_text">
                                    <span>{{ $relation->category->name }}</span>
                                    <p>{{ $relation->title }}</p>
                                    <div class="date_box">
                                        <img src="/images/wall-clock.png" alt="">
                                        <time class="created_date">{{ $relation->created_at->format('Y年m月d日') }}</time>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <script>
        //サイト内リンク非同期取得
        $(function () {

            function textTrim(text, wordCount) {
                var number = text.length

                // 文末に追加したい文字
                var clamp = '…';
                text = text.slice(0, wordCount)
                if (number > wordCount){
                    text+=clamp
                }

                return text
            }

            $(".article_link a").each(function(i) {

                var id = $(this).data('id')
                var val = $(this)

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "GET",
                    url: "/get_article_link",
                    data: {"id": id}
                }).done(function (data) {

                    var date = new Date(data.created_at);
                    var year = (date.getFullYear());
                    var month = (date.getMonth() + 1);
                    var day = (date.getDate());

                    var textData = data.text;
                    console.log(textData);
                    var number = textData.indexOf('</style>', 0)
                    textData = textData.slice(number).replace(/(<([^>]+)>)/gi, '');
                    console.log(textData);
                    textData = textTrim(textData, 45);
                    console.log(textData);

                    val.append('<div class="inner_wrap"><div class="img_wrap"><img src="'+data.thumb_image+'" alt=""></div><div class="text_wrap"><p class="title js-textTrim">'+textTrim(data.title, 26)+'</p><p class="text js-textTrim">'+textData+'</p><div class="date_wrap"><p>'+year+'年'+month+'月'+day+'日</p></div></div></div>')
                    console.log(data);
                }).fail(function (XMLHttpRequest, status, e) {
                    console.log('failed');
                    // alert(e);
                });
            });
        });


        textTrim();
    </script>

@endsection
