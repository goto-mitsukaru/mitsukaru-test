$(function () {
    var lock = true;
    var isOpen = false;
    $('.category_btn').hide();
    $('.movie_btn, .movie_edit_btn').show();
    $('#edit_lock_wrap').on('click', function () {
        lock = !lock;
        let image = document.getElementById("edit_lock");
        image.src = lock ? "/images/icon_lock.png" : "/images/icon_unlock.png";
        if (lock) {
            $('.category_btn').hide();
            $('.bg_input').css('border-bottom', 'none');
        } else {
            $('.category_btn').show();
            $('.bg_input').css('border-bottom', '1px solid #595959');
        }
    });

    $('.movie_edit_btn').on('click', function () {
        $('#edit_bg_wrap').css('display', 'block');
        var id = $(this).data('id');
        movieDataShow(id);
    });

    $('#movie_create_btn').on('click', function () {
        $('#create_bg_wrap').css('display', 'block');
    });

    $('.modal_close').on('click', function () {
        $('#create_bg_wrap').css('display', 'none');
        $('#edit_bg_wrap').css('display', 'none');
        $('#img_bg_wrap').css('display', 'none');
    });

    // 新規登録ボタン
    $('#image_create_btn').on('click', function () {
        $('#img_bg_wrap, .modal_container').css('display', 'block');
        $('#image_create').text('登録');
        $('#delete_img, .change_container').css('display', 'none');
        $('#image_src').attr('src','');
        $('#image_href').attr('href','').css('display', 'none');
        $('#img_file, #image_name').val('');
        $('#image_id').val('0');
    });

    // 編集ボタン
    $('.edit_img_btn').on('click', function () {
        $('#img_bg_wrap, .change_container').css('display', 'block');
        $('#image_create').text('登録');
        $('.modal_container').css('display', 'none');
        $('#delete_img').css('display', 'block');
        var id = $(this).data('id');
        $('#image_id').val(id);
        imageDataShow(id);
    });

    $('#set_img_delete').on('click', function () {
        $('#image_src').attr('src','');
        $('#image_href').attr('href','');
        $('#img_file').val('');
    });

    $('.media_url_btn').on('click', function () {
        var id = $(this).data('id');
        var media_link = '#media_url_' + id;
        $(media_link).select();
        document.execCommand('copy');
    });

    $('#img_file').on('change', function (e) {
        $('.modal_container').css('display', 'none');
        $('.change_container').css('display', 'block');
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#image_src").attr('src', e.target.result);
            $('#image_href').attr('href',e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    });

    function imageDataShow(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "/admin/ajax/edit_image",
            data: {"id": id}

        }).done(function (data) {
            var name = data.image.name;
            var src = data.image.src;
            $('#image_name').val(name);
            $('#image_src').attr('src',src);
            $('#image_href').attr('href',src).css('display', 'block');
            $('#image_id').val(id);
            console.log(name, src);

        }).fail(function (XMLHttpRequest, status, e) {
            alert(e);
        });
    }

    function movieDataShow(id) {
        $('#movie_id').val(id);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "/admin/ajax/edit_modal",
            data: {"id": id}

        }).done(function (data) {
            var title = data.movie.title;
            var src = data.movie.src;
            $('#movie_title').val(title);
            $('#movie_src').val(src);
            $('#img_file').val(src);
            console.log(title, src);

        }).fail(function (XMLHttpRequest, status, e) {
            alert(e);
        });
    }
});

function check() {
    var flag = 0;
    if (!document.add_form.category.value.trim()) {
        flag = 1;
    }
    // 設定終了
    if (flag) {
        window.alert('必須項目に未入力がありました');
        return false;
    } else {
        let checkSaveFlg = window.confirm("この内容で送信しますか？");

        if (checkSaveFlg) {
            return true;
        } else {
            return false;
        }
    }
}

var preview = false;

function previewDown() {
    preview = true;
}

function check_article() {
    if (preview) {
        preview = false;
        return true;
    } else {
        let checkSaveFlg = window.confirm("この内容で送信しますか？");

        if (checkSaveFlg) {
            return true;
        } else {
            return false;
        }
    }
}

$(function () {
    setInterval(function () {
        $('.msg_wrap').fadeOut();
    }, 5000);
});

// $(function () {
//     this.resizeTextarea = () => {
//
//         // textarea要素のpaddingのY軸(高さ)
//         const PADDING_Y = 16;
//
//         // textarea要素
//         const $textarea = document.getElementById("edit_text");
//
//         // textareaそ要素のlineheight
//         let lineHeight = getComputedStyle($textarea).lineHeight;
//         // "19.6px" のようなピクセル値が返ってくるので、数字だけにする
//         lineHeight = lineHeight.replace(/[^-\d\.]/g, '');
//
//         // textarea要素に入力された値の行数
//         const lines = ($textarea.value + '\n').match(/\n/g).length;
//
//         // 高さを再計算
//         $textarea.style.height = lineHeight * lines + PADDING_Y + 'px';
//     };
// });

//テキストフィールドが未入力ならサブミットボタンを無効
$(function () {
    var $submit_btn = $('.edit_btn');
    var $title_field = $('#edit_title');
    var $text_field = $('#edit_text');
    var title_count = $title_field.val().length;
    var text_count = $text_field.val().length; //テキストフィールドの文字の長さを変数にする
    var slugBool = true;


    if (title_count === 0) {
        $submit_btn.prop("disabled", true);
        $submit_btn.css("opacity", "0.4");
    } else {
        $submit_btn.prop("disabled", false);
        $submit_btn.css("opacity", "1");
    }

    $title_field.on('keyup', function () {
        title_count = $title_field.val().length;
        text_count = $text_field.val().length;
        validate(title_count, text_count, slugBool);
    });

    $text_field.on('keyup', function () {
        title_count = $title_field.val().length;
        text_count = $text_field.val().length;
        validate(title_count, text_count, slugBool);
    });

    // スラッグに/がある場合は登録不可
    $('#edit_slug').on('keyup', function () {
        title_count = $title_field.val().length;
        text_count = $text_field.val().length;

        if ($(this).val().indexOf('/') >= 0) {
            $('#notice_edit_slug').slideDown();
            slugBool = false;
        }
        else {
            $('#notice_edit_slug').slideUp();
            slugBool = true;
        }
        validate(title_count, text_count, slugBool);
    });

    let validate = (title, text, slug) => {
        if (title >= 1 && text >= 1 && slug) {
            $submit_btn.prop("disabled", false); //もし文字数が１以上かつスラッグに/がないなら送信ボタンを表示
            $submit_btn.css("opacity", "1");
        } else {
            $submit_btn.prop("disabled", true); //それ以外は送信ボタンを非表示
            $submit_btn.css("opacity", "0.7");
        }
    }
});
