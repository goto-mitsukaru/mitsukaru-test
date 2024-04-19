$(function(){
  // 「【経営セミナー（management_seminar）】自動日程更新システム」スプレットシートから発行されるURLを指定
    $.get('https://script.google.com/macros/s/AKfycbwD-OH5HNzBAUzeylceuDnU0bv8-jNCQtC8LWtzn_dqni0X0MZByDPgcp5qn3wEGW-w/exec', function(textData) {
        // 渋谷1段目（1回目）
        if (textData.Shibuya1_B && textData.Shibuya1_C && textData.Shibuya1_D) {
        $('#Shibuya1_B').text(textData.Shibuya1_B);
        $('#Shibuya1_C').text(textData.Shibuya1_C);
        $('#Shibuya1_D').text(textData.Shibuya1_D);
        date1_Shibuya1 = textData.Shibuya1_A + "/" + textData.Shibuya1_B + "/" + textData.Shibuya1_C + "(" +  textData.Shibuya1_D + ")渋谷会場";
        $('.date1_Shibuya_first').val(date1_Shibuya1);
        } else {
        $('.date1_Shibuya_first').parent('div').remove();
        }
        // 渋谷2段目（1回目）
        if (textData.Shibuya2_B && textData.Shibuya2_C && textData.Shibuya2_D) {
        $('#Shibuya2_B').text(textData.Shibuya2_B);
        $('#Shibuya2_C').text(textData.Shibuya2_C);
        $('#Shibuya2_D').text(textData.Shibuya2_D);
        date1_Shibuya2 = textData.Shibuya2_A + "/" + textData.Shibuya2_B + "/" + textData.Shibuya2_C + "(" +  textData.Shibuya2_D + ")渋谷会場";
        $('.date1_Shibuya_second').val(date1_Shibuya2);
        } else {
        $('.date1_Shibuya_second').parent('div').remove();
        }
        // 渋谷3段目（1回目）
        if (textData.Shibuya3_B && textData.Shibuya3_C && textData.Shibuya3_D) {
        $('#Shibuya3_B').text(textData.Shibuya3_B);
        $('#Shibuya3_C').text(textData.Shibuya3_C);
        $('#Shibuya3_D').text(textData.Shibuya3_D);
        date1_Shibuya3 = textData.Shibuya3_A + "/" + textData.Shibuya3_B + "/" + textData.Shibuya3_C + "(" +  textData.Shibuya3_D + ")渋谷会場";
        $('.date1_Shibuya_third').val(date1_Shibuya3);
        } else {
        $('.date1_Shibuya_third').parent('div').remove();
        }
        // 渋谷4段目（1回目）
        if (textData.Shibuya4_B && textData.Shibuya4_C && textData.Shibuya4_D) {
          $('#Shibuya4_B').text(textData.Shibuya4_B);
          $('#Shibuya4_C').text(textData.Shibuya4_C);
          $('#Shibuya4_D').text(textData.Shibuya4_D);
          date1_Shibuya4 = textData.Shibuya4_A + "/" + textData.Shibuya4_B + "/" + textData.Shibuya4_C + "(" +  textData.Shibuya4_D + ")渋谷会場";
          $('.date1_Shibuya_fourth').val(date1_Shibuya4);
        } else {
          $('.date1_Shibuya_fourth').parent('div').remove();
        }
        // 渋谷5段目（1回目）
        if (textData.Shibuya5_B && textData.Shibuya5_C && textData.Shibuya5_D) {
          $('#Shibuya5_B').text(textData.Shibuya5_B);
          $('#Shibuya5_C').text(textData.Shibuya5_C);
          $('#Shibuya5_D').text(textData.Shibuya5_D);
          date1_Shibuya5 = textData.Shibuya5_A + "/" + textData.Shibuya5_B + "/" + textData.Shibuya5_C + "(" +  textData.Shibuya5_D + ")渋谷会場";
          $('.date1_Shibuya_fifth').val(date1_Shibuya5);
        } else {
          $('.date1_Shibuya_fifth').parent('div').remove();
        }
  
        // 渋谷1段目（2回目）
        if (textData.Shibuya1_F && textData.Shibuya1_G && textData.Shibuya1_H) {
          $('#Shibuya1_F').text(textData.Shibuya1_F);
          $('#Shibuya1_G').text(textData.Shibuya1_G);
          $('#Shibuya1_H').text(textData.Shibuya1_H);
          date2_Shibuya1 = textData.Shibuya1_E + "/" + textData.Shibuya1_F + "/" + textData.Shibuya1_G + "(" +  textData.Shibuya1_H + ")渋谷会場";
          $('.date2_Shibuya_first').val(date2_Shibuya1);
        } else {
          $('.date2_Shibuya_first').parent('div').remove();
        }
        // 渋谷2段目（2回目）
        if (textData.Shibuya2_F && textData.Shibuya2_G && textData.Shibuya2_H) {
        $('#Shibuya2_F').text(textData.Shibuya2_F);
        $('#Shibuya2_G').text(textData.Shibuya2_G);
        $('#Shibuya2_H').text(textData.Shibuya2_H);
        date2_Shibuya2 = textData.Shibuya2_E + "/" + textData.Shibuya2_F + "/" + textData.Shibuya2_G + "(" +  textData.Shibuya2_H + ")渋谷会場";
        $('.date2_Shibuya_second').val(date2_Shibuya2);
        } else {
        $('.date2_Shibuya_second').parent('div').remove();
        }
        // 渋谷3段目（2回目）
        if (textData.Shibuya3_F && textData.Shibuya3_G && textData.Shibuya3_H) {
        $('#Shibuya3_F').text(textData.Shibuya3_F);
        $('#Shibuya3_G').text(textData.Shibuya3_G);
        $('#Shibuya3_H').text(textData.Shibuya3_H);
        date2_Shibuya3 = textData.Shibuya3_E + "/" + textData.Shibuya3_F + "/" + textData.Shibuya3_G + "(" +  textData.Shibuya3_H + ")渋谷会場";
        $('.date2_Shibuya_third').val(date2_Shibuya3);
        } else {
        $('.date2_Shibuya_third').parent('div').remove();
        }
        // 渋谷4段目（2回目）
        if (textData.Shibuya4_F && textData.Shibuya4_G && textData.Shibuya4_H) {
          $('#Shibuya4_F').text(textData.Shibuya4_F);
          $('#Shibuya4_G').text(textData.Shibuya4_G);
          $('#Shibuya4_H').text(textData.Shibuya4_H);
          date2_Shibuya4 = textData.Shibuya4_E + "/" + textData.Shibuya4_F + "/" + textData.Shibuya4_G + "(" +  textData.Shibuya4_H + ")渋谷会場";
          $('.date2_Shibuya_fourth').val(date2_Shibuya4);
        } else {
          $('.date2_Shibuya_fourth').parent('div').remove();
        }
        // 渋谷5段目（2回目）
        if (textData.Shibuya5_F && textData.Shibuya5_G && textData.Shibuya5_H) {
          $('#Shibuya4_F').text(textData.Shibuya5_F);
          $('#Shibuya4_G').text(textData.Shibuya5_G);
          $('#Shibuya4_H').text(textData.Shibuya5_H);
          date2_Shibuya5 = textData.Shibuya5_E + "/" + textData.Shibuya5_F + "/" + textData.Shibuya5_G + "(" +  textData.Shibuya5_H + ")渋谷会場";
          $('.date2_Shibuya_fifth').val(date2_Shibuya5);
        } else {
          $('.date2_Shibuya_fifth').parent('div').remove();
        }
        
  
        // 名古屋1段目（1回目）
        if (textData.Nagoya1_B && textData.Nagoya1_C && textData.Nagoya1_D) {
        $('#Nagoya1_B').text(textData.Nagoya1_B);
        $('#Nagoya1_C').text(textData.Nagoya1_C);
        $('#Nagoya1_D').text(textData.Nagoya1_D);
        date1_Nagoya1 = textData.Nagoya1_A + "/" + textData.Nagoya1_B + "/" + textData.Nagoya1_C + "(" +  textData.Nagoya1_D + ")名古屋会場";
        $('.date1_Nagoya_first').val(date1_Nagoya1);
        } else {
        $('.date1_Nagoya_first').parent('div').remove();
        }
        // 名古屋2段目（1回目）
        if (textData.Nagoya2_B && textData.Nagoya2_C && textData.Nagoya2_D) {
        $('#Nagoya2_B').text(textData.Nagoya2_B);
        $('#Nagoya2_C').text(textData.Nagoya2_C);
        $('#Nagoya2_D').text(textData.Nagoya2_D);
        date1_Nagoya2 = textData.Nagoya2_A + "/" + textData.Nagoya2_B + "/" + textData.Nagoya2_C + "(" +  textData.Nagoya2_D + ")名古屋会場";
        $('.date1_Nagoya_second').val(date1_Nagoya2);
        } else {
        $('.date1_Nagoya_second').parent('div').remove();
        }
        // 名古屋3段目（1回目）
        if (textData.Nagoya3_B && textData.Nagoya3_C && textData.Nagoya3_D) {
        $('#Nagoya3_B').text(textData.Nagoya3_B);
        $('#Nagoya3_C').text(textData.Nagoya3_C);
        $('#Nagoya3_D').text(textData.Nagoya3_D);
        date1_Nagoya3 = textData.Nagoya3_A + "/" + textData.Nagoya3_B + "/" + textData.Nagoya3_C + "(" +  textData.Nagoya3_D + ")名古屋会場";
        $('.date1_Nagoya_third').val(date1_Nagoya3);
        } else {
        $('.date1_Nagoya_third').parent('div').remove();
        }
        // 名古屋4段目（1回目）
        if (textData.Nagoya4_B && textData.Nagoya4_C && textData.Nagoya4_D) {
          $('#Nagoya4_B').text(textData.Nagoya4_B);
          $('#Nagoya4_C').text(textData.Nagoya4_C);
          $('#Nagoya4_D').text(textData.Nagoya4_D);
          date1_Nagoya4 = textData.Nagoya4_A + "/" + textData.Nagoya4_B + "/" + textData.Nagoya4_C + "(" +  textData.Nagoya4_D + ")渋谷会場";
          $('.date1_Nagoya_fourth').val(date1_Nagoya4);
        } else {
          $('.date1_Nagoya_fourth').parent('div').remove();
        }
        // 名古屋5段目（1回目）
        if (textData.Nagoya5_B && textData.Nagoya5_C && textData.Nagoya5_D) {
          $('#Nagoya5_B').text(textData.Nagoya5_B);
          $('#Nagoya5_C').text(textData.Nagoya5_C);
          $('#Nagoya5_D').text(textData.Nagoya5_D);
          date1_Nagoya5 = textData.Nagoya5_A + "/" + textData.Nagoya5_B + "/" + textData.Nagoya5_C + "(" +  textData.Nagoya5_D + ")渋谷会場";
          $('.date1_Nagoya_fifth').val(date1_Nagoya5);
        } else {
          $('.date1_Nagoya_fifth').parent('div').remove();
        }
  
        // 名古屋1段目（2回目）
        if (textData.Nagoya1_F && textData.Nagoya1_G && textData.Nagoya1_H) {
        $('#Nagoya1_F').text(textData.Nagoya1_F);
        $('#Nagoya1_G').text(textData.Nagoya1_G);
        $('#Nagoya1_H').text(textData.Nagoya1_H);
        date2_Nagoya1 = textData.Nagoya1_E + "/" + textData.Nagoya1_F + "/" + textData.Nagoya1_G + "(" +  textData.Nagoya1_H + ")名古屋会場";
        $('.date2_Nagoya_first').val(date2_Nagoya1);
        } else {
        $('.date2_Nagoya_first').parent('div').remove();
        }
        // 名古屋2段目（2回目）
        if (textData.Nagoya2_F && textData.Nagoya2_G && textData.Nagoya2_H) {
        $('#Nagoya2_F').text(textData.Nagoya2_F);
        $('#Nagoya2_G').text(textData.Nagoya2_G);
        $('#Nagoya2_H').text(textData.Nagoya2_H);
        date2_Nagoya2 = textData.Nagoya2_E + "/" + textData.Nagoya2_F + "/" + textData.Nagoya2_G + "(" +  textData.Nagoya2_H + ")名古屋会場";
        $('.date2_Nagoya_second').val(date2_Nagoya1);
        } else {
        $('.date2_Nagoya_second').parent('div').remove();
        }
        // 名古屋3段目（2回目）
        if (textData.Nagoya3_F && textData.Nagoya3_G && textData.Nagoya3_H) {
        $('#Nagoya3_F').text(textData.Nagoya3_F);
        $('#Nagoya3_G').text(textData.Nagoya3_G);
        $('#Nagoya3_H').text(textData.Nagoya3_H);
        date2_Nagoya3 = textData.Nagoya3_E + "/" + textData.Nagoya3_F + "/" + textData.Nagoya3_G + "(" +  textData.Nagoya3_H + ")名古屋会場";
        $('.date2_Nagoya_third').val(date2_Nagoya1);
        } else {
        $('.date2_Nagoya_third').parent('div').remove();
        }
        // 名古屋4段目（2回目）
        if (textData.Nagoya4_F && textData.Nagoya4_G && textData.Nagoya4_H) {
          $('#Nagoya4_F').text(textData.Nagoya4_F);
          $('#Nagoya4_G').text(textData.Nagoya4_G);
          $('#Nagoya4_H').text(textData.Nagoya4_H);
          date2_Nagoya4 = textData.Nagoya4_E + "/" + textData.Nagoya4_F + "/" + textData.Nagoya4_G + "(" +  textData.Nagoya4_H + ")渋谷会場";
          $('.date2_Nagoya_fourth').val(date2_Nagoya4);
        } else {
          $('.date2_Nagoya_fourth').parent('div').remove();
        }
        // 名古屋5段目（2回目）
        if (textData.Nagoya5_F && textData.Nagoya5_G && textData.Nagoya5_H) {
          $('#Nagoya5_F').text(textData.Nagoya5_F);
          $('#Nagoya5_G').text(textData.Nagoya5_G);
          $('#Nagoya5_H').text(textData.Nagoya5_H);
          date2_Nagoya5 = textData.Nagoya5_E + "/" + textData.Nagoya5_F + "/" + textData.Nagoya5_G + "(" +  textData.Nagoya5_H + ")渋谷会場";
          $('.date2_Nagoya_fifth').val(date2_Nagoya5);
        } else {
          $('.date2_Nagoya_fifth').parent('div').remove();
        }
        
  
        // 大阪1段目（1回目）
        if (textData.Osaka1_B && textData.Osaka1_C && textData.Osaka1_D) {
        $('#Osaka1_B').text(textData.Osaka1_B);
        $('#Osaka1_C').text(textData.Osaka1_C);
        $('#Osaka1_D').text(textData.Osaka1_D);
        date1_Osaka1 = textData.Osaka1_A + "/" + textData.Osaka1_B + "/" + textData.Osaka1_C + "(" +  textData.Osaka1_D + ")大阪会場";
        $('.date1_Osaka_first').val(date1_Osaka1);
        } else {
        $('.date1_Osaka_first').parent('div').remove();
        }
        // 大阪2段目（1回目）
        if (textData.Osaka2_B && textData.Osaka2_C && textData.Osaka2_D) {
        $('#Osaka2_B').text(textData.Osaka2_B);
        $('#Osaka2_C').text(textData.Osaka2_C);
        $('#Osaka2_D').text(textData.Osaka2_D);
        date1_Osaka2 = textData.Osaka2_A + "/" + textData.Osaka2_B + "/" + textData.Osaka2_C + "(" +  textData.Osaka2_D + ")大阪会場";
        $('.date1_Osaka_second').val(date1_Osaka2);
        } else {
        $('.date1_Osaka_second').parent('div').remove();
        }
        // 大阪3段目（1回目）
        if (textData.Osaka3_B && textData.Osaka3_C && textData.Osaka3_D) {
        $('#Osaka3_B').text(textData.Osaka3_B);
        $('#Osaka3_C').text(textData.Osaka3_C);
        $('#Osaka3_D').text(textData.Osaka3_D);
        date1_Osaka3 = textData.Osaka3_A + "/" + textData.Osaka3_B + "/" + textData.Osaka3_C + "(" +  textData.Osaka3_D + ")大阪会場";
        $('.date1_Osaka_third').val(date1_Osaka3);
        } else {
        $('.date1_Osaka_third').parent('div').remove();
        }
        // 大阪4段目（1回目）
        if (textData.Osaka4_B && textData.Osaka4_C && textData.Osaka4_D) {
          $('#Osaka4_B').text(textData.Osaka4_B);
          $('#Osaka4_C').text(textData.Osaka4_C);
          $('#Osaka4_D').text(textData.Osaka4_D);
          date1_Osaka4 = textData.Osaka4_A + "/" + textData.Osaka4_B + "/" + textData.Osaka4_C + "(" +  textData.Osaka4_D + ")渋谷会場";
          $('.date1_Osaka_fourth').val(date1_Osaka4);
        } else {
          $('.date1_Osaka_fourth').parent('div').remove();
        }
        // 大阪5段目（1回目）
        if (textData.Osaka5_B && textData.Osaka5_C && textData.Osaka5_D) {
          $('#Osaka5_B').text(textData.Osaka5_B);
          $('#Osaka5_C').text(textData.Osaka5_C);
          $('#Osaka5_D').text(textData.Osaka5_D);
          date1_Osaka5 = textData.Osaka5_A + "/" + textData.Osaka5_B + "/" + textData.Osaka5_C + "(" +  textData.Osaka5_D + ")渋谷会場";
          $('.date1_Osaka_fifth').val(date1_Osaka5);
        } else {
          $('.date1_Osaka_fifth').parent('div').remove();
        }
  
        // 大阪1段目（2回目）
        if (textData.Osaka1_F && textData.Osaka1_G && textData.Osaka1_H) {
        $('#Osaka1_F').text(textData.Osaka1_F);
        $('#Osaka1_G').text(textData.Osaka1_G);
        $('#Osaka1_H').text(textData.Osaka1_H);
        date2_Osaka1 = textData.Osaka1_E + "/" + textData.Osaka1_F + "/" + textData.Osaka1_G + "(" +  textData.Osaka1_H + ")大阪会場";
        $('.date2_Osaka_first').val(date2_Osaka1);
        } else {
        $('.date2_Osaka_first').parent('div').remove();
        }
        // 大阪2段目（2回目）
        if (textData.Osaka2_F && textData.Osaka2_G && textData.Osaka2_H) {
        $('#Osaka2_F').text(textData.Osaka2_F);
        $('#Osaka2_G').text(textData.Osaka2_G);
        $('#Osaka2_H').text(textData.Osaka2_H);
        date2_Osaka2 = textData.Osaka2_E + "/" + textData.Osaka2_F + "/" + textData.Osaka2_G + "(" +  textData.Osaka2_H + ")大阪会場";
        $('.date2_Osaka_second').val(date2_Osaka2);
        } else {
        $('.date2_Osaka_second').parent('div').remove();
        }
        // 大阪3段目（2回目）
        if (textData.Osaka3_F && textData.Osaka3_G && textData.Osaka3_H) {
        $('#Osaka3_F').text(textData.Osaka3_F);
        $('#Osaka3_G').text(textData.Osaka3_G);
        $('#Osaka3_H').text(textData.Osaka3_H);
        date2_Osaka3 = textData.Osaka3_E + "/" + textData.Osaka3_F + "/" + textData.Osaka3_G + "(" +  textData.Osaka3_H + ")大阪会場";
        $('.date2_Osaka_third').val(date2_Osaka3);
        } else {
        $('.date2_Osaka_third').parent('div').remove();
        }
        // 大阪4段目（2回目）
        if (textData.Osaka4_F && textData.Osaka4_G && textData.Osaka4_H) {
          $('#Osaka4_F').text(textData.Osaka4_F);
          $('#Osaka4_G').text(textData.Osaka4_G);
          $('#Osaka4_H').text(textData.Osaka4_H);
          date2_Osaka4 = textData.Osaka4_E + "/" + textData.Osaka4_F + "/" + textData.Osaka4_G + "(" +  textData.Osaka4_H + ")渋谷会場";
          $('.date2_Osaka_fourth').val(date2_Osaka4);
        } else {
          $('.date2_Osaka_fourth').parent('div').remove();
        }
        // 大阪5段目（2回目）
        if (textData.Osaka5_F && textData.Osaka5_G && textData.Osaka5_H) {
          $('#Osaka5_F').text(textData.Osaka5_F);
          $('#Osaka5_G').text(textData.Osaka5_G);
          $('#Osaka5_H').text(textData.Osaka5_H);
          date2_Osaka5 = textData.Osaka5_E + "/" + textData.Osaka5_F + "/" + textData.Osaka5_G + "(" +  textData.Osaka5_H + ")渋谷会場";
          $('.date2_Osaka_fifth').val(date2_Osaka5);
        } else {
          $('.date2_Osaka_fifth').parent('div').remove();
        }
  
        // 博多1段目（1回目）
        if (textData.Hakata1_B && textData.Hakata1_C && textData.Hakata1_D) {
        $('#Hakata1_B').text(textData.Hakata1_B);
        $('#Hakata1_C').text(textData.Hakata1_C);
        $('#Hakata1_D').text(textData.Hakata1_D);
        date1_Hakata1 = textData.Hakata1_A + "/" + textData.Hakata1_B + "/" + textData.Hakata1_C + "(" +  textData.Hakata1_D + ")博多会場";
        $('.date1_Hakata_first').val(date1_Hakata1);
        } else {
        $('.date1_Hakata_first').parent('div').remove();
        }
        // 博多2段目（1回目）
        if (textData.Hakata2_B && textData.Hakata2_C && textData.Hakata2_D) {
        $('#Hakata2_B').text(textData.Hakata2_B);
        $('#Hakata2_C').text(textData.Hakata2_C);
        $('#Hakata2_D').text(textData.Hakata2_D);
        date1_Hakata2 = textData.Hakata2_A + "/" + textData.Hakata2_B + "/" + textData.Hakata2_C + "(" +  textData.Hakata2_D + ")博多会場";
        $('.date1_Hakata_second').val(date1_Hakata2);
        } else {
        $('.date1_Hakata_second').parent('div').remove();
        }
        // 博多3段目（1回目）
        if (textData.Hakata3_B && textData.Hakata3_C && textData.Hakata3_D) {
        $('#Hakata3_B').text(textData.Hakata3_B);
        $('#Hakata3_C').text(textData.Hakata3_C);
        $('#Hakata3_D').text(textData.Hakata3_D);
        date1_Hakata3 = textData.Hakata3_A + "/" + textData.Hakata3_B + "/" + textData.Hakata3_C + "(" +  textData.Hakata3_D + ")博多会場";
        $('.date1_Hakata_third').val(date1_Hakata3);
        } else {
        $('.date1_Hakata_third').parent('div').remove();
        }
        // 博多4段目（1回目）
        if (textData.Hakata4_B && textData.Hakata4_C && textData.Hakata4_D) {
          $('#Hakata4_B').text(textData.Hakata4_B);
          $('#Hakata4_C').text(textData.Hakata4_C);
          $('#Hakata4_D').text(textData.Hakata4_D);
          date1_Hakata4 = textData.Hakata4_A + "/" + textData.Hakata4_B + "/" + textData.Hakata4_C + "(" +  textData.Hakata4_D + ")渋谷会場";
          $('.date1_Hakata_fourth').val(date1_Hakata4);
        } else {
          $('.date1_Hakata_fourth').parent('div').remove();
        }
        // 博多5段目（1回目）
        if (textData.Hakata5_B && textData.Hakata5_C && textData.Hakata5_D) {
          $('#Hakata5_B').text(textData.Hakata5_B);
          $('#Hakata5_C').text(textData.Hakata5_C);
          $('#Hakata5_D').text(textData.Hakata5_D);
          date1_Hakata5 = textData.Hakata5_A + "/" + textData.Hakata5_B + "/" + textData.Hakata5_C + "(" +  textData.Hakata5_D + ")渋谷会場";
          $('.date1_Hakata_fifth').val(date1_Hakata5);
        } else {
          $('.date1_Hakata_fifth').parent('div').remove();
        }
  
        // 博多1段目（2回目）
        if (textData.Hakata1_F && textData.Hakata1_G && textData.Hakata1_H) {
        $('#Hakata1_F').text(textData.Hakata1_F);
        $('#Hakata1_G').text(textData.Hakata1_G);
        $('#Hakata1_H').text(textData.Hakata1_H);
        date2_Hakata1 = textData.Hakata1_E + "/" + textData.Hakata1_F + "/" + textData.Hakata1_G + "(" +  textData.Hakata1_H + ")博多会場";
        $('.date2_Hakata_first').val(date2_Hakata1);
        } else {
        $('.date2_Hakata_first').parent('div').remove();
        }
        // 博多2段目（2回目）
        if (textData.Hakata2_F && textData.Hakata2_G && textData.Hakata2_H) {
        $('#Hakata2_F').text(textData.Hakata2_F);
        $('#Hakata2_G').text(textData.Hakata2_G);
        $('#Hakata2_H').text(textData.Hakata2_H);
        date2_Hakata2 = textData.Hakata2_E + "/" + textData.Hakata2_F + "/" + textData.Hakata2_G + "(" +  textData.Hakata2_H + ")博多会場";
        $('.date2_Hakata_second').val(date2_Hakata2);
        } else {
        $('.date2_Hakata_second').parent('div').remove();
        }
        // 博多3段目（2回目）
        if (textData.Hakata3_F && textData.Hakata3_G && textData.Hakata3_H) {
        $('#Hakata3_F').text(textData.Hakata3_F);
        $('#Hakata3_G').text(textData.Hakata3_G);
        $('#Hakata3_H').text(textData.Hakata3_H);
        date2_Hakata3 = textData.Hakata3_E + "/" + textData.Hakata3_F + "/" + textData.Hakata3_G + "(" +  textData.Hakata3_H + ")博多会場";
        $('.date2_Hakata_third').val(date2_Hakata3);
        } else {
        $('.date2_Hakata_third').parent('div').remove();
        }
        // 博多4段目（2回目）
        if (textData.Hakata4_F && textData.Hakata4_G && textData.Hakata4_H) {
          $('#Hakata4_F').text(textData.Hakata4_F);
          $('#Hakata4_G').text(textData.Hakata4_G);
          $('#Hakata4_H').text(textData.Hakata4_H);
          date2_Hakata4 = textData.Hakata4_E + "/" + textData.Hakata4_F + "/" + textData.Hakata4_G + "(" +  textData.Hakata4_H + ")渋谷会場";
          $('.date2_Hakata_fourth').val(date2_Hakata4);
        } else {
          $('.date2_Hakata_fourth').parent('div').remove();
        }
        // 博多5段目（2回目）
        if (textData.Hakata5_F && textData.Hakata5_G && textData.Hakata5_H) {
          $('#Hakata5_F').text(textData.Hakata5_F);
          $('#Hakata5_G').text(textData.Hakata5_G);
          $('#Hakata5_H').text(textData.Hakata5_H);
          date2_Hakata5 = textData.Hakata5_E + "/" + textData.Hakata5_F + "/" + textData.Hakata5_G + "(" +  textData.Hakata5_H + ")渋谷会場";
          $('.date2_Hakata_fifth').val(date2_Hakata5);
        } else {
          $('.date2_Hakata_fifth').parent('div').remove();
        }
  
    }).fail(function(error) {
    console.error('テキストデータの取得に失敗しました2:', error);
    });
  });
  
  // トップ日程表選択可能ボタン制御
$(function () {
    // 1.2.3列目のinputを取得
    // var firstSelect = $('.p-top-form__input.--first');
    var secondSelect = $('.p-top-form__input.--second');
    var thirdSelect = $('.p-top-form__input.--third');
    // 2.3列目のコンテンツを取得
    // var targetSecond  = $('.js-target-second');
    var targetThird = $('.js-target-third');
    // 1.2.3列目のth要素を取得
    // var firstTh = $('.p-top-form__th.--first');
    var secondTh = $('.p-top-form__th.--second');
    var thirdTh = $('.p-top-form__th.--third');
    $(document).ready(function() {
      var isPageLoaded = sessionStorage.getItem('isPageLoaded');
      if (!isPageLoaded) {
          // 2.3番目の列のopacityを薄くする処理
      targetThird.addClass('js-disabled');
      secondTh.addClass('js-content');
      sessionStorage.setItem('isPageLoaded', 'true');
      } else {
        // ページが再読み込みされた場合にsessionStorageをクリア
        sessionStorage.clear();
      }
    });
    // ヘルパー関数：日付文字列を日付オブジェクトに変換
    function parseDate(dateString) {
        // ここで正しい日付フォーマットに変換
        var dateMatch = dateString.match(/(\d{4})\/(\d{1,2})\/(\d{1,2})/);
        if (dateMatch) {
          var year = parseInt(dateMatch[1]);
          var month = parseInt(dateMatch[2]) - 1; // 月は0から11で表現されるため
          var day = parseInt(dateMatch[3]);
          return new Date(year, month, day);
        }
        // マッチしない場合はエラーとして処理するか、適切なデフォルト値を設定するなどの対処を行う
        // この例ではエラーの場合はnullを返す
        return null;
      }
      function firstSelectClickHandler() {
        var secondSelect = $('.p-top-form__input.--second');    
        var thirdSelect = $('.p-top-form__input.--third');
      thirdSelect.removeAttr("checked").prop("checked", false).change();
      targetThird.removeClass('js-disabled');
  
      secondTh.removeClass('js-content');
      thirdTh.addClass('js-content');

      var secondValue = $(this).val();
        // console.log("secondValue:");
        // console.log(secondValue);
        thirdSelect.each(function () {
          var currentValue = $(this).val().trim();
          var secondDate = parseDate(secondValue.substring(0, 10));
          var currentDate = parseDate(currentValue.substring(0, 10));
          if (secondDate < currentDate || (currentValue.indexOf('受講後に決める') !== -1)) {
            $(this).removeClass('js-disabled');
            $(this).prop('disabled', false);
          } else {
            $(this).addClass('js-disabled');
            $(this).prop('disabled', true);
          }
        });
      // }
    };
    secondSelect.on('click', firstSelectClickHandler);
  
    function addClassToCheckedInputs() {
      var checkedInputs = $('.p-top-form__tbody .p-top-form__input:checked');
      var checkedInputsAll = $('.p-top-form__tbody .p-top-form__input');
      var checkedInputsSubmit = $('.p-top-form__input--submit');
      
      // 各フォームセット内で3つの要素にクラスを追加
      if (checkedInputs.length === 2) {
        checkedInputsAll.removeClass('js-finalized');
        checkedInputs.addClass('js-finalized');
        checkedInputsSubmit.animate({ backgroundColor: "#052362", color: "#ffffff" }, 0);
      } else {
        checkedInputsAll.removeClass('js-finalized');
        checkedInputsSubmit.animate({ backgroundColor: "#DBDBDB", color: "#231815" }, 0);
      }
    }
    // ページ読み込み時にクラスを追加
    $(document).ready(function() {
      addClassToCheckedInputs();
    });
    // チェックボックスの変更を監視し、クラスを更新
    $('.p-top-form__input').on('change', function () {
      addClassToCheckedInputs();
    });
    
  });