
//プロジェクトページ
$(function () {

    //応募取り消し
    $(document).on('click', '.js_delete_button', function () {
        location.href = "/";

        $.ajax({
            url: '/ajax/applyCancel',
            type: 'POST',
            data: {
                'project_id': $('#js_project_id').val(),
            },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        })
            .done(function (data) {
                $('.choice_wrap').hide()
                $('.complete_wrap').show()

            })
            .fail(function (data) {
                console.log('error');
            });
    });

    //応募
    $(document).on('click', '.js_apply', function () {

        $.ajax({
            url: '/ajax/apply',
            type: 'POST',
            data: {
                'project_id': $('#js_project_id').val(),
                'message': $('textarea[name=message]').val(),
            },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        })
            .done(function (data) {
                $('.back_color_black').fadeIn();
                $('.apply_modal').fadeIn();

               if (data == '応募失敗') {
                   $('.apply_wrap').hide();
                   $('.plan_wrap').show();
               }
               else {
                   $('.js_apply_area').hide();
                   $('.applied_wrap').show();
               }
            })
            .fail(function (data) {
                console.log('error');
            });
    });
});
