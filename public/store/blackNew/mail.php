<?php header("Content-Type:text/html;charset=utf-8");?>
<?php //error_reporting(E_ALL | E_STRICT);
##-----------------------------------------------------------------------------------------------------------------##
#
#  PHPメールプログラム【Mail05】　ファイル添付版　要PHP5以上
#　改造や改変は自己責任で行ってください。
#
#  今のところ特に問題点はありませんが、不具合等がありましたら下記までご連絡ください。
#  MailAddress: info@php-factory.net
#  name: K.Numata
#  HP: http://www.php-factory.net/
#
#  重要！！サイトでチェックボックスを使用する場合のみですが。。。
#  チェックボックスを使用する場合はinputタグに記述するname属性の値を必ず配列の形にしてください。
#  例　name="当サイトをしったきっかけ[]"  として下さい。
#  nameの値の最後に[と]を付ける。じゃないと複数の値を取得できません！
#
##-----------------------------------------------------------------------------------------------------------------##
if (version_compare(PHP_VERSION, '5.1.0', '>=')) { //PHP5.1.0以上の場合のみタイムゾーンを定義
    date_default_timezone_set('Asia/Tokyo'); //タイムゾーンの設定（日本以外の場合には適宜設定ください）
}

/*-------------------------------------------------------------------------------------------------------------------
 * ★以下設定時の注意点
 * ・値（=の後）は数字以外の文字列（一部を除く）はダブルクオーテーション「"」、または「'」で囲んでいます。
 * ・これをを外したり削除したりしないでください。後ろのセミコロン「;」も削除しないください。
 * ・また先頭に「$」が付いた文字列は変更しないでください。数字の1または0で設定しているものは必ず半角数字で設定下さい。
 * ・メールアドレスのname属性の値が「Email」ではない場合、以下必須設定箇所の「$Email」の値も変更下さい。
 * ・name属性の値に半角スペースは使用できません。
 *以上のことを間違えてしまうとプログラムが動作しなくなりますので注意下さい。
-------------------------------------------------------------------------------------------------------------------*/

//---------------------------　必須設定　必ず設定してください　-----------------------

//サイトのトップページのURL　※デフォルトでは送信完了後に「トップページへ戻る」ボタンが表示されますので
$site_top = "https://animal-mitsukaru.com/";

// 管理者メールアドレス ※メールを受け取るメールアドレス(複数指定する場合は「,」で区切ってください 例 $to = "aa@aa.aa,bb@bb.bb";)
$to = "animal@mitsukaru-jpn.com";

//フォームのメールアドレス入力箇所のname属性の値（name="○○"　の○○部分）
$Email = "メールアドレス";

/*------------------------------------------------------------------------------------------------
以下スパム防止のための設定
※有効にするにはこのファイルとフォームページが同一ドメイン内にある必要があります
------------------------------------------------------------------------------------------------*/

//スパム防止のためのリファラチェック（フォームページが同一ドメインであるかどうかのチェック）(する=1, しない=0)
$Referer_check = 0;

//リファラチェックを「する」場合のドメイン ※以下例を参考に設置するサイトのドメインを指定して下さい。
$Referer_check_domain = "php-factory.net";

//---------------------------　必須設定　ここまで　------------------------------------

//---------------------- 任意設定　以下は必要に応じて設定してください ------------------------

// 管理者宛のメールで差出人を送信者のメールアドレスにする(する=1, しない=0)
// する場合は、メール入力欄のname属性の値を「$Email」で指定した値にしてください。
//メーラーなどで返信する場合に便利なので「する」がおすすめです。
$userMail = 0;

// Bccで送るメールアドレス(複数指定する場合は「,」で区切ってください 例 $BccMail = "aa@aa.aa,bb@bb.bb";)
$BccMail = "";

// 管理者宛に送信されるメールのタイトル（件名）
$subject = "【税務担当者のための年収診断】実施通知";

// 送信確認画面の表示(する=1, しない=0)
$confirmDsp = 0;

// 送信完了後に自動的に指定のページ(サンクスページなど)に移動する(する=1, しない=0)
// CV率を解析したい場合などはサンクスページを別途用意し、URLをこの下の項目で指定してください。
// 0にすると、デフォルトの送信完了画面が表示されます。
$jumpPage = 1;

// 送信完了後に表示するページURL（上記で1を設定した場合のみ）※httpから始まるURLで指定ください。
// if($_POST['お支払方法'] == "クレジットカード"){
//     $encodedUrl = urlencode ($_POST['Email']);
//     $thanksPage = "thanks_credit.php"."?prefilled_email=".$encodedUrl;
// } else {
$thanksPage = "/store/test/thanks.html";
// }

// 必須入力項目を設定する(する=1, しない=0)
$requireCheck = 0;

//----------------------------------------------------------------------
//  自動返信メール設定(START)
//----------------------------------------------------------------------

// 差出人に送信内容確認メール（自動返信メール）を送る(送る=1, 送らない=0)
// 送る場合は、フォーム側のメール入力欄のname属性の値が上記「$Email」で指定した値と同じである必要があります
$remail = 1;

//自動返信メールの送信者欄に表示される名前　※あなたの名前や会社名など（もし自動返信メールの送信者名が文字化けする場合ここは空にしてください）
$refrom_name = "株式会社ミツカル";

// 差出人に送信確認メールを送る場合のメールのタイトル（上記で1を設定した場合のみ）
$re_subject = "【税務担当者のための年収診断】診断結果のご連絡";

//フォーム側の「名前」箇所のname属性の値　※自動返信メールの「○○様」の表示で使用します。
//指定しない、または存在しない場合は、○○様と表示されないだけです。あえて無効にしてもOK
$dsp_name = 'お名前';

// 「はい」の数をカウントする変数
$yesCount1 = 0;
$yesCount2 = 0;
$yesCount3 = 0;
foreach ($_POST as $key => $value) {
    if (strpos($key, '1-') !== false && $value === "はい") {
        $yesCount1++;
    }
    if (strpos($key, '2-') !== false && $value === "はい") {
        $yesCount2++;
    }
    if (strpos($key, '3-') !== false && $value === "はい") {
        $yesCount3++;
    }

}
$customVariable = "";
//自動返信メールの冒頭の文言 ※日本語部分のみ変更可

$remail_text = <<< TEXT
<html>
<head>
  <style>
 	 p{
		color: #000;
		margin:0;
	}
    .em {
      font-weight: bold;
    }
    .em b{
      color: red;
    }
  </style>
</head>
<body>
<p>
ミツカルの外科診療スキル診断を実施いただきありがとうございます。<br><br>

診断結果は、下記ＵＲＬよりご確認いただけます。<br>
<br><br>

株式会社ミツカルは優良動物病院の求人を多数保有しています。<br>
診断結果をもとに様にマッチした求人をご紹介させていただくために、<br>
キャリアアドバイザーよりご連絡させていただく場合がございます。<br><br>

様の今後のキャリアアップ、働き方のご相談も無料で実施しておりますので、<br>
お気軽に受電及びお問い合わせいただけますと幸いです。
</p>
</body>
</html>
TEXT;

//自動返信メールに署名（フッター）を表示(する=1, しない=0)※管理者宛にも表示されます。
$mailFooterDsp = 1;

//上記で「1」を選択時に表示する署名（フッター）（FOOTER～FOOTER;の間に記述してください）
$mailSignature = <<< FOOTER
▼お問い合わせ先▼<br>
- - - - - - - - - - - - - - - - - - - -<br>
会社名： 株式会社ミツカル<br>
住 所： 〒141-0021 東京都品川区上大崎3-2-1 目黒センタービル 8階<br>
TEL： 03-4500-4401<br>
E-mail： animal@mitsukaru-jpn.com<br>
URL： https://mitsukaru.cc/<br>
- - - - - - - - - - - - - - - - - - - -<br>
FOOTER;

//----------------------------------------------------------------------
//  自動返信メール設定(END)
//----------------------------------------------------------------------

//メールアドレスの形式チェックを行うかどうか。(する=1, しない=0)
//※デフォルトは「する」。特に理由がなければ変更しないで下さい。メール入力欄のname属性の値が上記「$Email」で指定した値である必要があります。
$mail_check = 1;

//全角英数字→半角変換を行うかどうか。(する=1, しない=0)
$hankaku = 0;

//全角英数字→半角変換を行う項目のname属性の値（name="○○"の「○○」部分）
//※複数の場合にはカンマで区切って下さい。（上記で「1」を指定した場合のみ有効）
//配列の形「name="○○[]"」の場合には必ず後ろの[]を取ったものを指定して下さい。
$hankaku_array = array('電話番号', '金額');

//----------------------------------------------------------------------
//  添付ファイル処理用設定(BEGIN)
//----------------------------------------------------------------------
//ファイル添付機能を使用する場合は一時ファイルを保存する必要があるため確認画面の表示が必須になります。
$confirmDsp = 0; //確認画面を表示 ※変更不可

/* ----- 重要 ------*/
//ファイルアップ部分のnameの値は必ず配列の形　例　upfile[]　としてください。※添付ファイルが1つでも
//添付ファイルは複数も可能です。

//例1 添付ファイルが1つの場合
//添付ファイル <input type="file" name="upfile[]" />

//例2 添付ファイルが複数の場合
//添付ファイル1：<input type="file" name="upfile[]" /> 添付ファイル2：<input type="file" name="upfile[]" />

//添付ファイルのMAXファイルサイズ　※単位バイト　デフォルトは5MB（ただしサーバーのphp.iniの設定による）
$maxImgSize = 5024000;

//添付ファイル一時保存用ディレクトリ ※書き込み可能なパーミッション（777等※サーバによる）にしてください
$tmp_dir_name = './tmp/';

//添付許可ファイル（拡張子）
//※大文字、小文字は区別されません（同じ扱い）のでここには小文字だけでOKです（拡張子を大文字で送信してもマッチします）
$permission_file = array('jpg', 'jpeg', 'gif', 'png', 'pdf', 'txt', 'xls', 'xlsx', 'zip', 'lzh', 'doc');

//フォームのファイル添付箇所のname属性の値 <input type="file" name="upfile[]" />の「upfile」部
$upfile_key = 'upfile';

//サーバー上の一時ファイルを削除する(する=1, しない=0)　※バックアップ目的で保存させておきたい場合など
//添付ファイルは確認画面表示時にtmpディレクトリに一旦保存されますが、それを送信時に削除するかどうか。（残す場合サーバー容量に余裕がある場合のみ推奨）
//もちろん手動での削除も可能です。
$tempFileDel = 1; //デフォルトは削除する

//確認画面→戻る→確認画面のページ遷移では最初の一時ファイルはサーバ上に残りますが、1時間後以降の最初の送信時に自動で削除されます。

//メールソフトで添付ファイル名が文字化けする場合には「1」にしてみてください。（ThuderBirdで日本語ファイル名文字化け対策）
//「1」にすると添付ファイル名が0～の連番になります。
$rename = 0; //(0 or 1)

//サーバーのphp.iniの「mail.add_x_header」がONかOFFかチェックを行う(する=1, しない=0)　※PHP5.3以降
//「する」場合、mail.add_x_headerがONの場合確認画面でメッセージが表示されます。
//mail.add_x_headerがONの場合、添付ファイルが正常に添付できない可能性が非常に高いためのチェックです。
//mail.add_x_headerはデフォルトは「OFF」ですが、サーバーによっては稀に「ON」になっているためです。
//mail.add_x_headerがONの場合でも正常に添付できていればこちらは「0」として下さい。メッセージは非表示となります。
$iniAddX = 0;

//----------------------------------------------------------------------
//  添付ファイル処理用設定(END)
//----------------------------------------------------------------------

//------------------------------- 任意設定ここまで ---------------------------------------------

// 以下の変更は知識のある方のみ自己責任でお願いします。

//----------------------------------------------------------------------
//  関数実行、変数初期化
//----------------------------------------------------------------------
$encode = "UTF-8"; //このファイルの文字コード定義（変更不可）

if (isset($_GET)) {
    $_GET = sanitize($_GET);
}
//NULLバイト除去//
if (isset($_POST)) {
    $_POST = sanitize($_POST);
}
//NULLバイト除去//
if (isset($_COOKIE)) {
    $_COOKIE = sanitize($_COOKIE);
}
//NULLバイト除去//
if ($encode == 'SJIS') {
    $_POST = sjisReplace($_POST, $encode);
}
//Shift-JISの場合に誤変換文字の置換実行
$funcRefererCheck = refererCheck($Referer_check, $Referer_check_domain); //リファラチェック実行

//変数初期化
$sendmail = 1;
$empty_flag = 0;
$post_mail = '';
$errm = '';
$header = '';

$confirm_frag = false;
$submit_frag = true;

//----------------------------------------------------------------------
//  添付ファイル処理(BEGIN)
//----------------------------------------------------------------------

if (isset($_FILES[$upfile_key])) {
    $file_count = count($_FILES[$upfile_key]["tmp_name"]);
    for ($i = 0; $i < $file_count; $i++) {

        if (@is_uploaded_file($_FILES[$upfile_key]["tmp_name"][$i])) {
            if ($_FILES[$upfile_key]["size"][$i] < $maxImgSize) {

                //許可拡張子チェック
                $upfile_name_check = '';
                $upfile_name_array[$i] = explode('.', $_FILES[$upfile_key]['name'][$i]);
                $upfile_name_array_extension[$i] = strtolower(end($upfile_name_array[$i]));
                foreach ($permission_file as $permission_val) {
                    if ($upfile_name_array_extension[$i] == $permission_val) {
                        $upfile_name_check = 'checkOK';
                    }
                }
                if ($upfile_name_check != 'checkOK') {
                    $errm .= "<p class=\"error_messe\">許可されていない拡張子です。</p>\n";
                    $empty_flag = 1;
                } else {

                    $temp_file_name[$i] = $_FILES[$upfile_key]["name"][$i];
                    $temp_file_name_array[$i] = explode('.', $temp_file_name[$i]);

                    if (count($temp_file_name_array[$i]) < 2) {
                        $errm .= "<p class=\"error_messe\">ファイルに拡張子がありません。</p>\n";
                        $empty_flag = 1;
                    } else {
                        $extension = end($temp_file_name_array[$i]);

                        if (function_exists('uniqid')) {
                            if (!file_exists($tmp_dir_name) || !is_writable($tmp_dir_name)) {
                                exit("（重大なエラー）添付ファイル一時保存用のディレクトリが無いかパーミッションが正しくありません。{$tmp_dir_name}ディレクトリが存在するか、または{$tmp_dir_name}ディレクトリのパーミッションを書き込み可能（777等※サーバによる）にしてください");
                            }
                            $upFileName[$i] = uniqid('temp_file_') . mt_rand(10000, 99999) . '.' . $extension;
                            $upFilePath[$i] = $tmp_dir_name . $upFileName[$i];

                        } else {
                            exit('（重大なエラー）添付ﾌｧｲﾙ一時ﾌｧｲﾙ用のﾕﾆｰｸIDを生成するuniqid関数が存在しません。<br>PHPのﾊﾞｰｼﾞｮﾝが極端に低い（PHP4未満）ようです。<br>PHPをﾊﾞｰｼﾞｮﾝｱｯﾌﾟするか配布元に相談ください');
                        }
                        move_uploaded_file($_FILES[$upfile_key]['tmp_name'][$i], $upFilePath[$i]);
                        @chmod($upFilePath[$i], 0666);
                    }
                }
            } else {
                $errm .= "<p class=\"error_messe\">ファイルサイズが大きすぎます。</p>\n";
                $empty_flag = 1;
            }
        }
    }
}
//----------------------------------------------------------------------
//  添付ファイル処理(END)
//----------------------------------------------------------------------

/* 必須入力項目(入力フォームで指定したname属性の値を指定してください。（上記で1を設定した場合のみ）
値はシングルクォーテーションで囲み、複数の場合はカンマで区切ってください。フォーム側と順番を合わせると良いです。
配列の形「name="○○[]"」の場合には必ず後ろの[]を取ったものを指定して下さい。*/
// どちらの項目も入力されていない場合の処理
// if($confirm_frag == true){
//     $require = array( 'お名前' , '電話番号' ,'Email');
// } else {
$require = array('お名前','メールアドレス', '携帯電話番号');
// }

if ($requireCheck == 1) {
    $requireResArray = requireCheck($require); //必須チェック実行し返り値を受け取る

    $errm .= $requireResArray['errm'];
    if ($requireResArray['empty_flag'] == 1) {
        $empty_flag = $requireResArray['empty_flag'];
    }

    // echo('<pre>');
    // echo var_dump($empty_flag);
    // echo('<pre>');
}
//メールアドレスチェック
if (empty($errm)) {
    foreach ($_POST as $key => $val) {

        if ($val == "confirm_submit") {
            $sendmail = 1;
        }

        if ($key == $Email) {
            $post_mail = h($val);
        }

        if ($key == $Email && $mail_check == 1 && !empty($val)) {
            if (!checkMail($val)) {
                $errm .= "<p class=\"error_messe\">【" . $key . "】はメールアドレスの形式が正しくありません。</p>\n";
                $empty_flag = 1;
            }
        }
    }

}
// var_dump($_POST['mail_set']);
// echo ('<pre>');
// var_dump($_POST);
// echo ('<pre>');
if (($confirmDsp == 0 || $sendmail == 1) && $empty_flag != 1) {
    // echo 'test_mail2';
    //差出人に届くメールをセット
    if ($remail == 1) {
        // echo ('<pre>');
        //     var_dump($_POST);
        //     echo ('<pre>');

        $userBody = mailToUser($_POST, $dsp_name, $remail_text, $mailFooterDsp, $mailSignature, $encode);
        $reheader = userHeader($refrom_name, $to, $encode);
        $re_subject = "=?iso-2022-jp?B?" . base64_encode(mb_convert_encoding($re_subject, "JIS", $encode)) . "?=";
    }
    //管理者宛に届くメールをセット
    $adminBody = mailToAdmin($_POST, $customVariable, $subject, $mailFooterDsp, $mailSignature, $encode, $confirmDsp);
    $header = adminHeader($userMail, $post_mail, $BccMail, $to);
    // $subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($subject,"JIS",$encode))."?=";
    //         $subject = mb_convert_encoding($subject,'utf-8',mb_detect_encoding($subject));
    // $subject = mb_encode_mimeheader($subject,'iso-2022-jp');

    //トラバーサルチェック
    if (isset($_POST['upfilePath'])) {
        traversalCheck($tmp_dir_name);
    }
    if (ini_get('safe_mode')) {
        $result = mb_send_mail($to, $subject, $adminBody, $header);
    } else {
        $result = mb_send_mail($to, $subject, $adminBody, $header, '-f' . $to);
    }

    //サーバ上の一時ファイルを削除
    $dir = rtrim($tmp_dir_name, '/');
    deleteFile($dir, $tempFileDel);

    if ($remail == 1) {
        mail($post_mail, $re_subject, $userBody, $reheader);
    }
} else if ($confirmDsp == 1 && $confirm_frag == false) {
    /*　▼▼▼送信確認画面のレイアウト※編集可　オリジナルのデザインも適用可能▼▼▼　*/
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <title>セミナーお問い合わせフォーム｜ホワイトエッセンス株式会社</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:card" content="">
    <meta property="twitter:url" content="" />
    <link rel="stylesheet" type="text/css" href="common/css/normalize.css" media="all">
    <link rel="stylesheet" type="text/css" href="/store/skillchecker2/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="/store/skillchecker2/appForm_3steps.css" media="all">
    <!-- プライバシポリシー用 -->
    <link rel="stylesheet" type="text/css" href="/store/skillchecker2/privacy.css">
    <link rel="stylesheet" href="/we-system/build/css/pages/privacypolicy.css?v=68cec5faf6371a4a1e4d08d4ac0b33a3a3a6c617">
    <style>
    .u-Body {
        display: grid;
        gap: 70px;
    }

    .c-ListNumber__Text1::before {
        content: "（ 1 ）";
    }

    .c-ListNumber__Text2::before {
        content: "（ 2 ）";
    }

    .c-ListNumber__Text3::before {
        content: "（ 3 ）";
    }

    #l-HeaderFloating {
        display: none !important;
    }
    </style>
    <!-- //プライバシポリシー用 -->
    <script type="text/javascript" src="/store/skillchecker2/js/lib/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header class="l-header p-header">
        <div class="l-header-inner u-mxa">
            <div class="l-header-wrapper --mount">
                <a class="l-header-logo --mount" href="https://www.whiteessence.co.jp/gijyutu_seminar/">
                    <img src="/store/skillchecker2/img/logo.webp" alt="ホワイトエッセンスロゴ" width="204" height="24">
                </a>
            </div>
        </div>
    </header>
    <div class="l-profssor-steps">
        <div class="l-profssor">
            <p class="c-confirm-banner">確認画面s</p>
            <h2 class="p-headline__h2 --3steps">ホワイトニングから始まる<br>自費増収&予防歯科強化セミナー</h2>
            <span class="--sub-title --form">お申し込みフォーム</span>
        </div>
    </div>
    <?php
// 以下評価されていない
    if ($empty_flag !== 1) {?>
    <div class="l-main-form">
        <?php
// session_cache_limiter('private_no_expire');
        // session_start();
        // $_SESSION['input_data1'] = $_POST['1回目会場日程'];
        // $_SESSION['input_data2'] = $_POST['2回目セミナー'];
        // $_SESSION['input_data3'] = $_POST['3回目セミナー'];
        ?>
        <?php iniGetAddMailXHeader($iniAddX); //php.ini設定チェック?>
        <form action="<?php echo h($_SERVER['SCRIPT_NAME']); ?>" method="post">
            <input type="hidden" name="mail_set" value="confirm_submit">
            <input type="hidden" name="1回目会場日程" value="<?php echo isset($_POST['1回目会場日程']) ? $_POST['1回目会場日程'] : ''; ?>">
            <input type="hidden" name="2回目会場日程" value="<?php echo isset($_POST['2回目会場日程']) ? $_POST['2回目会場日程'] : ''; ?>">
            <input type="hidden" name="3回目会場日程" value="<?php echo isset($_POST['3回目会場日程']) ? $_POST['3回目会場日程'] : ''; ?>">
            <!-- <input type="hidden" name="httpReferer" value="<?php //echo h($_SERVER['HTTP_REFERER']) ;?>"> -->
            <div class="l-main-form__bg">

                <table class="p-main-form">
                    <tbody class="p-main-form__tbody">
                        <!-- 詳細情報の入力 -->
                        <tr class="p-main-form__tr">
                            <th class="p-main-form__th--select">
                                <p class="c-main-form__title">● 1回目の会場日程 <span class="c-main-form__title--span">13:00 〜 16:30</span></p>
                            </th>
                            <td class="p-main-form__td --adjust --confirm">
                                <?php
$selectedValue = $_POST['1回目会場日程'];
        $options = array(
            "2023/12/17（日）渋谷会場" => "渋谷会場 - 12/17(日)",
            "2024/01/21（日）渋谷会場" => "渋谷会場 - 1/21(日)",
            "2024/01/05（日）名古屋会場" => "名古屋会場 - 1/5(日)",
            "2024/01/14（日）名古屋会場" => "名古屋会場 - 1/14(日)",
            "2023/12/10（日）大阪会場" => "大阪会場 - 12/10(日)",
            "2024/02/04（日）博多会場" => "博多会場 - 2/4(日)",
        );
        // echo('<pre>');
        // echo var_dump($options[$selectedValue]);
        // echo('<pre>');
        $displayText = $options[$selectedValue];
        echo $displayText?>
                            </td>
                        </tr>
                        <tr class="p-main-form__tr">
                            <th class="p-main-form__th--select">
                                <p class="c-main-form__title">● 2回目の会場日程 <span class="c-main-form__title--span">11:30 〜 16:00</span></p>
                            </th>
                            <td class="p-main-form__td --adjust --confirm">
                                <?php
$selectedValue = $_POST['2回目会場日程'];
        $options = array(
            "2023/11/26（日）渋谷会場" => "渋谷会場 - 11/26(日)",
            "2024/01/14（日）渋谷会場" => "渋谷会場 - 1/14(日)",
            "2024/02/04（日）渋谷会場" => "渋谷会場 - 2/4(日)",
            "渋谷会場受講後に決める" => "渋谷会場 - 受講後に決める",
            "2024/01/28（日）名古屋会場" => "名古屋会場 - 1/28(日)",
            "名古屋会場受講後に決める" => "名古屋会場 - 受講後に決める",
            "2023/11/12（日）大阪会場" => "大阪会場 - 11/12(日)",
            "2023/12/24（日）大阪会場" => "大阪会場 - 12/24(日)",
            "大阪会場受講後に決める" => "大阪会場 - 受講後に決める",
            "2024/03/03（日）博多会場" => "博多会場 - 3/4(日)",
            "博多会場受講後に決める" => "博多会場 - 受講後に決める",
        );
        $displayText = $options[$selectedValue];
        echo $displayText
        ?>
                            </td>
                        </tr>
                        <tr class="p-main-form__tr">
                            <th class="p-main-form__th--select">
                                <p class="c-main-form__title">● 3回目の会場日程 <span class="c-main-form__title--span">11:00 〜 16:00</span></p>
                            </th>
                            <td class="p-main-form__td --adjust">
                                <?php
$selectedValue = $_POST['3回目会場日程'];
        $options = array(
            "2023/12/03（日）渋谷会場" => "渋谷会場 - 12/3(日)",
            "2023/12/10（日）渋谷会場" => "渋谷会場 - 12/10(日)",
            "2024/01/21（日）渋谷会場" => "渋谷会場 - 1/21(日)",
            "2024/01/28（日）渋谷会場" => "渋谷会場 - 1/28(日)",
            "2024/03/03（日）渋谷会場" => "渋谷会場 - 3/4(日)",
            "渋谷会場受講後に決める" => "渋谷会場 - 受講後に決める",
            "2024/02/18（日）名古屋会場" => "名古屋会場 - 2/18(日)",
            "名古屋会場受講後に決める" => "名古屋会場 - 受講後に決める",
            "2023/11/26（日）大阪会場" => "大阪会場 - 11/26(日)",
            "2024/01/14（日）大阪会場" => "大阪会場 - 1/14(日)",
            "大阪会場受講後に決める" => "大阪会場 - 受講後に決める",
            "2024/03/17（日）博多会場" => "博多会場 - 3/17(日)",
            "博多会場受講後に決める" => "博多会場 - 受講後に決める",
        );
        $displayText = $options[$selectedValue];
        echo $displayText?>
                            </td>
                            <td class="p-main-form__td --adjust --sp-none">
                                <span class="c-main-form__line"></span>
                            </td>
                        </tr>
                        <tr class="p-main-form__tr">
                            <th class="p-main-form__th">お名前<span class="--blue">必須</span></th>
                            <td class="p-main-form__td --adjust --confirm">
                                <input class="--input" type="text" name="お名前" placeholder="例：鈴木太郎" autocomplete="name">
                            </td>
                        </tr>
                        <tr class="p-main-form__tr">
                            <th class="p-main-form__th --sp-block">電話番号<span class="--blue">必須</span></th>
                            <td class="p-main-form__td --adjust --confirm">
                                <input class="--input" type="text" name="電話番号" placeholder="例：0364341463" autocomplete="tel">
                            </td>
                        </tr>
                        <tr class="p-main-form__tr">
                            <th class="p-main-form__th --sp-block">メールアドレス<span class="--blue">必須</span></th>
                            <td class="p-main-form__td --adjust --confirm">
                                <input class="--input" type="text" name="Email" placeholder="例：info@whiteessence.co.jp" autocomplete="email">
                            </td>
                        </tr>
                        <tr class="p-main-form__tr">
                            <th class="p-main-form__th --adjust">歯科医院名<span class="--white --adjust">任意</span></th>
                            <td class="p-main-form__td --adjust">
                                <input class="--input" type="text" name="歯科医院名" placeholder="例：ホワイト歯科医院">
                            </td>
                        </tr>
                        <tr class="p-main-form__tr">
                            <th class="p-main-form__th --adjust">お支払方法<span class="--blue">必須</span></th>
                            <td class="p-main-form__td--flex --adjust">
                                <div class="--contents">
                                    <input type="radio" name="お支払方法" id="payment-credit" value="クレジットカード" class="c-payment-button">
                                    <label for="payment-credit">クレジットカード</label>
                                </div>
                                <div class="--contents">
                                    <input type="radio" name="お支払方法" id="payment-transfer" value="銀行振込" class="c-payment-button">
                                    <label for="payment-transfer">銀行振込</label>
                                </div>
                            </td>
                        </tr>
                        <!-- //詳細情報の入力 -->
                    </tbody>
                </table>
            </div>
            <div class="privacy-box__parent--wrap">
                <!-- <div class="privacy-box__parent">
								<input type="checkbox" name="submit" value="同意する" class="c-consent-button" id="consent-button">
								<label for="consent-button"><a href="https://www.whiteessence.co.jp/we-system/privacypolicy/" class="--link" onclick="window.open('./privacy.html', '任意のウィンドウ名称','width=1300,height=800'); return false;">プライバシーポリシー &gt;</a>に同意する</label>
							</div> -->
                <div class="privacy-box__parent">
                    <input type="checkbox" name="submit" value="同意する" class="c-consent-button" id="consent-button">
                    <label for="consent-button"><b id="js-modal_button" class="--link">プライバシーポリシー</b>に同意する</label>
                </div>
                <div class="submit_box">
                    <input type="submit" value="確認する" class="--submit" disabled>
                </div>
            </div>
        </form>
    </div>
    <?php } else {?>
    <div align="center">
        <h4 class="c-err-area__text">入力にエラーがあります。<br>下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h4>
        <div class="c-err-area__text --red"><?php echo $errm; ?></div>
        <br><br>

        <div class="submit_box --confirm">
            <input type="button" value="前画面に戻る" class="--submit" onClick="history.back()">
        </div>
    </div>
    <?php }?>
    <div id="js-modal">
        <div class="l-modal-wrap">
            <div class="l-modal">
                <?php include "/store/skillchecker2/privacy.html";?>
            </div>
            <span class="l-modal--close">×</span>
        </div>
    </div>
    <script>
    $(function() {
        const submitButton = document.querySelector('.--submit');
        const agreeYesList = document.querySelectorAll('.c-consent-button');

        const consentValue = sessionStorage.getItem('consent');
        agreeYesList.forEach(function(agreeYes) {
            if (consentValue === 'true') {
                agreeYes.checked = true;
                submitButton.disabled = false;
            } else {
                agreeYes.checked = false;
                submitButton.disabled = true;
            }

            agreeYes.addEventListener('click', function() {
                if (agreeYes.checked) {
                    submitButton.disabled = false;
                    sessionStorage.setItem('consent', 'true');
                } else {
                    submitButton.disabled = true;
                    sessionStorage.setItem('consent', 'false');
                }
            });
        });

        // モーダル
        document.getElementById("js-modal_button").addEventListener("click", function() {
            const jsModal = $('#js-modal');
            if (jsModal.hasClass('active')) {
                jsModal.removeClass('active');
            } else {
                jsModal.addClass('active');
            }
        });
        $('#js-modal').click(function() {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).addClass('active');
            }
        });
    });
    </script>
    <script src="//conf.f-tra.com/ffconf/ffconf_0813_0051_0112.js" charset="utf-8" type="text/javascript"></script>
    <script src="//asset.f-tra.com/track/efo2.js" charset="utf-8" type="text/javascript"></script>
</body>

</html>

<?php
/* ▲▲▲送信確認画面のレイアウト　※オリジナルのデザインも適用可能▲▲▲　*/
    /*　▼▼▼送信確認画面のレイアウト2※編集可　オリジナルのデザインも適用可能▼▼▼　*/
} else if ($confirmDsp == 1 && $confirm_frag == true) {
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <title>セミナーお問い合わせフォーム｜ホワイトエッセンス株式会社</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:card" content="">
    <meta property="twitter:url" content="" />
    <link rel="stylesheet" type="text/css" href="common/css/normalize.css" media="all">
    <link rel="stylesheet" type="text/css" href="/store/skillchecker2/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="/store/skillchecker2/appForm_3steps.css" media="all">
    <script type="text/javascript" src="/store/skillchecker2/js/lib/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header class="l-header p-header">
        <div class="l-header-inner u-mxa">
            <div class="l-header-wrapper --mount">
                <a class="l-header-logo --mount" href="https://www.whiteessence.co.jp/gijyutu_seminar/">
                    <img src="/store/skillchecker2/img/logo.webp" alt="ホワイトエッセンスロゴ" width="204" height="24">
                </a>
            </div>
        </div>
    </header>
    <div class="l-profssor-steps">
        <div class="l-profssor">
            <p class="c-confirm-banner--note">フォームの送信はまだ完了していません</p>
            <p class="c-confirm-banner">確認画面a</p>
            <h2 class="p-headline__h2 --3steps">ホワイトニングから始まる<br>自費増収&予防歯科強化セミナー</h2>
            <span class="--sub-title --form">お申し込みフォーム</span>
        </div>
    </div>
    <?php if ($empty_flag !== 1) {?>
    <div class="l-main-form">
        <?php
// session_start();
        // $_SESSION['input_data1'] = $_POST['1回目会場日程'];
        // $_SESSION['input_data2'] = $_POST['2回目セミナー'];
        // $_SESSION['input_data3'] = $_POST['3回目セミナー'];
        ?>
        <?php iniGetAddMailXHeader($iniAddX); //php.ini設定チェック?>
        <form action="<?php echo h($_SERVER['SCRIPT_NAME']); ?>" method="post">
            <input type="hidden" name="1回目会場日程" value="<?php echo isset($_POST['1回目会場日程']) ? $_POST['1回目会場日程'] : ''; ?>">
            <input type="hidden" name="2回目会場日程" value="<?php echo isset($_POST['2回目会場日程']) ? $_POST['2回目会場日程'] : ''; ?>">
            <input type="hidden" name="3回目会場日程" value="<?php echo isset($_POST['3回目会場日程']) ? $_POST['3回目会場日程'] : ''; ?>">
            <input type="hidden" name="mail_set" value="confirm_submit2">
            <input type="hidden" name="お名前" value="<?php echo isset($_POST['お名前']) ? $_POST['お名前'] : ''; ?>">
            <input type="hidden" name="電話番号" value="<?php echo isset($_POST['電話番号']) ? $_POST['電話番号'] : ''; ?>">
            <input type="hidden" name="Email" value="<?php echo isset($_POST['Email']) ? $_POST['Email'] : ''; ?>">
            <input type="hidden" name="歯科医院名" value="<?php echo isset($_POST['歯科医院名']) ? $_POST['歯科医院名'] : ''; ?>">
            <input type="hidden" name="お支払方法" value="<?php echo isset($_POST['お支払方法']) ? $_POST['お支払方法'] : ''; ?>">
            <!-- <input type="hidden" name="httpReferer" value="<?php //echo h($_SERVER['HTTP_REFERER']) ;?>"> -->
            <div class="l-main-form__bg">

                <table class="p-main-form">
                    <tbody class="p-main-form__tbody">
                        <!-- 詳細情報の入力：確認 -->
                        <tr class="p-main-form__tr">
                            <th class="p-main-form__th--select">
                                <p class="c-main-form__title">● 1回目の会場日程 <span class="c-main-form__title--span">13:00 〜 16:30</span></p>
                            </th>
                            <td class="p-main-form__td --adjust --confirm">
                                <?php
$selectedValue = $_POST['1回目会場日程'];
        $options = array(
            "2023/12/17（日）渋谷会場" => "渋谷会場 - 12/17(日)",
            "2024/01/21（日）渋谷会場" => "渋谷会場 - 1/21(日)",
            "2024/01/05（日）名古屋会場" => "名古屋会場 - 1/5(日)",
            "2024/01/14（日）名古屋会場" => "名古屋会場 - 1/14(日)",
            "2023/12/10（日）大阪会場" => "大阪会場 - 12/10(日)",
            "2024/02/04（日）博多会場" => "博多会場 - 2/4(日)",
        );
        $displayText = $options[$selectedValue];
        echo $displayText?>
                            </td>
                        </tr>
                        <tr class="p-main-form__tr">
                            <th class="p-main-form__th--select">
                                <p class="c-main-form__title">● 2回目の会場日程 <span class="c-main-form__title--span">11:30 〜 16:00</span></p>
                            </th>
                            <td class="p-main-form__td --adjust --confirm">
                                <?php
$selectedValue = $_POST['2回目会場日程'];
        $options = array(
            "2023/11/26（日）渋谷会場" => "渋谷会場 - 11/26(日)",
            "2024/01/14（日）渋谷会場" => "渋谷会場 - 1/14(日)",
            "2024/02/04（日）渋谷会場" => "渋谷会場 - 2/4(日)",
            "渋谷会場受講後に決める" => "渋谷会場 - 受講後に決める",
            "2024/01/28（日）名古屋会場" => "名古屋会場 - 1/28(日)",
            "名古屋会場受講後に決める" => "名古屋会場 - 受講後に決める",
            "2023/11/12（日）大阪会場" => "大阪会場 - 11/12(日)",
            "2023/12/24（日）大阪会場" => "大阪会場 - 12/24(日)",
            "大阪会場受講後に決める" => "大阪会場 - 受講後に決める",
            "2024/03/03（日）博多会場" => "博多会場 - 3/4(日)",
            "博多会場受講後に決める" => "博多会場 - 受講後に決める",
        );
        $displayText = $options[$selectedValue];
        echo $displayText
        ?>
                            </td>
                        </tr>
                        <tr class="p-main-form__tr">
                            <th class="p-main-form__th--select">
                                <p class="c-main-form__title">● 3回目の会場日程 <span class="c-main-form__title--span">11:00 〜 16:00</span></p>
                            </th>
                            <td class="p-main-form__td --adjust">
                                <?php
$selectedValue = $_POST['3回目会場日程'];
        $options = array(
            "2023/12/03（日）渋谷会場" => "渋谷会場 - 12/3(日)",
            "2023/12/10（日）渋谷会場" => "渋谷会場 - 12/10(日)",
            "2024/01/21（日）渋谷会場" => "渋谷会場 - 1/21(日)",
            "2024/01/28（日）渋谷会場" => "渋谷会場 - 1/28(日)",
            "2024/03/03（日）渋谷会場" => "渋谷会場 - 3/4(日)",
            "渋谷会場受講後に決める" => "渋谷会場 - 受講後に決める",
            "2024/02/18（日）名古屋会場" => "名古屋会場 - 2/18(日)",
            "名古屋会場受講後に決める" => "名古屋会場 - 受講後に決める",
            "2023/11/26（日）大阪会場" => "大阪会場 - 11/26(日)",
            "2024/01/14（日）大阪会場" => "大阪会場 - 1/14(日)",
            "大阪会場受講後に決める" => "大阪会場 - 受講後に決める",
            "2024/03/17（日）博多会場" => "博多会場 - 3/17(日)",
            "博多会場受講後に決める" => "博多会場 - 受講後に決める",
        );
        $displayText = $options[$selectedValue];
        echo $displayText?>
                            </td>
                            <td class="p-main-form__td --adjust --sp-none">
                                <span class="c-main-form__line"></span>
                            </td>
                        </tr>
                        <tr class="p-main-form__tr">
                            <th class="p-main-form__th">お名前</th>
                            <td class="p-main-form__td --adjust --confirm">
                                <?php echo $_POST['お名前']; ?>
                            </td>
                        </tr>
                        <tr class="p-main-form__tr">
                            <th class="p-main-form__th --sp-block">電話番号</th>
                            <td class="p-main-form__td --adjust --confirm">
                                <?php echo $_POST['電話番号']; ?>
                            </td>
                        </tr>
                        <tr class="p-main-form__tr">
                            <th class="p-main-form__th --sp-block">メールアドレス</th>
                            <td class="p-main-form__td --adjust --confirm">
                                <?php echo $_POST['Email']; ?>
                            </td>
                        </tr>
                        <tr class="p-main-form__tr">
                            <th class="p-main-form__th --adjust">歯科医院名</th>
                            <td class="p-main-form__td --adjust">
                                <?php echo $_POST['歯科医院名']; ?>
                            </td>
                        </tr>
                        <tr class="p-main-form__tr">
                            <th class="p-main-form__th --adjust">お支払方法</th>
                            <td class="p-main-form__td --adjust">
                                <?php echo $_POST['お支払方法']; ?>
                            </td>
                        </tr>
                        <!-- //詳細情報の入力：確認 -->
                    </tbody>
                </table>
            </div>
            <div class="privacy-box__parent--wrap --confirm">
                <div class="submit_box --confirm-back">
                    <input type="button" value="戻る" class="--submit" onClick="history.back()">
                </div>
                <div class="submit_box --confirm">
                    <input type="hidden" name="経由サイト" value="技術経由">
                    <input type="submit" name="送信する" value="送信する" class="--submit">
                </div>
            </div>
        </form>
    </div>
    <?php } else {?>
    <div align="center">
        <h4 class="c-err-area__text">入力にエラーがあります。<br>下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h4>
        <div class="c-err-area__text --red"><?php echo $errm; ?></div>
        <br><br>

        <div class="submit_box --confirm">
            <input type="button" value="前画面に戻る" class="--submit" onClick="history.back()">
        </div>
    </div>
    <?php }?>
    <script src="//conf.f-tra.com/ffconf/ffconf_0813_0051_0112.js" charset="utf-8" type="text/javascript"></script>
    <script src="//asset.f-tra.com/track/efo2.js" charset="utf-8" type="text/javascript"></script>
</body>

</html>
<?php
/* ▲▲▲送信確認画面のレイアウト2　※オリジナルのデザインも適用可能▲▲▲　*/
}
//if(($jumpPage == 0 && $sendmail == 1) || ($jumpPage == 0 && ($confirmDsp == 0 && $sendmail == 0))) {
/* ▼▼▼送信完了画面のレイアウト　編集可 ※送信完了後に指定のページに移動しない場合のみ表示▼▼▼　*/
?>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>完了画面</title>
	</head>
	<body>
	<div align="center">
	<?php //if($empty_flag == 1){ ?>
	<h4>入力にエラーがあります。下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h4>
	<div style="color:red"><?php //echo $errm; ?></div>
	<br /><br /><div class="back_btn"><input type="button" value="戻る" onClick="history.back()"></div>
	</div>
	</body>
	</html>
	<?php //}else{ ?>
	送信ありがとうございました。<br />
	送信は正常に完了しました。<br /><br />
	<a href="<?php //echo $site_top ;?>">トップページへ戻る&raquo;</a>
	</div>
	<?php //copyright(); ?>
	</body>
	</html> -->
<?php
/* ▲▲▲送信完了画面のレイアウト 編集可 ※送信完了後に指定のページに移動しな$confirm_fragい場合のみ表示▲▲▲　*/
//     }
// }
//確認画面無しの場合の表示、指定のページに移動する設定の場合、エラーチェックで問題が無ければ指定ページヘリダイレクト
if (($jumpPage == 1 && $sendmail == 1 && $submit_frag == true)) {
    if ($empty_flag == 1) {
        ?>
<div align="center">
    <h4>入力にエラーがあります。下記をご確認の上「戻る」ボタンにて修正をお願い致します。</h4>
    <div style="color:red"><?php echo $errm; ?></div><br /><br />
    <input type="button" value=" 前画面に戻る " onClick="history.back()">
</div>
<?php
} else {
        // echo('<pre>');
        // echo($sendmail);
        // echo('<pre>');
        // echo('<pre>');
        // var_dump($_POST);
        // echo('<pre>');
        // setSheet2($customVariable);

        // setHubspot();

        // setDb();
        // include public_path('store/skillchecker2/thanks.html');

        // header("Location: " . $thanksPage);
    }
}
// 以下の変更は知識のある方のみ自己責任でお願いします。

//----------------------------------------------------------------------
//  関数定義(START)
//----------------------------------------------------------------------
function setHubspot()
{
    // ini_set('display_errors', 1);
    // ini_set('error_reporting', E_ALL);
    // POST取得
    $data = array();
    foreach ($_POST as $key => $val) {
        if (is_array($val)) {
            $data[$key] = implode(", ", $val);
            $data[$key] = ltrim($data[$key], ", ");
        } else {
            $data[$key] = $val;
        }
    }
    function back_referer()
    {
        echo "test";
        // header('Location: ' . $_SERVER['HTTP_REFERER']);
        // exit;
    }
    $names = [
        'お名前',
        'メールアドレス',
        '携帯電話番号',
        // 'utm_source',
    ];
    // echo('<pre>');
    // var_dump($names);
    // echo('<pre>');
    foreach ($names as $name) {
        if (!isset($data[$name]) || empty($data[$name])) {
            // back_referer();
        }
    }
    /*---------- HubSpot登録 ----------*/
    // echo ('<pre>');
    // var_dump($data);
    // echo ('<pre>');

    $HubSpotdataModel = [
        'year' => 'firstname',
        'prefecture' => 'email',
        '現在の資格' => 'phone',
        '経験年数' => 'phone',
        '担当件数' => 'phone',
        '年間売上' => 'phone',
        'マネジメント経験' => 'phone',
        '財務コンサル' => 'phone',
        '相続' => 'firstname',
        'その他' => 'firstname',
        '現在の年収' => 'firstname',

        'お名前' => 'firstname',
        'メールアドレス' => 'email',
        '携帯電話番号' => 'phone',
    ];
    $HubSpotPostData = [];
    foreach ($HubSpotdataModel as $name => $hs) {
        $HubSpotPostData[$hs] = $data[$name];
    }
    $HubSpotPostData['specific_frag'] = 'ver2';
    // echo('<pre>');
    // var_dump($HubSpotPostData);
    // echo('<pre>');
    include __DIR__ . '/../assets/HubSpot/HubSpot.php';
    // $tmp = __DIR__ . '../assets/HubSpot/HubSpot.php';
    //  var_dump($tmp);
    $HubSpot = new HubSpot;
    $HubSpotPostResult = $HubSpot->skillPost($HubSpotPostData);
    if (!isset($HubSpotPostResult['success']) || !$HubSpotPostResult['success']) {
        // back_referer();
        // exit;
        echo "test2\n";
    }
    echo('<pre>');
    var_dump($HubSpotPostResult);
    echo('<pre>');
}
function setSheet2($customVariable)
{
    // POSTデータをそのまま使用する
    // if ($_POST['送信']) {
    //     unset($_POST['送信']);
    // }
    $postData = $_POST;
    $postData['customVariable'] = $customVariable;
    // シート名を指定してPOSTデータをJSONエンコード
    $sheetName = "獣医師toC"; // シート名を適切なものに変更
    $postDataWithSheet = array(
        "sheetName" => $sheetName,
        "data" => $postData,
    );
    $postDataJSON = json_encode($postDataWithSheet, JSON_UNESCAPED_UNICODE);
    $url = "https://script.google.com/macros/s/AKfycbyvU3a6knc47v7gc4BHjYDs8qcBi0AgDhgHsvg6xT1vG_8Qdz_wxV41QlbxJvwIxq3i/exec";
    $options = array(
        'http' => array(
            'header' => 'Content-type: application/json', // Content-typeをapplication/jsonに変更
            'method' => 'POST',
            'content' => $postDataJSON,
        ),
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    // GASからのレスポンスを表示（デバッグ用）
    echo $result;
}

function setDb()
{
    $username = "tob_db_user";
    $password = "(ZeL-XkW~&*(,|(3";
    $pdo = new PDO('mysql:dbname=tob;host=localhost', $username, $password);
    // フォームから送信されたデータを受け取ります
    $schedule1 = $_POST['1回目会場日程'];
    $schedule2 = $_POST['2回目会場日程'];
    $schedule3 = $_POST['3回目会場日程'];
    $name = $_POST['お名前'];
    $tel = $_POST['電話番号'];
    $Email = $_POST['Email'];
    $dental_clinic_name = $_POST['歯科医院名'];
    $payment = $_POST['お支払方法'];

    // SQLクエリを作成します
    $stmt = $pdo->prepare('INSERT INTO gijyutu_table (schedule1,schedule2,schedule3,name,tel,Email,dental_clinic_name,payment) VALUES (:schedule1,:schedule2,:schedule3,:name,:tel,:Email,:dental_clinic_name,:payment);');

    $stmt->bindParam(':schedule1', $schedule1);
    $stmt->bindParam(':schedule2', $schedule2);
    $stmt->bindParam(':schedule3', $schedule3);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':dental_clinic_name', $dental_clinic_name);
    $stmt->bindParam(':payment', $payment);

    // echo('<pre>');
    // var_dump($stmt);
    // echo('</pre>');
    $stmt->execute();
    // echo "Data saved successfully!";
    $pdo = null;
}
function checkMail($str)
{
    $mailaddress_array = explode('@', $str);
    if (preg_match("/^[\.!#%&\-_0-9a-zA-Z\?\/\+]+\@[!#%&\-_0-9a-z]+(\.[!#%&\-_0-9a-z]+)+$/", "$str") && count($mailaddress_array) == 2) {
        return true;
    } else {
        return false;
    }
}
function h($string)
{
    global $encode;
    return htmlspecialchars($string, ENT_QUOTES, $encode);
}
function sanitize($arr)
{
    if (is_array($arr)) {
        return array_map('sanitize', $arr);
    }
    return str_replace("\0", "", $arr);
}
//Shift-JISの場合に誤変換文字の置換関数
function sjisReplace($arr, $encode)
{
    foreach ($arr as $key => $val) {
        $key = str_replace('＼', 'ー', $key);
        $resArray[$key] = $val;
    }
    return $resArray;
}
//送信メールにPOSTデータをセットする関数
function postToMail($arr)
{
    global $hankaku, $hankaku_array;
    $resArray = '';
    foreach ($arr as $key => $val) {
        $out = '';
        if (is_array($val)) {
            foreach ($val as $key02 => $item) {
                //連結項目の処理
                if (is_array($item)) {
                    $out .= connect2val($item);
                } else {
                    $out .= $item . ', ';
                }
            }
            $out = rtrim($out, ', ');

        } else { $out = $val;} //チェックボックス（配列）追記ここまで
        // if(get_magic_quotes_gpc()) { $out = stripslashes($out); }

        //全角→半角変換
        if ($hankaku == 1) {
            $out = zenkaku2hankaku($key, $out, $hankaku_array);
        }
        if ($out != "confirm_submit" && $key != "httpReferer" && $key != "upfilePath" && $key != "upfileType") {
            if ($key == "upfileOriginName" && $out != '') {
                $key = '添付ファイル';
            } elseif ($key == "upfileOriginName" && $out == '') {
                continue;
            }
            if ($key !== "送信する" && $key !== "mail_set" && strpos($key, '-') === false) {
                $resArray .= "【 " . $key . " 】 " . $out . "<br>";
            }
        }
    }
    return $resArray;
}
function postToMailMaster($arr, $customVariable)
{
    global $hankaku, $hankaku_array;
    $resArray = '';
    $targetKeys = array("メールアドレス", "勤務地", "生まれ年", "名", "姓");
    foreach ($targetKeys as $targetKey) {
        // キーが存在するか確認
        if (array_key_exists($targetKey, $arr)) {
            // キーが存在する場合、値を取得し一時的な変数に保存
            $targetValue = $arr[$targetKey];
            // キーと値を削除
            unset($arr[$targetKey]);
            // 配列の先頭に新しいキーと値を追加
            $arr = array($targetKey => $targetValue) + $arr;
        }
    }
    if (isset($customVariable)) {
        $resArray .= "【 診断結果 】 " . $customVariable . "<br>";
    }
    foreach ($arr as $key => $val) {
        $out = '';
        if (is_array($val)) {
            foreach ($val as $key02 => $item) {
                //連結項目の処理
                if (is_array($item)) {
                    $out .= connect2val($item);
                } else {
                    $out .= $item . ', ';
                }
            }
            $out = rtrim($out, ', ');
        } else {
            $out = $val;
        } //チェックボックス（配列）追記ここまで
        // if(get_magic_quotes_gpc()) { $out = stripslashes($out); }

        //全角→半角変換
        if ($hankaku == 1) {
            $out = zenkaku2hankaku($key, $out, $hankaku_array);
        }
        if ($out != "confirm_submit" && $key != "httpReferer" && $key != "upfilePath" && $key != "upfileType") {
            if ($key == "upfileOriginName" && $out != '') {
                $key = '添付ファイル';
            } elseif ($key == "upfileOriginName" && $out == '') {
                continue;
            }
            if ($key !== "送信する" && $key !== "mail_set") {
                $resArray .= "【 " . $key . " 】 " . $out . "<br>";
            }
        }
    }
    // echo ('<pre>');
    // var_dump($resArray);
    // echo ('</pre>');
    return $resArray;

}
//確認画面の入力内容出力用関数
function confirmOutput($arr)
{
    global $upFilePath, $upfile_key, $encode, $hankaku, $hankaku_array;
    $html = '';
    $html .= '<tbody class="p-confirm-table__tr">';
    foreach ($arr as $key => $val) {
        $out = '';
        if (is_array($val)) {
            foreach ($val as $key02 => $item) {
                //連結項目の処理
                if (is_array($item)) {
                    $out .= connect2val($item);
                } else {
                    $out .= $item . ', ';
                }
            }
            $out = rtrim($out, ', ');

        } else { $out = $val;} //チェックボックス（配列）追記ここまで
        if (get_magic_quotes_gpc()) {$out = stripslashes($out);}
        $out = nl2br(h($out)); //※追記 改行コードを<br>タグに変換
        $key = h($key);

        //全角→半角変換
        if ($hankaku == 1) {
            $out = zenkaku2hankaku($key, $out, $hankaku_array);
        }

        $html .= "<tr class='p-confirm-table__tr'><th>" . $key . "</th><td>" . mb_convert_kana($out, "K", $encode);
        $html .= '<input type="hidden" name="' . $key . '" value="' . str_replace(array("<br />", "<br>"), "", mb_convert_kana($out, "K", $encode)) . '" />';
        $html .= "</td></tr>\n";

    }
    $html .= '</tbody';

    //添付ファイル表示処理
    if (isset($_FILES[$upfile_key]["tmp_name"])) {
        $file_count = count($_FILES[$upfile_key]["tmp_name"]);
        $j = 1;
        for ($i = 0; $i < $file_count; $i++, $j++) {
            //添付があったらファイル名表示
            if (!empty($upFilePath[$i])) {
                $html .= "<tr><th>添付ファイル名{$j}.</th><td>{$_FILES[$upfile_key]['name'][$i]}</td></tr>\n";
            }
        }
    }

    return $html;
}
//全角→半角変換
function zenkaku2hankaku($key, $out, $hankaku_array)
{
    global $encode;
    if (is_array($hankaku_array) && function_exists('mb_convert_kana')) {
        foreach ($hankaku_array as $hankaku_array_val) {
            if ($key == $hankaku_array_val) {
                $out = mb_convert_kana($out, 'a', $encode);
            }
        }
    }
    return $out;
}
//配列連結の処理
function connect2val($arr)
{
    $out = '';
    foreach ($arr as $key => $val) {
        if ($key === 0 || $val == '') { //配列が未記入（0）、または内容が空のの場合には連結文字を付加しない（型まで調べる必要あり）
            $key = '';
        } elseif (strpos($key, "円") !== false && $val != '' && preg_match("/^[0-9]+$/", $val)) {
            $val = number_format($val); //金額の場合には3桁ごとにカンマを追加
        }
        $out .= $val . $key;
    }
    return $out;
}
//管理者宛送信メールヘッダ
function adminHeader($userMail, $post_mail, $BccMail, $to)
{
    $header = '';

    //メールで日本語使用するための設定
    mb_language("Ja");
    // mb_language("uni");
    mb_internal_encoding("UTF-8");

    if ($userMail == 1 && !empty($post_mail)) {
        $header = "From: $post_mail\n";
        if ($BccMail != '') {
            $header .= "Bcc: $BccMail\n";
        }
        $header .= "Reply-To: " . $post_mail . "\n";
    } else {
        if ($BccMail != '') {
            $header = "Bcc: $BccMail\n";
        }
        $header .= "Reply-To: " . $to . "\n";
    }

    //----------------------------------------------------------------------
    //  添付ファイル処理(START)
    //----------------------------------------------------------------------
    if (isset($_POST['upfilePath'])) {
        $header .= "MIME-Version: 1.0\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"__PHPFACTORY__\"\n";
    } else {
        // $header.="Content-Type:text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
        $header .= "Content-Type:text/html;charset=iso-2022-jp\nX-Mailer: PHP/" . phpversion();
    }

    return $header;
}
//管理者宛送信メールボディ
function mailToAdmin($arr, $customVariable, $subject, $mailFooterDsp, $mailSignature, $encode, $confirmDsp)
{
    global $rename;
    $adminBody = '';
    //----------------------------------------------------------------------
    //  添付ファイル処理(START)
    //----------------------------------------------------------------------
    if (isset($_POST['upfilePath'])) {
        $adminBody .= "--__PHPFACTORY__\n";
        $adminBody .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n";
        //$adminBody .= "\n";
    }
    //----------------------------------------------------------------------
    //  添付ファイル処理(END)
    //----------------------------------------------------------------------

    $adminBody .= "「" . $subject . "」からメールが届きました<br><br>";
    $adminBody .= "＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝<br>";
    $adminBody .= postToMailMaster($arr, $customVariable); //POSTデータを関数からセット
    $adminBody .= "<br>＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝<br>";
    $adminBody .= "送信された日時：" . date("Y/m/d (D) H:i:s", time()) . "<br>";
    $adminBody .= "送信者のIPアドレス：" . @$_SERVER["REMOTE_ADDR"] . "<br>";
    $adminBody .= "送信者のホスト名：" . getHostByAddr(getenv('REMOTE_ADDR')) . "<br>";
    if ($confirmDsp != 1) {
        $adminBody .= "問い合わせのページURL：" . @h($_SERVER['HTTP_REFERER']) . "<br>";
    } else {
        $adminBody .= "問い合わせのページURL：" . @$arr['httpReferer'] . "<br>";
    }
    if ($mailFooterDsp == 1) {
        $adminBody .= $mailSignature . "<br>";
    }

//----------------------------------------------------------------------
    //  添付ファイル処理(START)
    //----------------------------------------------------------------------

    if (isset($_POST['upfilePath'])) {

        $default_internal_encode = mb_internal_encoding();
        if ($default_internal_encode != $encode) {
            mb_internal_encoding($encode);
        }

        $file_count = count($_POST['upfilePath']);

        for ($i = 0; $i < $file_count; $i++) {

            if (isset($_POST['upfilePath'][$i])) {

                $adminBody .= "--__PHPFACTORY__\n";
                $filePath = h(@$_POST['upfilePath'][$i]); //ファイルパスを指定
                $fileName = h(mb_encode_mimeheader(@$_POST['upfileOriginName'][$i]));
                $imgType = h(@$_POST['upfileType'][$i]);

                //ファイル名が文字化けする場合には連番ファイル名とする
                if ($rename == 1) {
                    $fileNameArray = explode(".", $fileName);
                    $fileName = $i . '.' . end($fileNameArray);
                }

                # 添付ファイルへの処理をします。
                $handle = @fopen($filePath, 'r');
                $attachFile = @fread($handle, filesize($filePath));
                @fclose($handle);
                $attachEncode = base64_encode($attachFile);

                $adminBody .= "Content-Type: {$imgType}; name=\"$filePath\"\n";
                $adminBody .= "Content-Transfer-Encoding: base64\n";
                $adminBody .= "Content-Disposition: attachment; filename=\"$fileName\"\n";
                $adminBody .= "\n";
                $adminBody .= chunk_split($attachEncode) . "\n";
            }
        }
        $adminBody .= "--__PHPFACTORY__--\n";
    }
//----------------------------------------------------------------------
    //  添付ファイル処理(END)
    //----------------------------------------------------------------------

    //return mb_convert_encoding($adminBody,"JIS",$encode);
    return $adminBody;
}

//ユーザ宛送信メールヘッダ
function userHeader($refrom_name, $to, $encode)
{
    $reheader = "From: ";
    if (!empty($refrom_name)) {
        $default_internal_encode = mb_internal_encoding();
        if ($default_internal_encode != $encode) {
            mb_internal_encoding($encode);
        }
        $reheader .= mb_encode_mimeheader($refrom_name) . " <" . $to . ">\nReply-To: " . $to;
    } else {
        $reheader .= "$to\nReply-To: " . $to;
    }
    // $reheader .= "\nContent-Type: text/plain;charset=iso-2022-jp\nX-Mailer: PHP/".phpversion();
    $reheader .= "\nContent-Type: text/html;charset=iso-2022-jp\nX-Mailer: PHP/" . phpversion();
    return $reheader;
}
//ユーザ宛送信メールボディ
function mailToUser($arr, $dsp_name, $remail_text, $mailFooterDsp, $mailSignature, $encode)
{
    $userBody = '';
    if (isset($arr[$dsp_name])) {
        $userBody = h($arr[$dsp_name]) . " 様<br>";
    }

    // if($_POST['お支払方法'] == "クレジットカード"){
    //     $userBody.= $remail_text_credit;
    // } else {
    $userBody .= $remail_text;
    // }
    $userBody .= "＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝<br>";
    $userBody .= postToMail($arr); //POSTデータを関数からセット
    $userBody .= "＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝<br>";
    $userBody .= "送信日時：" . date("Y/m/d (D) H:i:s", time()) . "<br>";
    if ($mailFooterDsp == 1) {
        $userBody .= $mailSignature;
    }

    return mb_convert_encoding($userBody, "JIS", $encode);
}
//必須チェック関数
function requireCheck($require)
{
    $res['errm'] = '';
    $res['empty_flag'] = 0;
    foreach ($require as $requireVal) {
        $existsFalg = '';
        foreach ($_POST as $key => $val) {
            // echo('<pre>');
            // echo var_dump($requireVal);
            // echo('<pre>');
            // var_dump($_POST);
            // echo('</pre>');
            // var_dump($key);
            // echo('</pre>');
            // var_dump($val);
            // echo('</pre>');
            if ($key == $requireVal) {

                //連結指定の項目（配列）のための必須チェック
                if (is_array($val)) {
                    $connectEmpty = 0;
                    foreach ($val as $kk => $vv) {
                        if (is_array($vv)) {
                            foreach ($vv as $kk02 => $vv02) {
                                if ($vv02 == '') {
                                    $connectEmpty++;
                                }
                            }
                        }

                    }
                    if ($connectEmpty > 0) {
                        $res['errm'] .= "<p class=\"error_messe\">【" . h($key) . "】は必須項目です。</p>\n";
                        $res['empty_flag'] = 1;
                    }
                }
                //デフォルト必須チェック
                elseif ($val == '' || $val == '選択してください') {
                    $res['errm'] .= "<p class=\"error_messe\">【" . h($key) . "】は必須項目です。</p>\n";
                    $res['empty_flag'] = 1;
                    // echo('</pre>');
                    // echo('選択してくださいtest');
                    // echo('</pre>');
                }

                $existsFalg = 1;
                break;
            }
        }
        if ($existsFalg != 1) {
            $res['errm'] .= "<p class=\"error_messe\">【" . $requireVal . "】が未選択です。</p>\n";
            $res['empty_flag'] = 1;
            // echo '未選択テスト';
        }
    }

    return $res;
}
//リファラチェック
function refererCheck($Referer_check, $Referer_check_domain)
{
    if ($Referer_check == 1 && !empty($Referer_check_domain)) {
        if (strpos(h($_SERVER['HTTP_REFERER']), $Referer_check_domain) === false) {
            return exit('<p align="center">リファラチェックエラー。フォームページのドメインとこのファイルのドメインが一致しません</p>');
        }
    }
}
function copyright()
{
    echo '';
}
//ファイル添付用一時ファイルの削除
function deleteFile($dir, $tempFileDel)
{
    global $permission_file;

    if ($tempFileDel == 1) {
        if (isset($_POST['upfilePath'])) {
            foreach ($_POST['upfilePath'] as $key => $val) {

                foreach ($permission_file as $permission_file_val) {
                    if (strpos(strtolower($val), $permission_file_val) !== false && file_exists($val)) {
                        if (strpos($val, 'htaccess') !== false) {
                            exit();
                        }

                        unlink($val);
                        break;
                    }
                }

            }
        }

        //ゴミファイルの削除（1時間経過したもののみ）※確認画面→戻る→確認画面の場合、先の一時ファイルが残るため
        if (file_exists($dir) && !empty($dir)) {
            $handle = opendir($dir);
            while ($temp_filename = readdir($handle)) {
                if (strpos($temp_filename, 'temp_file_') !== false) {
                    if (strtotime(date("Y-m-d H:i:s", filemtime($dir . "/" . $temp_filename))) < strtotime(date("Y-m-d H:i:s", strtotime("-1 hour")))) {
                        @unlink("$dir/$temp_filename");
                    }
                }
            }
        }
    }
}
//php.iniのmail.add_x_headerのチェック
function iniGetAddMailXHeader($iniAddX)
{
    if ($iniAddX == 1) {
        if (@ini_get('mail.add_x_header') == 1) {
            echo '<p style="color:red">php.iniの「mail.add_x_header」がONになっています。添付がうまくいかない可能性が高いです。htaccessファイルかphp.iniファイルで設定を変更してOFFに設定下さい。サーバーにより設定方法は異なります。詳しくはサーバーマニュアル等、またはサーバー会社にお問い合わせ下さい。正常に添付できていればOKです。このメーッセージはmail.php内のオプションで非表示可能です</p>';
        }

    }
}

//トラバーサル対策
function traversalCheck($tmp_dir_name)
{
    if (isset($_POST['upfilePath']) && is_array($_POST['upfilePath'])) {
        foreach ($_POST['upfilePath'] as $val) {
            if (strpos($val, $tmp_dir_name) === false || strpos($val, 'temp_file_') === false) {
                exit('Warning!! you are wrong..1');
            }
//ルール違反は強制終了
            if (substr_count($tmp_dir_name, '/') != substr_count($val, '/')) {
                exit('Warning!! you are wrong..2');
            }
//ルール違反は強制終了
            if (strpos($val, 'htaccess') !== false) {
                exit('Warning!! you are wrong..3');
            }

            if (!file_exists($val)) {
                exit('Warning!! you are wrong..4');
            }

            if (strpos(str_replace($tmp_dir_name, '', $val), '..') !== false) {
                exit('Warning!! you are wrong..5');
            }

        }
    }
}

//----------------------------------------------------------------------
//  関数定義(END)
//----------------------------------------------------------------------
?>
