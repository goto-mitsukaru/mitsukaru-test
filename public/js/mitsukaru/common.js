
//バーガーメニュー
$(function () {
    $(document).on('click', '.js_menu_switch', function () {
        $('.burger_menu').toggleClass('is_active')

        if ($(this).hasClass('pc')) {
            $('.back_color_black').fadeIn();
        } else $('.back_color_black').fadeOut();
    });
});

//フォームバリデーション
$(function () {
    jQuery(".form_check").validationEngine({
        promptPosition: "topLeft:0"
    });
});

//カレンダー
$(function () {

    //プロフィール
    $("#datepicker").datepicker({
        changeYear: true,
        changeMonth: true,
        yearRange: "-100:+0",
        dateFormat: "yy-m-d",
    });

    //職務経歴
    $('.job_date').monthpicker({
        changeYear: true,
        dateFormat: "yy-m",
        minDate: "-50 Y",
        maxDate: "+0 Y",
        yearRange: 'c-50:c+10', //表示する年の範囲
        monthNamesShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
    });
});

//案件 詳細ページ
$(function () {
    //画像切り替え
    $(document).on('click', '.job_img_list img', function () {
        if (!$(this).hasClass('is_active')) {
            let img = $(this).attr('src');
            $('.job_img_list img').removeClass('is_active');
            $(this).addClass('is_active');

            img = img.replace('thumb/', '');
            $('.job_main_img').attr('src', img).on('load', function () {
                $(this).fadeIn();
            })
        }
    });
});

//トップページ
$(function () {
    $('#js_top_slider').slick({
        slidesToShow: 3,
        centerMode: true,
        centerPadding: '15%',
        dots: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    centerPadding: '5%',
                }
            }
        ]
    });
});

//モーダル
$(function () {
    //プロジェクト検索 モーダル
    $(document).on('click', '.search_modal_open', function () {
        $('.back_color_black').fadeIn();
        $('.search_modal').fadeIn();
    });

    //応募取り消し
    $(document).on('click', '.cancel_modal_open', function () {
        $('.back_color_black').fadeIn();
        $('.cancel_modal').fadeIn();
    });

    //メッセージ削除
    $(document).on('click', '.js_message_delete', function () {
        $('input[name=message_id]').val($(this).data('id'))
    });
    $(document).on('click', '.delete_modal_open', function () {
        $('.back_color_black').fadeIn();
        $('.delete_modal').fadeIn();
    });

    $(document).on('click', '.back_color_black,.js_close_button', function () {
        $('.back_color_black').fadeOut();
        $('.base_modal').fadeOut();

        if ($('.burger_menu').hasClass('is_active')) $('.burger_menu').removeClass('is_active')
    });

    //確認メール送信モーダル
    $(window).on('load', function () {
        const type = $('#js_modal_trigger').val();

        if (type != undefined) {
            if (type == 'complete') $('.mail_modal').fadeIn();

            $('.back_color_black').fadeIn();
        }
    });

});


$(function () {
    $(document).on('change', 'input[type=file]', function () {
        const file = $(this).prop('files')[0];

        //アイコンの場合 画像サムネイル表示
        if ($(this).attr('id') == 'icon_image') {

            //画像以外は処理を停止
            if (!file.type.match('image.*')) {
                $(this).val('');
                return;
            }

            const reader = new FileReader();
            const self = $(this);
            reader.onload = function () {
                self.prev('img').removeClass('hide');
                self.prev('img').attr('src', reader.result);
            };
            reader.readAsDataURL(file);
        } else {
            //メッセージ ファイル添付の場合

            //100mb以上だったら
            if (file.size > 100000000) {
                alert('ファイルの容量が100MBを超えています')
                $(this).val('');
                return;
            } else {
                $('.file_choice_wrap').find('.right_area').text(file.name)
            }
        }

    });
});

//プロフィール入力
$(function () {
    //会社を選択時のみ所属会社表示
    $(document).on('change', 'input[name=work_type]', function () {
        if ($(this).val() == '1') {
            $('.js_work_type').after(`
          <dl class="js_now_company">
                <dt class="required">現在の所属会社</dt>
                <dd>
                    <input name="company_name"
                           required
                           type="text" placeholder="所属している会社名を入力して下さい">
                </dd>
          </dl>
         `)
        } else $('.js_now_company').remove()
    });
});

//応募履歴
$(function () {
    //ソート
    $(document).on('change', 'input[name=sort]', function () {
        $(this).closest('form').submit()
    });
});

//プロフィール編集
$(function () {
    //ページ内リンクスムーススクロール
    $('a[href^="#"]').on('click', function () {
        var href = $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;

        if (href == '#basic_info') position = 0
        else if (href == '#matching_needs') position = position + 230

        $("html, body").animate({scrollTop: position}, 550, "swing");

        return false;
    });
});


$(function () {
    //応募ボタン
    $('.apply_wrap .js_apply').addClass('disabled')
    $(document).on('keyup', 'textarea[name=message]', function () {
        if ($(this).val().length > 0) $('.apply_wrap .js_apply').removeClass('disabled')
        else $('.apply_wrap .js_apply').addClass('disabled')
    });
});

//プラン
$(function () {
    $(document).on('click', '.js_plan_changer', function () {
        $('.back_color_black').fadeIn();
        $('.cancel_modal').fadeIn();

        if ($(this).data('plan_id') == 2) {
            $('.subscribe_form').hide()
            $('.cancel_form').show()
        }
    });

    //プラン変更
    $(document).on('click', '.js_plan_cange_button', function () {
        //無料 → 有料
        if ($('.js_plan_changer').data('plan_id') == 1) {

            if ($('input[name=paymentMethods]').length > 0) {
                $('#paid_plan_form').submit()
            } else {
                $('.cancel_modal').fadeOut();
                $('.stripe_modal').fadeIn();
            }
        }
        //有料 → 無料
        else {
            $('.cancel_form').submit()
        }
    });

    $(document).on('click', '.js_open_text', function () {
        $(this).prev('p').show()
        $(this).hide()
    });

    //利用規約 チェックされてるか
    $(document).on('change', '.terms_check', function () {
        $('button[value=mail_send]').toggleClass('disabled');
    });
});

//lp
$(function () {
    //lp 企業リスト
    $('.js_company_list').slick({
        autoplay: true, //自動でスクロール
        autoplaySpeed: 0, //自動再生のスライド切り替えまでの時間を設定
        speed: 2000, //スライドが流れる速度を設定
        cssEase: "linear", //スライドの流れ方を等速に設定
        swipe: false, // 操作による切り替えはさせない
        arrows: false, //矢印非表示
        pauseOnFocus: false, //スライダーをフォーカスした時にスライドを停止させるか
        pauseOnHover: false, //スライダーにマウスホバーした時にスライドを停止させるか
        variableWidth: true//スライドの要素の幅をcssで設定できるようにする
    });

    $('#js_lp_slider').slick({
        autoplay: true,
        slidesToShow: 1,
        centerMode: true,
        centerPadding: '25%',
        dots: false,
        arrows: false,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    centerPadding: '10%',
                }
            }
        ]
    });

    $(document).on('click', '.js_company_modal_open', function () {
        $('.back_color_black').fadeIn();
        $('.company_modal').fadeIn();

        const data = $(this).data('val')
        const url = String(data.site_url)

        console.log($(this).data('val'))

        $('.js_company_name').text(data.name);
        $('.js_slogan').text(data.slogan);

        $('.js_about_us').html(data.about_us.replace(/\r\n/g, "<br>"));
        $('.js_point_wrap').html(data.point.replace(/\r\n/g, "<br>"));
        if (data.positions !== null) {
            $('.js_position_wrap').prev('dt').show()
            $('.js_position_wrap').html(data.positions.replace(/\r\n/g, "<br>"));
        }
        else {
            $('.js_position_wrap').prev('dt').hide()
            $('.js_position_wrap').html('');
        }
        $('.js_site_url').text(url).attr('href', url);

    });


});