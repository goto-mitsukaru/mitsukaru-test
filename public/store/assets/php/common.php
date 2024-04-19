<?php
class Common{
    /* ======================================================================================= */
    //  メール文作成
    // ======================================================================================= */
	/* 特殊文字置換 */
	function replaceStr($subject){
	  $search = Array('Ⅰ','Ⅱ','Ⅲ','Ⅳ','Ⅴ','Ⅵ','Ⅶ','Ⅷ','Ⅸ','Ⅹ','①','②','③','④','⑤','⑥','⑦','⑧','⑨','⑩','№','㈲','㈱');
	  $replace = Array('I','II','III','IV','V','VI','VII','VIII','IX','X','(1)','(2)','(3)','(4)','(5)','(6)','(7)','(8)','(9)','(10)','No.','（有）','（株）');
	  $result = str_replace($search, $replace, $subject);
	  return $result;
	}

    /* メール本文に入力値を置換する */
    function replace_body($body, $data)
    {
        // POSTから、入力値置換
        foreach ($data as $key => $val) {
            $value = empty($val) ? "" : $this->replaceStr($val);
            $body = str_replace('{' . $key . '}', $value, $body);
        }

        // その他情報置換
        //$body = str_replace('{_date}', $date, $body);
        $body = str_replace('{_ip}', $_SERVER['REMOTE_ADDR'], $body);
        $body = str_replace('{_host}', gethostbyaddr($_SERVER['REMOTE_ADDR']), $body);
        $body = str_replace('{_ua}', $_SERVER['HTTP_USER_AGENT'], $body);

        return $body;
    }

    /* ======================================================================================= */
    //  スマホ判定
    // ======================================================================================= */
    // UA取得
    function getUserAgent()
    {
        $userAgent = isset($_SERVER['HTTP_USER_AGENT'])? $_SERVER['HTTP_USER_AGENT'] : '';

        return $userAgent;
    }


    // スマホ判定
    function isSmartPhone() {
        $ua = $this->getuserAgent();

        if (stripos($ua, 'iphone') !== false || // iphone
            stripos($ua, 'ipod') !== false || // ipod
            (stripos($ua, 'android') !== false && stripos($ua, 'mobile') !== false) || // android
            (stripos($ua, 'windows') !== false && stripos($ua, 'mobile') !== false) || // windows phone
            (stripos($ua, 'firefox') !== false && stripos($ua, 'mobile') !== false) || // firefox phone
            (stripos($ua, 'bb10') !== false && stripos($ua, 'mobile') !== false) || // blackberry 10
            (stripos($ua, 'blackberry') !== false) // blackberry
            ) {
            $isSmartPhone = true;
        } else {
            $isSmartPhone = false;
        }

        return $isSmartPhone;
    }

}
