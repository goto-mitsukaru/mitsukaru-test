//マウスオーバー色変更
//CTAボタン
$(function () {
    $('.main_content section ul.region > li > p').on('click', function(){
       $(this).next().toggleClass('sp_accordion');
    });
});