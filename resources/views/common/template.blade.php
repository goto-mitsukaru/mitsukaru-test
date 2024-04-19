<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="/images/favicon.ico">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NRT8TSH7');</script>
    <!-- End Google Tag Manager -->

    <link href="/css/default.css" rel="stylesheet">
    <link href="/css/style.min.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="/css/slick-theme.css" rel="stylesheet">

    <link href="/css/top.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">


    <link href="/css/whitepaper.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">

    @if(Request::is('*/movie/list/*'))
    <link href="/css/movie-list.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    @endif
    @if($device == 'mobile')
        <link href="/css/sp_style.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
        <link href="/css/sp_article.css?<?php echo date('Ymd-Hi'); ?>" rel="stylesheet">
    @endif
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&family=Noto+Sans:ital,wght@1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script type="text/javascript" src="/js/checkbox.js"></script>
    <script type="text/javascript" src="/js/common.js"></script>
    @if(Request::is('/'))
        <meta name="facebook-domain-verification" content="jcfb9vrmcrufnh6hcnyj0raxim52bc"/>
        @if($device == "mobile")
        <script>
            $(function () {
                $('.slick_slide_1').slick({
                    dots: false,
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true,
                    centerPadding: "20%",
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
            let num = 5;
            $(window).on('load', function () {
                let wid = document.body.clientWidth;
                if (wid >= 1440) {
                    num = 5;
                } else {
                    num = 4;
                }
                $('.slick_slide_1').slick({
                    infinite: true,
                    slidesToShow: num,
                    slidesToScroll: 2,
                    dots: false,
                });
                $('.slick_slide_2').slick({
                    infinite: true,
                    slidesToShow: num,
                    slidesToScroll: 2,
                    dots: false,
                });
            });
        </script>
        @endif
    @endif
    <!-- Meta Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '876460142964164');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=876460142964164&ev=PageView&noscript=1"/></noscript>
    <!-- End Meta Pixel Code -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NRT8TSH7"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
@yield('header')
@if($device == 'mobile')
    @include('common.sp_side_menu')
@endif
@yield('content')
@yield('footer')

    @if(Request::is('*article*') && !Request::is('*article/list/*') && !Request::is('*article/list'))
        <title>@yield('title') | 税理士・科目合格者のための求人サイトMITSUKARU（ミツカル）</title>
        @if($writer != null)
            <script type="application/ld+json">
                [
                {
                  "@context": "https://schema.org",
                  "@type": "Article",
                  "mainEntityOfPage": "https://kaikeizimusyotennsyoku.com/article/{{ $article->slug }}
                /{{ $article->id }}",
                  "headline": "{{ $article->title }}",
                  "image": [
                    "{{ $article->image }}"
                   ],
                  "datePublished": "{{$article->created_at->format('Y-m-d')}}T08:00:00+08:00",
                  "dateModified": "{{ $article->updated_at ? $article->updated_at->format('Y-m-d') : now()->format('Y-m-d') }}T09:20:00+08:00",
                  "author": [{
                      "@type": "Person",
                      "name": "{{ $writer->name }}"
                    }]
                },
                {
                  "@context": "https://schema.org",
                  "@type": "BreadcrumbList",
                  "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "ホーム",
                    "item": "https://kaikeizimusyotennsyoku.com/"
                  },{
                    "@type": "ListItem",
                    "position": 2,
                    "name": "記事一覧",
                    "item": "https://kaikeizimusyotennsyoku.com/article/list"
                  },{
                    "@type": "ListItem",
                    "position": 3,
                    "name": "{{ $article->title }}",
                    "item": "https://kaikeizimusyotennsyoku.com/article/{{ $article->slug }}
                /{{ $article->id }}"
                  }]
                }
                ]
            </script>
        @endif
    @else
        <title>@yield('title')税理士・科目合格者のための求人サイトMITSUKARU（ミツカル）</title>
        @if(Request::is('*article/list/*') || Request::is('*article/list'))
            <script type="application/ld+json">
                {
                  "@context": "https://schema.org",
                  "@type": "BreadcrumbList",
                  "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "ホーム",
                    "item": "https://kaikeizimusyotennsyoku.com/"
                  },
                  {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "記事一覧"
                  }]
                }
            </script>
        @elseif(Request::is('*joblist'))
            <script type="application/ld+json">
                {
                  "@context": "https://schema.org",
                  "@type": "BreadcrumbList",
                  "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "ホーム",
                    "item": "https://kaikeizimusyotennsyoku.com/"
                  },
                  {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "求人一覧"
                  }]
                }
            </script>
        @elseif(Request::is('*jobdetail*'))
            <script type="application/ld+json">
                [
                    {
                      "@context": "https://schema.org/",
                      "@type": "JobPosting",
                      "title": "{{ $recruit->name }}",
                      "description": "{{ $recruit->content }}",
                      "hiringOrganization" : {
                        "@type": "Organization",
                        "name": "{{ $company->name ?? '企業名非公開' }}",
                        "sameAs": "{{ $company->url ?? '-' }}"
                      },
                      "datePosted": "{{ $recruit->updated_at ? $recruit->updated_at->format('Y-m-d') : $recruit->created_at->format('Y-m-d')}}",
                      "jobLocation": {
                        "@type": "Place",
                        "address": {
                            "@type":"PostalAddress",
                            "addressLocality":"{{ $company->workplace }}",
                            "addressRegion":"{{ $recruit->area_array ? $area_list[$recruit->area_id] : '-' }}",
                            "addressCountry":"JP"
                        }
                      }
                    },
                    {
                      "@context": "https://schema.org",
                      "@type": "BreadcrumbList",
                      "itemListElement": [{
                        "@type": "ListItem",
                        "position": 1,
                        "name": "ホーム",
                        "item": "https://kaikeizimusyotennsyoku.com/"
                      },
                      {
                        "@type": "ListItem",
                        "position": 2,
                        "name": "求人一覧",
                        "item": "https://kaikeizimusyotennsyoku.com/joblist"
                      },
                      {
                        "@type": "ListItem",
                        "position": 3,
                        "name": "{{ $recruit->name }}"
                      }]
                    }
                ]
        </script>
        @elseif(Request::is('/'))
            <script type="application/ld+json">
            [
                {
                    "@context": "http://schema.org",
                    "@type": "WebSite",
                    "name": "MITSUKARU",
                    "inLanguage": "jp",
                    "publisher": {
                        "@type": "Organization",
                        "name": "株式会社MITSUKARU",
                        "logo": {
                            "@type": "ImageObject",
                            "url": "https://kaikeizimusyotennsyoku.com/images/logo.png"
                        }
                    },
                    "headline": "TOP",
                    "description": "国家資格(税理士・医師・看護師)に特化した転職マッチングプラットフォームを運営。",
                    "url": "https://kaikeizimusyotennsyoku.com/"
                },
                {
                    "@context" : "https://schema.org",
                    "@type" : "Organization",
                    "name" : "株式会社ミツカル",
                    "founder":"城之内 楊",
                    "foundingDate":"設立日：2019-10-13",
                    "description" : "国家資格(税理士・医師・看護師)に特化した転職マッチングプラットフォームを運営。",
                    "url" : "https://kaikeizimusyotennsyoku.com/",
                    "address": {
                        "@type": "PostalAddress",
                        "addressLocality": "品川区上大崎",
                        "addressRegion": "東京都",
                        "postalCode": "1410021",
                        "streetAddress": "３丁目２−１ 目黒センタービル 8階",
                        "addressCountry": "JP"
                    }
                }
                @foreach($top_article_list as $article)
                    ,{
                      "@context": "https://schema.org",
                      "@type": "Article",
                      "mainEntityOfPage": "https://kaikeizimusyotennsyoku.com/article/{{$article->slug}}
                    /{{$article->id}}",
                      "headline": "{{$article->title}}",
                      "description": "{{ Str::limit($article->text, 50, '...') }}",
                      "image": [
                        "{{$article->thumb_image}}"
                       ],
                      "datePublished": "{{$article->created_at}}",
                      "dateModified": "{{$article->updated_at}}"
                    }
                @endforeach
                @foreach($other_article_list as $article)
                    @if($loop->index > 0)
                        @break
                    @endif
                    ,{
                      "@context": "https://schema.org",
                      "@type": "Article",
                      "mainEntityOfPage": "https://kaikeizimusyotennsyoku.com/article/{{$article->slug}}
                    /{{$article->id}}",
                      "headline": "{{$article->title}}",
                      "description": "{{ Str::limit($article->text, 50, '...') }}",
                      "image": [
                        "{{$article->thumb_image}}"
                       ],
                      "datePublished": "{{$article->created_at}}",
                      "dateModified": "{{$article->updated_at}}"
                    }
                @endforeach
                @foreach($new_recruit_list as $recruit)
                    @if($loop->index > 2)
                        @break
                    @endif
                    ,
                    {
                        "@context":"https://schema.org/",
                        "@type":"JobPosting",
                        "title":"{{ $recruit->name }}",
                        "description":"{{ $recruit->text ?? '-' }}",
                        "employmentType": "FULL_TIME",
                        "identifier":{
                            "@type":"PropertyValue",
                            "name":"{{ $company_list->find($recruit->company_id) ? $company_list->find($recruit->company_id)->name : '企業名非公開' }}",
                            "value":"{{ $recruit->id }}"
                        },
                        "datePosted":"{{ $recruit->created_at }}",
                        "validThrough" : "2033-03-18T00:00",
                        "hiringOrganization":{
                            "@type":"Organization",
                            "name":"{{ $company_list->find($recruit->company_id) ? $company_list->find($recruit->company_id)->name : '企業名非公開' }}",
                            "sameAs":"{{ $company_list->find($recruit->company_id) ? $company_list->find($recruit->company_id)->url : '' }}"
                        },
                        "jobLocation":{
                            "@type":"Place",
                            "address":{
                                "@type":"PostalAddress",
                                "addressLocality":"{{ $company_list->find($recruit->company_id) ? $company_list->find($recruit->company_id)->workplace : '' }}",
                                "addressRegion":"{{ $recruit->area_id ? $area_list[$recruit->area_id] : '-' }}",
                                "addressCountry":"JP"
                            }
                        }
                    }
                @endforeach
                ]
            </script>
        @endif
    @endif
</body>
</html>
