// header
$(function() {
  var $win = $(window),
      $header = $('header'),
      animationClass = 'is-animation';
  $win.on('load scroll', function() {
    var value = $(this).scrollTop();
    if ( value > 100 ) {
      $header.addClass(animationClass);
    } else {
      $header.removeClass(animationClass);
    }
  });
});

// gNav
$(function() {
  $('#navToggle').click(function() {
      $(this).toggleClass('active');
      if ($(this).hasClass('active')) {
          $('#gNav').addClass('active');
      } else {
          $('#gNav').removeClass('active');
      }
  });
  $('#manu a[href]').on('click', function(event) {
      $('#navToggle').trigger('click');
  });
});

$(function() {
  $('#navToggle').click(function() {
      $("#header").toggleClass("h_active");
      if ($("#header").hasClass('h_active')) {
          $('#header').addClass('h_active');
      } else {
          $('#header').removeClass('h_active');
      }
  });
});

// animation
$(function(){
    $(window).scroll(function (){
        $('.fadein').each(function(){
            var elemPos = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > elemPos - windowHeight + 100){
                $(this).addClass('scrollin');
            }
        });
    });
});

// more btn
var show = 4;//最初に表示する件数
var num = 2;//clickごとに表示したい件数
var contents = '#show_box li';// 対象のlist
$(contents + ':nth-child(n + ' + (show + 1) + ')').addClass('is-hidden');
$('.more').on('click', function () {
  $(contents + '.is-hidden').slice(0, num).removeClass('is-hidden');
  if ($(contents + '.is-hidden').length == 0) {
    $('.more').fadeOut();
  }
});
