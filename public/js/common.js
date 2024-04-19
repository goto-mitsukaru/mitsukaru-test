$(function () {
    var isOpen = false;

    $('.slide_tab ul > li').click(function () {
        var index = $('.slide_tab ul > li').index(this);
        console.log(index);
        $('.slide_tab li, .slide_image .slide_wrap').removeClass('active');
        $(this).addClass('active');
        $('.slide_image .slide_wrap').eq(index).addClass('active');
    });

    $('.sp_menu_btn').click(function () {
        if (!isOpen) {
            console.log('click1');
            $('.sp_menu_modal').css('display', 'block');
            $(this).addClass('open');
            isOpen = !isOpen;
        } else {
            $('.sp_menu_modal').css('display', 'none');
            $(this).removeClass('open');
            isOpen = !isOpen;
        }
    });

    $('.sp_open_detail').click(function () {
        console.log('click2');
        $(this).toggleClass('active');
        $(this).next('.plus_ul').toggleClass('active');
    });
});

jQuery(function ($) {
    // 目次の出力に使用する変数
    var toc = '<p>この記事の目次</p><ul>';
    // 目次の階層の判断に使用する変数
    var hierarchy;
    // h2・h3の判断に使用する変数
    var element = 0;
    // 目次の項目数をカウントする変数
    var count = 0;
    var sec_num = '';
    var sec_id = '';

    $('.main_text h2').each(function () {
        // 目次の項目数のカウントを増加
        count++;
        if (count < 10) {
            sec_num = '0' + count;
        }
        // h2・h3タグにIDの属性値を指定
        this.id = 'sec' + sec_num;

        // 現在のループで扱う要素を判断する条件分岐
        if (this.nodeName === 'H2') {
            element = 0;

            if (count === 1) {
                sec_id = ''
                $(this).before(sec_id);
            } else if (count > 1) {
                sec_id = ''
                $(this).before(sec_id);
            }
        } else {
            element = 1;
        }

        // 現在の状態を判断する条件分岐
        if (hierarchy === element) { // h2またはh3がそれぞれ連続する場合
            toc += '</li>';
        } else if (hierarchy < element) { // h2の次がh3となる場合
            toc += '<ul>';
            hierarchy = 1;
        } else if (hierarchy > element) { // h3の次がh2となる場合
            toc += '</li></ul></li>';
            hierarchy = 0;
        } else if (count === 1) { // 最初の項目の場合
            hierarchy = 0;
        }

        // 目次の項目を作成。※次のループで<li>の直下に<ol>タグを出力する場合ががあるので、ここでは<li>タグを閉じていません。
        toc += '<li><a href="#' + this.id + '">' + '<span>' + count + '</span>' + '&nbsp;' + $(this).html() + '</a>';
    });

    // 目次の最後の項目をどの要素から作成したかにより、タグの閉じ方を変更
    if (element === 0) {
        toc += '</li></ul>';
    } else if (element === 1) {
        toc += '</li></ul></li></ul>';
    }

    // ページ内のh2・h3タグが3つ以上の場合に目次を出力
    if (count < 1) {
        $('#toc').remove();
    } else {
        $('#toc').html(toc);
    }
});

$(function () {
    $(".spot_allCheck").change(function () {
        var isChecked = $(this).prop("checked");

        $(this).parent().next('ul').find("input:checkbox").prop('checked', isChecked).toggleClass("active", isChecked);
        $(this).toggleClass("active", isChecked);
    });

    $(".child_input").change(function () {
        var isChecked = $(this).prop("checked");

        $(this).toggleClass("active", isChecked);

        var spotCheck = $(this).parent().parent('.area_ul').prev('.local').find('.spot_allCheck');
        var allChildChecked = spotCheck.parent().next('ul').find("input.child_input:checked").length === spotCheck.parent().next('ul').find("input.child_input").length;

        spotCheck.prop('checked', allChildChecked).toggleClass("active", allChildChecked);

        // 1つでもチェックが外れた場合は .spot_allCheck のチェックも外す
        if (!isChecked) {
            spotCheck.prop('checked', false).removeClass("active");
        }

        var areaUl = $(this).closest('.area_ul');
        var allChildInputs = areaUl.find(".child_input");
        var allChecked = allChildInputs.length === allChildInputs.filter(":checked").length;

        if (allChecked) {
            areaUl.prev('.local').find('.spot_allCheck').prop('checked', true).addClass("active");
        }
    });

    $("input[type=checkbox]:not(.child_input)").change(function () {
        if ($(this).prop("checked") == true) {
            $(this).addClass("active");
        } else {
            $(this).removeClass("active");
        }
    });

    $('.btn-show-filter').on('click', function () {
        $('.search-filter').addClass("show");
    });

    $('.search-filter .close').on('click', function () {
        $('.search-filter').removeClass("show");
    });
});


let pome =
    {
        "@context": "https:\/\/schema.org",
        "@graph": [{
            "@type": "BreadcrumbList",
            "@id": "https:\/\/mypace-outdoor.com\/#breadcrumblist",
            "itemListElement": [{
                "@type": "ListItem",
                "@id": "https:\/\/mypace-outdoor.com\/#listItem",
                "position": 1,
                "item": {
                    "@type": "WebPage",
                    "@id": "https:\/\/mypace-outdoor.com\/",
                    "name": "\u30db\u30fc\u30e0",
                    "description": "\u30de\u30a4\u30da\u30fc\u30b9\u306b\u81ea\u5206\u3089\u3057\u304f",
                    "url": "https:\/\/mypace-outdoor.com\/"
                },
                "nextItem": "https:\/\/mypace-outdoor.com\/#listItem"
            }, {
                "@type": "ListItem",
                "@id": "https:\/\/mypace-outdoor.com\/#listItem",
                "position": 2,
                "item": {
                    "@type": "WebPage",
                    "@id": "https:\/\/mypace-outdoor.com\/",
                    "name": "HOME",
                    "url": "https:\/\/mypace-outdoor.com\/"
                },
                "previousItem": "https:\/\/mypace-outdoor.com\/#listItem"
            }]
        }, {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "株式会社ミツカル",
            "founder": "城之内 楊",
            "foundingDate": "設立日：2019-10-13",
            "description": "国家資格(税理士・医師・看護師)に特化した転職マッチングプラットフォームを運営。",
            "url": "https://kaikeizimusyotennsyoku.com/",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "品川区上大崎",
                "addressRegion": "東京都",
                "streetAddress": "３丁目２−１ 目黒センタービル 8階",
                "addressCountry": "JP"
            }
        }, {
            "@context": "http://schema.org",
            "@type": "website",
            "name": "税理士・科目合格者のための求人サイトMITSUKARU（ミツカル）",
            "inLanguage": "jp", //ウェブサイトの言語
            "publisher": {
                "@type": "Organization",
                "name": "株式会社MITSUKARU",
            },
            "headline": "税理士・科目合格者のための求人サイトMITSUKARU（ミツカル）",
            "description": "国家資格(税理士・医師・看護師)に特化した転職マッチングプラットフォームを運営。",
            "url": "https://kaikeizimusyotennsyoku.com/"
        }
        ]
    }


pome =
    {
        "@context": "http://schema.org",
        "@type": "website",
        "name": "税理士・科目合格者のための求人サイトMITSUKARU（ミツカル）",
        "inLanguage": "jp",
        "publisher": {
            "@type": "Organization",
            "name": "株式会社MITSUKARU",
            "logo": {
                "@type": "ImageObject",
                "url": "https://seory.info/wp-content/uploads/2019/10/logo2.png"
            }
        },
        "headline": "TOP",
        "description": "国家資格(税理士・医師・看護師)に特化した転職マッチングプラットフォームを運営。",
        "url": "https://kaikeizimusyotennsyoku.com/"
    }


