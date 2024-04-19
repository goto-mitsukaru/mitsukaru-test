//マウスオーバー色変更
//CTAボタン
// $(function () {
    // $(this).css('background-color', '#FD7F23');
    // $(this).find(".svg_arrow").css('stroke', '#FD7F23');
//     $(".bottom_btn").hover(
//         function () {
//             $(this).css('background-color', '#FD7F23');
//             $(this).find(".svg_arrow").css('stroke', '#FD7F23');
//         },
//         function () {
//             $(this).css('background-color', '#929292');
//             $(this).find(".svg_arrow").css('stroke', '#929292');
//         })
// });

//マウスクリック色変更
//リスト
$(function () {
    var style_list = [];
    var region_list = [];
    $("section ul li label > p").click(
        function () {
            console.log($("input[name='work_style']").val());
            $(this).toggleClass('click_color');
            // $(this).parent().parent('li').toggleClass('click_color_li');

            // 選択した項目を配列に入れる
            if($.inArray($(this).text(), style_list) === -1){
                style_list.push($(this).text());

                // すでに入っていた場合は削除
            }else{
                var index = style_list.indexOf($(this).text());
                style_list.splice(index, 1);
            }
            $("#style_list").val(style_list);
        })
    $('.main_content section ul.region li ul > li input').click(
        function () {
            $(this).parent('li').toggleClass('click_color').toggleClass('font_white');

            console.log($(this).val());

            // 選択した項目を配列に入れる
            if($.inArray($(this).val(), region_list) === -1){
                region_list.push($(this).val());

                // すでに入っていた場合は削除
            }else{
                var index = region_list.indexOf($(this).val());
                region_list.splice(index, 1);
            }
            $("#region_list").val(region_list);
        });
});

//TOPへ戻るボタン
$(function () {
    $('.return_btn').click(
        function () {
            $('body,html').animate({scrollTop: 0}, 1000);
        });
});

//診断に進むボタン
$(function () {
    $('a[href^="#sec_01"]').click(function () {
        const speed = 600;
        let href = $(this).attr("href");
        let target = $(href == "#" || href == "" ? "html" : href);
        let position = target.offset().top;
        $("body,html").animate({scrollTop: position}, speed, "swing");
        return false;
    });
});

$(function () {
    $('#work_form').submit(function(){
        if($("#style_list").val() === ''){
            alert('働き方を選択してください');
            return false;
        }else if($("#region_list").val() === ''){
            // alert('希望エリアを選択してください');
            // return false;11221504
        }
    })
});
