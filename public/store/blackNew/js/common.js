$(document).ready(function() {
	var pagetop = $('.pagetop');
	$(window).scroll(function () {
		if ($(this).scrollTop() > 200) {
			pagetop.fadeIn();
		} else {
			pagetop.fadeOut();
		}
	});
	pagetop.click(function () {
		$('body, html').animate({ scrollTop: 0 }, 500);
		return false;
	});

/*
	var btn_seminar_pos = $('#main-contents > .container .btn_seminar:first').offset();
	$(window).resize(function(){
		$('#main-contents > .container .btn_seminar:first').removeClass('fixed');
		btn_seminar_pos = $('#main-contents > .container .btn_seminar:first').offset();
	});
	$(window).scroll(function () {
		var offset_top = 305;
		if($(window).scrollTop() > offset_top - 10) {
			$('#btn_seminar_floating').addClass('fixed');
		} else {
			$('#btn_seminar_floating').removeClass('fixed');
		}
		if($(window).scrollTop() > btn_seminar_pos.top) {
			 $('#main-contents > .container .btn_seminar:first').addClass('fixed');
		} else {
			 $('#main-contents > .container .btn_seminar:first').removeClass('fixed');
		}
	});
*/
});

//spmenu
$('.openMenu').on('click',function(){
	$(this).addClass('close');
	$('.closeMenu').addClass('open');
	$('.slideMenu').fadeIn('first');
	$('.overLay').fadeIn('first');
});
$('.closeMenu, .modalClose, #menu ul li a').on('click', function(){
	$('.openMenu').removeClass('close');
	$(this).removeClass('open');
	$('.slideMenu').fadeOut('first');
	$('.overLay').fadeOut('first');
});



/*--- 開催日程ボタン ---*/

$('.btn_open').on('click',function(){
	$(this).addClass('close');
	$('.closeMenu').addClass('open');
	$('.slideMenu').fadeIn('first');
	$('.overLay').fadeIn('first');
});


$(function(){
  $("#fix_cnt .btn_open").click(function(){
    $('#fix_cnt .inner_cnt').toggleClass("active");
    $(this).toggleClass("open");
    if($("#fix_cnt .btn_open").hasClass('open')){
        $(this).html('閉じる')
    } else if (!$("#fix_cnt .btn_open").hasClass('open')){
        $(this).html('<span class="big">開催日程</span>はこちら');
    }
  });
  $("#fix_cnt .btn_close").click(function(){
    $('#fix_cnt .inner_cnt').removeClass("active");
    $('#fix_cnt .btn_open').removeClass("open");
    $('#fix_cnt .btn_open').html('<span class="big">開催日程</span>はこちら');
  });
});

$(function(){
var ww= (window.innerWidth || document.documentElement.clientWidth || 0);
if(ww<750){

$(window).on('load scroll', function(){
  if ($(window).scrollTop() > 100) {
    $('#fix_cnt .btn_open').addClass("slide_in");
    $('.tel_box.sp').addClass("slide_in");
   } else {
    $('#fix_cnt .btn_open').removeClass("slide_in");
    $('.tel_box.sp').removeClass("slide_in");
   }
});

$(function(){
$("#fix_cnt .btn_open").click(function(){
    if($("#fix_cnt .btn_open").hasClass('open')){
    $(this).html('閉じる')
    } else if (!$("#fix_cnt .btn_open").hasClass('open')){
    $(this).html('<span class="big">開催日程</span>');
    }
    });
});

}
});



