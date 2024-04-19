jQuery(function($){
  'use strict';

  // 都道府県&市区町村
  var $prefecture = $('[name="pref"]');
  var $city = $('[name="city"]');
  var $cityOther = $('[name="add_text"]');
  var $zip = $('input[name="postal"]');
  var prefectureMap = {
    '北海道': 1,
    '青森県': 2, '岩手県': 3, '宮城県': 4, '秋田県': 5, '山形県': 6, '福島県': 7,
    '茨城県': 8, '栃木県': 9, '群馬県': 10, '埼玉県': 11, '千葉県': 12, '東京都': 13, '神奈川県': 14,
    '新潟県': 15, '富山県': 16, '石川県': 17, '福井県': 18, '山梨県': 19, '長野県': 20,
    '岐阜県': 21, '静岡県': 22, '愛知県': 23,
    '三重県': 24, '滋賀県': 25, '京都府': 26, '大阪府': 27, '兵庫県': 28, '奈良県': 29, '和歌山県': 30,
    '鳥取県': 31, '島根県': 32, '岡山県': 33, '広島県': 34, '山口県': 35,
    '徳島県': 36, '香川県': 37, '愛媛県': 38, '高知県': 39,
    '福岡県': 40, '佐賀県': 41, '長崎県': 42, '熊本県': 43, '大分県': 44, '宮崎県': 45, '鹿児島県': 46,
    '沖縄県': 47
  };
  var prefCityMap = null;
  // 都道府県の初期値を検索ワードによって変更する
  var defaultPrefecture = '';
  var utmKeyword = '';
  var queryParameters = decodeURIComponent(location.search.substring(1)).split('&');
  for (var i in queryParameters) {
    if (queryParameters[i].indexOf('utm_keyword') > -1) {
      utmKeyword = queryParameters[i].split('=')[1];
      break;
    }
  }
  if (utmKeyword) {
    for (var prefecture in prefectureMap) {
      if (utmKeyword.indexOf(prefecture.substring(0, prefecture.length - 1)) > -1) {
        defaultPrefecture = prefecture;
        break;
      }
    }
  }
  $prefecture.val(defaultPrefecture);

  // 市区町村選択肢を都道府県により切り替える
  var changeCityOptions = function(pref) {
    $city.empty();
    var prefCode = prefectureMap[pref];
    var cityOptions = '<option value="">-- 選択してください --</option>';
    var cities = prefCityMap[prefCode];
    for (var i in cities) {
      cityOptions += '<option value="' + cities[i] + '">' + cities[i] + '</option>';
    }
    $city.append($(cityOptions));
  }

  if ($city.prop('tagName').toLowerCase() === 'select') {
    // 市区町村選択肢を都道府県により切り替える
    $.ajax({
      type: 'GET',
      url: '/assets/api/cities.php',
      async: false,
    }).done(function(x, y, z) {
      prefCityMap = x;
      changeCityOptions(defaultPrefecture);
      $prefecture.on('change', function() {
        changeCityOptions($(this).val());
      });
    }).fail(function(x, y, z) {
      // 市区町村をテキストボックスに変更する
      var $cityText = $('<input type="text" size="60" maxlength="20" />');
      var cityClass = $city.attr('class').replace('select', 'input');
      var handsTriggerNum = $city.data('handsTriggerNum');
      $cityText.attr('class', cityClass);
      $cityText.attr('name', $city.attr('name'));
      if (handsTriggerNum) {
        $cityText.attr('data-hands-trigger-num', handsTriggerNum);
      }
      $cityText.insertBefore($city);
      $city.parent().find('[class*="select-arrow"]').remove();
      $city.remove();
    });
  }

  var fillAddress = function(item) {
    $zip.val(item.zip_code);
    $prefecture.val(item.city_pref_name);
    changeCityOptions(item.city_pref_name);
    $city.val(item.city_name);
    $cityOther.val(item.city_detail);
  }

  // 郵便番号による住所入力補助
  $zip.autocomplete({
    delay: 20,
    minLength: 7,
    position: {
      at: "right top"
    },
    source: function(request, response) {
      var zipVal = $zip.val();
      $.ajax({
        type: 'GET',
        url: '/assets/api/getAddressByZip.php?zip=' + zipVal
      }).done(function(res) {
        var items = $.map($.parseJSON(res), function(item) {
          return {
            //label: item.zip_code + '：' + item.city_pref_name + item.city_name + item.city_detail,
            zip_code: item.zip_code,
            city_pref: item.city_pref,
            city_pref_name: item.city_pref_name,
            city_name: item.city_name,
            city_detail: item.city_detail,
            city_id: item.city_id

        }});
        var itemsLength = items.length;
        if (!itemsLength) {
          response(items);
          return false;
        }
        if (itemsLength === 1) {
          fillAddress(items[0]);
        }
        response(items);
      });
    },
    select: function(event, ui) {
      fillAddress(ui.item);
      return false;
    }
  });
});
