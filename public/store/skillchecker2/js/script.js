$(document).ready(function () {
  // URLにパラメータを追加する関数
  function updateURLParameter(url, paramValue) {
    var newURL = url;
    var hashIndex = url.indexOf('#');
    if (hashIndex !== -1) {
      newURL = url.substring(0, hashIndex);
    }
    // パラメータが既に存在する場合は置換、存在しない場合は追加
    var regExp = new RegExp('(\\?|&)' + 'area' + '=.*?(&|$)');
    if (url.match(regExp)) {
      newURL = url.replace(regExp, '$1' + 'area' + '=' + paramValue + '$2');
    } else {
      if (newURL.indexOf('?') !== -1) {
        newURL += '&';
      } else {
        newURL += '?';
      }
      newURL += 'area' + '=' + paramValue;
    }
    return newURL;
  }

  // 初回のページロード時にもエリアの選択状態を確認する
  $(".p-main-form__inner").each(function () {
    checkRadioSelection($(this));
    checkSelectSelection($(this));
  });
  // ラジオボタンが変更されたときにもチェックを行う
  $(".p-main-form__inner .p-form-list__input").on("change", function () {
    var currentArea = $(this).closest(".p-main-form__inner");
    checkRadioSelection(currentArea);
  });
  // 各エリアが表示されたときに選択状態を確認する関数
  function checkRadioSelection(currentArea) {
    var nextButton = currentArea.find(".p-form-button");
    // var backButton = currentArea.find(".p-form-button--back");
    var isAllSelected = true;
    currentArea.find(".p-form-list__input").each(function () {
      var groupName = $(this).attr("name");
      console.log("1");
      if ((currentArea.find('input[type="radio"]').length > 0)) {
        if (currentArea.find(":radio[name='" + groupName + "']:checked").length === 0) {
          isAllSelected = false;
          console.log("2");
        }
      }
      if ((currentArea.find('input[type="checkbox"]').length > 0)) {
        if (currentArea.find(":checkbox[name='" + groupName + "']:checked").length === 0) {
          isAllSelected = false;
          console.log("3");
        }
      }
    });
    if (isAllSelected) {
      nextButton.removeClass("disabled");
      console.log("4");
    } else {
      nextButton.addClass("disabled");
      console.log("5");
    }
  }

  // セレクトボタンが変更されたときにもチェックを行う
  $(".p-main-form__inner .p-main-select").on("change", function () {
    var currentArea = $(this).closest(".p-main-form__inner");
    checkSelectSelection(currentArea);
  });
  function checkSelectSelection(currentArea) {
    var nextButton = currentArea.find(".p-form-button");
    var isAllSelected = true;

    currentArea.find(".p-main-select").each(function () {
      var selectedValue = $(this).val();
      // console.log(selectedValue);
      if (selectedValue === "unanswered") {
        isAllSelected = false;
      }
      if (isAllSelected) {
        nextButton.removeClass("disabled");
        $(this).removeClass("disabled");
        console.log('tmp1');
      } else {
        nextButton.addClass("disabled");
        $(this).addClass("disabled");
        console.log('tmp2');
      }
    });
  }



  $(".p-form-button.js-next").on("click", function () {
    var currentArea = $(this).closest(".p-main-form__inner");
    currentArea.hide();
    currentArea.next().show();
    $("html, body").animate({ scrollTop: currentArea.next().offset().top }, "slow");

    // ボタンが押されたときにパラメータを更新
    var currentURL = window.location.href;
    var areaNumber = currentArea.next().index() + 1;
    var updatedURL = updateURLParameter(currentURL, areaNumber);
    history.pushState({}, '', updatedURL);
    checkRadioSelection(currentArea.next());
    checkSelectSelection(currentArea.next());
  });

  $(".p-form-button--back").on("click", function () {
    var currentArea = $(this).closest(".p-main-form__inner");
    currentArea.hide();
    currentArea.prev().show();

    // 戻るボタンが押されたときにパラメータを更新
    var currentURL = window.location.href;
    var areaNumber = currentArea.prev().index() + 1;
    var updatedURL = updateURLParameter(currentURL, areaNumber);
    history.pushState({}, '', updatedURL);

    checkRadioSelection(currentArea.prev());
    checkSelectSelection(currentArea.prev());
  });



  // ページロード時に自動的に ?area=1 を付与
  var currentURL = window.location.href;
  if (currentURL.indexOf('area=') === -1) {
    var updatedURL = updateURLParameter(currentURL, 1);
    history.replaceState({}, '', updatedURL);
  }

   // ページ離脱ポップアップ
  // changeFlg = true;
  // var currentPageURL = window.location.href;
  // $(window).on('beforeunload', function() {
  //   if (changeFlg) {
  //     return "ページを移動しようとしています。\n入力した内容が失われますがよろしいですか？";
  //   }
  // });
  // // $("form input, form textarea, form select").change(function() {
  // //   changeFlg = true;
  // // });
  // $("input[type=submit]").click(function() {
  //   changeFlg = false;
  // });
  // if (currentPageURL.indexOf('thanks.html') !== -1) {
  //   changeFlg = false;
  // }
});
