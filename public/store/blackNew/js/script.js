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
      if (($(this).attr("type") === "checkbox")) {
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

  $(document).ready(function () {
    // チェックボックスが変更されたときの処理
    $('input[type="checkbox"]').change(function () {
      // 変更されたチェックボックスのname属性と同じvalue属性の中から条件を適用する
      var changedName = $(this).attr('name');
      // var thisInputGroup = $('input[name="' + changedName + '"]');
      var changedValue = $(this).val();
      // 変更されたチェックボックスが「どれもあてはまらない」かどうかをチェック
      var isNoneSelected = (changedValue === "どれもあてはまらない" && $(this).is(':checked'));
      // 変更されたチェックボックスが「どれもあてはまらない」の場合
      if (isNoneSelected) {
        // 他のチェックボックスを全て非選択状態にする
        $('input[type="checkbox"][name="' + changedName + '"]').not('[value="どれもあてはまらない"]').prop('checked', false);
        $('input[type="checkbox"][name="' + changedName + '"]').not('[value="どれもあてはまらない"]').siblings('input[name="score[]"]').prop('checked', false);
      } else {
        // 変更されたチェックボックスが選択されているかどうかをチェック
        var isChangedSelected = $(this).is(':checked');
        // 変更されたチェックボックスが選択されている場合
        if (isChangedSelected) {
          // 「どれもあてはまらない」のチェックボックスを非選択状態にする
          $('input[type="checkbox"][name="' + changedName + '"][value="どれもあてはまらない"]').prop('checked', false);
          $('input[type="checkbox"][name="' + changedName + '"][value="どれもあてはまらない"]').siblings('input[name="score[]"]').prop('checked', false);
        }
      }
    });
  });

  //inputチェックでスコアinputにもチェック
  $(function () {
    $(`li.p-form-list__li`).click(function () {
      var input = $(this).find('input');
      if (input.attr("type") === "checkbox") {
        $(this).find('input:checked').each(function () {
          $(this).siblings('input[name="score[]"]').prop('checked', true);
        });
        $(this).parent().find('input:not(:checked)').each(function () {
          $(this).siblings('input[name="score[]"]').prop('checked', false);
        });
      } else {
        $(this).find('input:checked').each(function () {
          $(this).siblings('input[name="score[]"]').prop('checked', true);
        });
        $(this).siblings('li.p-form-list__li').find('input:not(:checked)').each(function () {
          $(this).siblings('input[name="score[]"]').prop('checked', false);
        });
      }

    });
  });
  //selectチェックでスコアinputにもチェック
  $(function () {
    $('.js-select-change1 select').change(function () {
      var selectedValue = $(this).val();
      $('.js-select-change1 input[type="checkbox"]').prop('checked', false); // すべてのチェックボックスをクリア
      // 選択されたオプションの値に基づいてチェックボックスを選択
      switch (selectedValue) {
        case '残業なし':
          $('.js-select-change1 input.js-select-input1').prop('checked', true);
          break;
        case '1～10時間未満':
          $('.js-select-change1 input.js-select-input2').prop('checked', true);
          break;
        case '10～20時間未満':
          $('.js-select-change1 input.js-select-input3').prop('checked', true);
          break;
        case '21～30時間未満':
          $('.js-select-change1 input.js-select-input4').prop('checked', true);
          break;
        case '31～40時間未満':
          $('.js-select-change1 input.js-select-input5').prop('checked', true);
          break;
        case '41～50時間未満':
          $('.js-select-change1 input.js-select-input6').prop('checked', true);
          break;
        case '50時間以上':
          $('.js-select-change1 input.js-select-input7').prop('checked', true);
          break;
      }
    });
    $('.js-select-change2 select').change(function () {
      var selectedValue = $(this).val();
      $('.js-select-change2 input[type="checkbox"]').prop('checked', false); // すべてのチェックボックスをクリア
      // 選択されたオプションの値に基づいてチェックボックスを選択
      switch (selectedValue) {
        case '残業なし':
          $('.js-select-change2 input.js-select-input1').prop('checked', true);
          break;
        case '1～10時間未満':
          $('.js-select-change2 input.js-select-input2').prop('checked', true);
          break;
        case '10～20時間未満':
          $('.js-select-change2 input.js-select-input3').prop('checked', true);
          break;
        case '21～30時間未満':
          $('.js-select-change2 input.js-select-input4').prop('checked', true);
          break;
        case '31～40時間未満':
          $('.js-select-change2 input.js-select-input5').prop('checked', true);
          break;
        case '41～50時間未満':
          $('.js-select-change2 input.js-select-input6').prop('checked', true);
          break;
        case '50時間以上':
          $('.js-select-change2 input.js-select-input7').prop('checked', true);
          break;
      }
    });
  });

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
