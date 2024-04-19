// $(function() {
//   var pagetop = $('#pagetop');
//   pagetop.hide();
//   //スクロールが100に達したらボタン表示
//   $(window).scroll(function () {
//     if ($(this).scrollTop() > 100) {
//       pagetop.fadeIn();
//     } else {
//       pagetop.fadeOut();
//     }
//   });

// });

//スムーズスクロール
jQuery(function(){
  var headerHight = $("#header").outerHeight();
  $("a").click(function() {
      var href = $(this).attr("href");
      var target = $(href == "#" || href == "" ? "body" : href);
      var position = target.offset().top - headerHight;
      $("html, body").animate({ scrollTop: position }, 500, "swing");
      //return false;
  });
});
