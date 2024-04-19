
// よくある質問エリアアコーディオン
$(function(){
    const faqItems = document.querySelectorAll('.js-FAQ__item');
  
      faqItems.forEach(item => {
        item.addEventListener('click', () => {
          // アクティブクラスのトグル
          item.classList.toggle('is-active');
  
          // 表示制御
          const answer = item.querySelector('.p-FAQ__A');
          answer.classList.toggle('is-open');
  
          // 他の要素のアクティブクラスと表示をリセット
          faqItems.forEach(otherItem => {
            if (otherItem !== item) {
              otherItem.classList.remove('is-active');
              const otherAnswer = otherItem.querySelector('.p-FAQ__A');
              otherAnswer.classList.remove('is-open');
            }
          });
        });
      });
  });


  // PC幅ヘッダーナビホバーでアコーディオン出現
$(function(){
    var parent = document.querySelectorAll(".js-header-ac");
    var node = Array.prototype.slice.call(parent, 0);
  
    node.forEach(function (element) {
      element.addEventListener(
        "mouseover",
        function () {
          // element.querySelector(".js-header-ac--contents").classList.add("active");
          $(this).find(".js-header-ac--contents").addClass("active");
        },
        false
      );
      element.addEventListener(
        "mouseout",
        function () {
          // element.querySelector(".js-header-ac--contents").classList.remove("active");
          $(this).find(".js-header-ac--contents").removeClass("active");
        },
        false
      );
    });
  });


  // SPナビゲーションメニュー内のクリックアコーディオン
$(function () {
    // $('.c-nav-list--child').css("display", "none");
    $('.c-nav-list.--accordion').on('click', function () {
      $(this).next().slideToggle();
  
      if( $(this).hasClass('js-arrow') == true ){
        $(this).removeClass('js-arrow');
        $(this).addClass('js-arrow--down');
       } else {
          $(this).addClass('js-arrow');
          $(this).removeClass('js-arrow--down');
        }
    });
    // カリキュラムエリアボタンクリックで開く
    $('.js-ac').on('click', function() {
      var findElm = $(this).next(".l-cur-wrap__inner");
      findElm.slideDown(500);
      $(this).hide();
    });
    // 最初のカリキュラムエリアボタをクリックした場合はスライダーも初期化する
    $('.js-ac.--first-seminar').on('click', function() {
      var findElm = $(this).next(".l-cur-wrap__inner");
      findElm.slideDown(500);
      $('#js-slider').slick('unslick');
      $('#js-slider').slick({
        arrows: true,
        dots: true,
        centerMode: true,
        centerPadding: '5%',
        initialSlide: 0, // 最初のスライドを指定
        infinite: false, // スライドのループを無効にする
      });
      $(this).hide();
    });
    // カリキュラムエリア閉じるボタンクリックで開く
    $('.js-ac-close').on('click', function() {
      var findElm = $(this).closest('.l-cur-wrap__inner');
      var findElmParent = $(this).closest('.l-cur-wrap.js-offset');
      var findElmButton = $(this).closest('.l-cur-wrap.js-offset').find('.c-cur-wrap__inner');
      if (findElm.is(':visible')) {
          $("html,body").animate({scrollTop:findElmParent.offset().top - 100},"fast","swing");
          findElmButton.show();
          findElm.slideUp(500);
      }
    });
  });

$(document).ready(function() {
  // 特定の場所まで来たらヘッダーを上からフェードイン
  $(function () {
    var thisOffset;
    var hasLoaded = sessionStorage.getItem('hasLoaded');
  
    if (hasLoaded) {
      // 既に読み込みが完了していた場合、スクロールイベントをトリガー
      $(window).trigger('scroll');
    } else {
      $(window).on('load', function () {
        thisOffset = $('#anc-merit').offset().top + $('#anc-merit').outerHeight();
        sessionStorage.setItem('hasLoaded', true);
        $(window).trigger('scroll');
      });
    }
    $(window).scroll(function () {
      thisOffset = $('#anc-merit').offset().top + $('#anc-merit').outerHeight();
      if ($(window).scrollTop() + $(window).height() > thisOffset) {
        $('.js-fadeUp-top').fadeIn(300);
      } else {
        $('.js-fadeUp-top').fadeOut(300);
      }
    });
  });

    // merit横スクロールアニメーション
  $(function () {
      let isContentVisible = false;
      
      let section_bar_pos = $('.js-meritMove-child').offset().top;

      // console.log('\nsection_bar_pos\n');
      // console.log(section_bar_pos);

      let scrollTop = 0;
    
      function animateContent() {
        scrollTop = $(window).scrollTop();

      // console.log('\nscrollTop\n');
      // console.log(scrollTop);

        let winH = $(window).height();
        let section_bar_now;
    
        if (isContentVisible) {
          // 公式
          if (navigator.userAgent.match(/iPhone|Android.+Mobile/) || $(window).width() < 768) {
            section_bar_now = (1 - (section_bar_pos - scrollTop) / winH) * 150;
            $('.js-meritMove-child').css('left', 'calc(' + section_bar_now + '% - 250px)');
          } else {
            section_bar_now = (1 - (section_bar_pos - scrollTop) / winH) * 80;
            $('.js-meritMove-child').css('left', 'calc(' + section_bar_now + '% - 100px)');
          }
        }
      }
      window.addEventListener('scroll', () => {
        if (!isContentVisible) {
          const animatedContent = document.querySelector('.animatedContent');
          const windowHeight = window.innerHeight;
          const contentPosition = animatedContent.getBoundingClientRect().top;
          
          if (contentPosition - windowHeight <= 0) {
            isContentVisible = true;
          }
        }
        requestAnimationFrame(animateContent);
      });
    });
    
    // faq横スクロールアニメーション
    $(function () {
      let isContentVisibleFaq = false;
      let section_bar_posFaq = $('.js-faqMove-child').offset().top;

      // console.log('\nsection_bar_posFaq\n');
      //   console.log(section_bar_posFaq);

      let scrollTopFaq = 0;
      function animateContentFaq() {
        scrollTopFaq = $(window).scrollTop();

        // console.log('\nscrollTopFaq\n');
        // console.log(scrollTopFaq);

        let winHFaq = $(window).height();
        
        let section_bar_nowFaq;
    
        if (isContentVisibleFaq) {
          // 公式
          if (navigator.userAgent.match(/iPhone|Android.+Mobile/) || $(window).width() < 768) {
            section_bar_nowFaq = (1 - (section_bar_posFaq - scrollTopFaq) / winHFaq) * 150;
            // $('.js-faqMove-child').css('left', 'calc(' + section_bar_nowFaq + '%  + 120%)');
            // $('.js-faqMove-child').css('left', '10%');
          } else {
            section_bar_nowFaq = (1 - (section_bar_posFaq - scrollTopFaq) / winHFaq) * 80;
            $('.js-faqMove-child').css('left', 'calc(' + section_bar_nowFaq + '% - 100px)');
          }
        }
      }
      window.addEventListener('scroll', () => {
        if (!isContentVisibleFaq) {
          const animatedContentFaq = document.querySelector('.animatedContent_faq');
          const windowHeightFaq = window.innerHeight;
          const contentPositionFaq = animatedContentFaq.getBoundingClientRect().top;
          
          if (contentPositionFaq - windowHeightFaq <= 0) {
            isContentVisibleFaq = true;
          }
        }
        requestAnimationFrame(animateContentFaq);
      });
    });
});

// 取得した要素の中から最大の幅に他の要素も合わせる
$(function(){
  const listItems = document.querySelectorAll('.js-list-range');
  let maxWidth = 0;
  // 最大の横幅を計算します
  listItems.forEach(item => {
      maxWidth = Math.max(maxWidth, item.clientWidth);
  });
  // 最大の横幅に合わせてリストの幅を調整します
  listItems.forEach(item => {
      item.style.width = `${maxWidth}px`;
  });
});