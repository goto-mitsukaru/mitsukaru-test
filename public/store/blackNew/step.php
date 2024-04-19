<?php
//     echo '<pre>';
//     var_dump($_POST);
//     echo '</pre>';
// die('プログラムを終了します。');
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-W6BSPDHC');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="税理士事務所に勤務する方へ。あなたの事務所のブラック度が何％なのかがわかる無料診断ツール！残業時間や勤怠管理、有給取得状況、評価制度、福利厚生など情報から分析します！">
    <title>税務担当者のためのブラック事務所診断｜税理士業界の転職ならミツカル</title>

    <head prefix="og: http://ogp.me/ns#"></head>
    <meta property="og:title" content="事務所のブラック度がわかる無料診断" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="税理士事務所に勤務する方へ。あなたの事務所のブラック度が何％なのかがわかる無料診断ツール！残業時間や勤怠管理、有給取得状況、評価制度、福利厚生など情報から分析します！" />
    <meta property="og:url" content="https://kaikeizimusyotennsyoku.com/blacksinndann/step.php" />
    <meta property="og:site_name" content="税務担当者のためのブラック事務所診断" />
    <meta property="og:image" content="https://kaikeizimusyotennsyoku.com/store/blackNew/img/OGP_black.jpg" />

    <link rel="icon" href="/store/blackNew/img/favicon.ico">
    <link rel="canonical" href="https://kaikeizimusyotennsyoku.com/blacksinndann/step.php">

    <!-- <link rel="stylesheet" href="/store/blackNew/css/the-new-css-reset.css"> -->
    <!-- <link rel="stylesheet" href="/store/blackNew/css/lib/slick.css">
    <link rel="stylesheet" href="/store/blackNew/css/lib/slick-theme.css"> -->
    <link rel="stylesheet" href="/store/blackNew/css/style.css">
    <noscript>
        <link rel="stylesheet" href="/store/blackNew/css/style.css">
    </noscript>
    <script type="text/javascript" src="/store/blackNew/js/lib/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <!-- <meta name="robots" content="noindex"> -->
    <style>
        .p-main-form__inner {
            display: block;
            padding: 0;
        }
    </style>
</head>

<body class="l-body --adj">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W6BSPDHC" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="l-body-inner --adj">
        <header class="l-header">
            <div class="p-header-inner">
                <a href="https://kaikeizimusyotennsyoku.com/" class="p-header-thumb">
                    <img class="p-header-thumb__img" src="/store/blackNew/img/main_logo_pc.webp" alt="メインロゴ">
                </a>
                <p class="p-header-inner__text">税務担当者のためのブラック事務所診断</p>
            </div>
        </header>
        <main class="l-main --adj">
            <div class="p-main-line__wrap">
                <div class="p-main-line">
                    <p class="p-main-line__text --adunansweredj">診断結果をメールにてお送りします。<br>
                        下記フォームをご入力後、送信してください。<br>
                        ※すべて必須項目です
                    </p>
                </div>
            </div>
            <div class="l-main-form --adj">
                <form class="p-main-form" action="/mail/send/5" method="post">
                    <input type="hidden" name="facebook" value="<?php echo isset($_POST['facebook']) ? $_POST['facebook'] : '';  ?>">
                    <input type="hidden" name="src" value="<?php echo isset($_POST['src']) ? $_POST['src'] : '';  ?>">
                    <input type="hidden" name="_token" value="<?php echo isset($_POST['_token']) ? $_POST['_token'] : '';  ?>">
                    <!-- QUESTION 01 -->
                    <input type="hidden" name="month_overtime" value="<?php
                                                                        $month_overtime = $_POST['month_overtime'];
                                                                        $output1 = is_array($month_overtime) ? implode(', ', $month_overtime) : $month_overtime;
                                                                        echo isset($output1) ? $output1 : ''; ?>
                    ">
                    <!-- QUESTION 02 -->
                    <input type="hidden" name="set_overtime" value="<?php
                                                                    $set_overtime = $_POST['set_overtime'];
                                                                    $output1 = is_array($set_overtime) ? implode(', ', $set_overtime) : $set_overtime;
                                                                    echo isset($output1) ? $output1 : ''; ?>
                    ">
                    <!-- QUESTION 03 -->
                    <input type="hidden" name="right_overtime" value="<?php
                                                                        $right_overtime = $_POST['right_overtime'];
                                                                        $output1 = is_array($right_overtime) ? implode(', ', $right_overtime) : $right_overtime;
                                                                        echo isset($output1) ? $output1 : ''; ?>
                    ">
                    <!-- QUESTION 04 -->
                    <input type="hidden" name="attendance" value="<?php
                                                                    $attendance = $_POST['attendance'];
                                                                    $output1 = is_array($attendance) ? implode(', ', $attendance) : $attendance;
                                                                    echo isset($output1) ? $output1 : ''; ?>
                    ">
                    <!-- QUESTION 05 -->
                    <input type="hidden" name="paid_vacation" value="<?php
                                                                        $paid_vacation = $_POST['paid_vacation'];
                                                                        $output1 = is_array($paid_vacation) ? implode(', ', $paid_vacation) : $paid_vacation;
                                                                        echo isset($output1) ? $output1 : ''; ?>
                    ">
                    <!-- QUESTION 06 -->
                    <input type="hidden" name="break_time" value="<?php
                                                                    $break_time = $_POST['break_time'];
                                                                    $output1 = is_array($break_time) ? implode(', ', $break_time) : $break_time;
                                                                    echo isset($output1) ? $output1 : ''; ?>
                    ">
                    <!-- QUESTION 07 -->
                    <input type="hidden" name="training" value="<?php
                                                                $training = $_POST['training'];
                                                                $output1 = is_array($training) ? implode(', ', $training) : $training;
                                                                echo isset($output1) ? $output1 : ''; ?>
                    ">
                    <!-- QUESTION 08 -->
                    <input type="hidden" name="evaluation" value="<?php
                                                                    $evaluation = $_POST['evaluation'];
                                                                    $output1 = is_array($evaluation) ? implode(', ', $evaluation) : $evaluation;
                                                                    echo isset($output1) ? $output1 : ''; ?>
                    ">
                    <!-- QUESTION 09 -->
                    <input type="hidden" name="employee_benefits" value="<?php
                                                                            $employee_benefits = $_POST['employee_benefits'];
                                                                            $output1 = is_array($employee_benefits) ? implode(', ', $employee_benefits) : $employee_benefits;
                                                                            echo isset($output1) ? $output1 : ''; ?>
                    ">
                    <!-- QUESTION 10 -->
                    <input type="hidden" name="relationships" value="<?php
                                                                        $relationships = $_POST['relationships'];
                                                                        $output1 = is_array($relationships) ? implode(', ', $relationships) : $relationships;
                                                                        echo isset($output1) ? $output1 : ''; ?>
                    ">
                    <!-- QUESTION 11 -->
                    <input type="hidden" name="workplace_situation" value="<?php
                                                                            $workplace_situation = $_POST['workplace_situation'];
                                                                            $output1 = is_array($workplace_situation) ? implode(', ', $workplace_situation) : $workplace_situation;
                                                                            echo isset($output1) ? $output1 : ''; ?>
                    ">
                    <!-- QUESTION 12 -->
                    <input type="hidden" name="my_situation" value="<?php
                                                                    $my_situation = $_POST['my_situation'];
                                                                    $output1 = is_array($my_situation) ? implode(', ', $my_situation) : $my_situation;
                                                                    echo isset($output1) ? $output1 : ''; ?>
                    ">
                    <input type="hidden" name="score" value="<?php
                                                                $score = $_POST['score'];
                                                                $output1 = is_array($score) ? implode(', ', $score) : $score;
                                                                echo isset($output1) ? $output1 : ''; ?>
                    ">
                    <!-- <input type="hidden" name="score" value="<?php //echo isset($_POST['score']) ? $_POST['score'] : '';
                                                                    ?>"> -->
                    <input type="hidden" name="経由サイト" value="税務ブラック診断">
                    <p class="p-form-title">お名前</p>
                    <input type="text" name="firstname" class="c-text" value="" placeholder="お名前を入力してください">
                    <p class="p-form-title">メールアドレス</p>
                    <input type="text" name="email" id="" class="c-text" value="" placeholder="メールアドレスを入力してください">
                    <p class="p-form-title">携帯電話番号</p>
                    <input type="text" name="phone_number" id="c-form-tel" class="c-text --adj" value="" placeholder="電話番号(ハイフンなし)を入力してください">
                    <p class="c-form-tel__p"></p>
                    <p class="c-form-mini">メールが届かない場合、<b class="a">SMS</b>にてお送りいたします。</p>
                    <div class="p-main-form__inner">
                        <p class="p-form-title">業界経験年数</p>
                        <div class="p-main-select__wrap --adj">
                            <select class="p-main-select" name="career">
                                <option value="unanswered">未回答</option>
                                <option value="0">未経験</option>
                                <option value="1">1年未満</option>
                                <option value="2">1～4年</option>
                                <option value="3">5～7年</option>
                                <option value="4">8年以上</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-main-form__inner">
                        <p class="p-form-title">生まれ年をお選びください</p>
                        <div class="p-main-select__wrap --adj">
                            <select class="p-main-select" name="age">
                                <option value="unanswered">未回答</option>
                                <?php
                                $currentYear = date('Y');
                                for ($year = 1950; $year <= $currentYear; $year++) : ?>
                                    <option value="<?php echo $year; ?>"><?php echo $year; ?>年</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="p-main-form__inner">
                        <p class="p-form-title">勤務地</p>
                        <div class="p-main-select__wrap --adj">
                            <select class="p-main-select" name="region">
                                <option value="unanswered">未回答</option>
                                <?php
                                $prefectures = array(
                                    "北海道", "青森県", "岩手県", "宮城県", "秋田県",
                                    "山形県", "福島県", "茨城県", "栃木県", "群馬県",
                                    "埼玉県", "千葉県", "東京都", "神奈川県", "新潟県",
                                    "富山県", "石川県", "福井県", "山梨県", "長野県",
                                    "岐阜県", "静岡県", "愛知県", "三重県", "滋賀県",
                                    "京都府", "大阪府", "兵庫県", "奈良県", "和歌山県",
                                    "鳥取県", "島根県", "岡山県", "広島県", "山口県",
                                    "徳島県", "香川県", "愛媛県", "高知県", "福岡県",
                                    "佐賀県", "長崎県", "熊本県", "大分県", "宮崎県",
                                    "鹿児島県", "沖縄県"
                                );
                                foreach ($prefectures as $prefecture) : ?>
                                    <option value="<?php echo $prefecture; ?>"><?php echo $prefecture; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div id="agreement">
                        <h3>プライバシーポリシー</h3>
                        <div>
                            <p>株式会社ミツカル（以下，「当社」といいます。）は，本ウェブサイト上で提供するサービス（以下,「本サービス」といいます。）における，<br /><br />ユーザーの個人情報の取扱いについて，以下のとおりプライバシーポリシー（以下，「本ポリシー」といいます。）を定めます。</p>
                            <br />
                            <p class="bold pb5">第1条（個人情報）</p>
                            <p>「個人情報」とは，個人情報保護法にいう「個人情報」を指すものとし，生存する個人に関する情報であって，<br /><br />当該情報に含まれる氏名，生年月日，住所，電話番号，連絡先その他の記述等により特定の個人を識別できる情報及び<br />容貌，指紋，声紋にかかるデータ，及び健康保険証の保険者番号などの当該情報単体から特定の個人を識別できる情報（個人識別情報）を指します。</p>
                            <br />
                            <p class="bold pb5">第2条（個人情報の収集方法）</p>
                            <p>当社は，ユーザーが利用登録をする際に氏名，生年月日，住所，電話番号，メールアドレス，クレジットカード番号，職務経歴書などの個人情報をお尋ねすることがあります。</p>
                            <br />
                            <p class="bold pb5">第3条（個人情報を収集・利用する目的）</p>
                            <p>当社が個人情報を収集・利用する目的は，以下のとおりです。<br /><br />当社サービスの提供・運営のため<br /><br />ユーザーからのお問い合わせに回答するため（本人確認を行うことを含む）<br /><br />ユーザーが利用中のサービスの新機能，更新情報，キャンペーン等及び当社が提供する他のサービスの案内のメールを送付するためメンテナンス，重要なお知らせなど必要に応じたご連絡のため<br /><br />利用規約に違反したユーザーや，不正・不当な目的でサービスを利用しようとするユーザーの特定をし，ご利用をお断りするためユーザーにご自身の登録情報の閲覧や変更，削除，ご利用状況の閲覧を行っていただくため，有料サービスにおいて，ユーザーに利用料金を請求するため上記の利用目的に付随する目的</p>
                            <br />
                            <p class="bold pb5">第4条（利用目的の変更）</p>
                            <p>当社は，利用目的が変更前と関連性を有すると合理的に認められる場合に限り，個人情報の利用目的を変更するものとします。<br /><br />利用目的の変更を行った場合には，変更後の目的について，当社所定の方法により，ユーザーに通知し，または本ウェブサイト上に公表するものとします。</p>
                            <br />
                            <p class="bold pb5">第5条（個人情報の第三者提供）</p>
                            <p>当社は，次に掲げる場合を除いて，あらかじめユーザーの同意を得ることなく，第三者に個人情報を提供することはありません。ただし，個人情報保護法その他の法令で認められる場合を除きます。<br /><br />人の生命，身体または財産の保護のために必要がある場合であって，本人の同意を得ることが困難であるとき<br /><br />公衆衛生の向上または児童の健全な育成の推進のために特に必要がある場合であって，本人の同意を得ることが困難であるとき<br /><br />国の機関もしくは地方公共団体またはその委託を受けた者が法令の定める事務を遂行することに対して協力する必要がある場合であって，本人の同意を得ることにより当該事務の遂行に支障を及ぼすおそれがあるとき<br /><br />予め次の事項を告知あるいは公表し，かつ当社が個人情報保護委員会に届出をしたとき<br /><br />利用目的に第三者への提供を含むこと<br /><br />第三者に提供されるデータの項目<br /><br />第三者への提供の手段または方法<br /><br />本人の求めに応じて個人情報の第三者への提供を停止すること<br /><br />本人の求めを受け付ける方法<br /><br />前項の定めにかかわらず，次に掲げる場合には，当該情報の提供先は第三者に該当しないものとします。<br /><br />当社が利用目的の達成に必要な範囲内において個人情報の取扱いの全部または一部を委託する場合<br /><br />合併その他の事由による事業の承継に伴って個人情報が提供される場合<br /><br />個人情報を特定の者との間で共同して利用する場合であって，その旨並びに共同して利用される個人情報の項目，共同して利用する者の範囲，利用する者の利用目的および当該個人情報の管理について責任を有する者の氏名または名称について，あらかじめ本人に通知し，または本人が容易に知り得る状態に置いた場合</p>
                            <br />
                            <p class="bold pb5">第6条（個人情報の開示）</p>
                            <p>当社は，本人から個人情報の開示を求められたときは，本人に対し，遅滞なくこれを開示します。ただし，開示することにより次のいずれかに該当する場合は，<br /><br />その全部または一部を開示しないこともあり，開示しない決定をした場合には，その旨を遅滞なく通知します。<br /><br />本人または第三者の生命，身体，財産その他の権利利益を害するおそれがある場合<br /><br />当社の業務の適正な実施に著しい支障を及ぼすおそれがある場合<br /><br />その他法令に違反することとなる場合<br /><br />前項の定めにかかわらず，履歴情報および特性情報などの個人情報以外の情報については，原則として開示いたしません。</p>
                            <br />
                            <p class="bold pb5">第7条（個人情報の訂正および削除）</p>
                            <p>ユーザーは，当社の保有する自己の個人情報が誤った情報である場合には，当社が定める手続きにより，当社に対して個人情報の訂正，追加または削除（以下，「訂正等」といいます。）を請求することができます。<br /><br />当社は，ユーザーから前項の請求を受けてその請求に応じる必要があると判断した場合には，遅滞なく，当該個人情報の訂正等を行うものとします。<br /><br />当社は，前項の規定に基づき訂正等を行った場合，または訂正等を行わない旨の決定をしたときは遅滞なく，これをユーザーに通知します。</p>
                            <br />
                            <p class="bold pb5">第8条（個人情報の利用停止等）</p>
                            <p>当社は，本人から，個人情報が，利用目的の範囲を超えて取り扱われているという理由，または不正の手段により取得されたものであるという理由により，その利用の停止<br /><br />または消去（以下，「利用停止等」といいます。）を求められた場合には，遅滞なく必要な調査を行います。<br /><br />前項の調査結果に基づき，その請求に応じる必要があると判断した場合には，遅滞なく，当該個人情報の利用停止等を行います。<br /><br />当社は，前項の規定に基づき利用停止等を行った場合，または利用停止等を行わない旨の決定をしたときは，遅滞なく，これをユーザーに通知します。<br /><br />前2項にかかわらず，利用停止等に多額の費用を有する場合その他利用停止等を行うことが困難な場合であって，ユーザーの権利利益を保護するために必要なこれに代わるべき措置をとれる場合は，この代替策を講じるものとします。</p>
                            <br />
                            <p class="bold pb5">第9条（プライバシーポリシーの変更）</p>
                            <p>本ポリシーの内容は，法令その他本ポリシーに別段の定めのある事項を除いて，ユーザーに通知することなく，変更することができるものとします。<br /><br />当社が別途定める場合を除いて，変更後のプライバシーポリシーは，本ウェブサイトに掲載したときから効力を生じるものとします。</p>
                            <br />
                            <p class="bold pb5">第10条（お問い合わせ窓口）</p>
                            <p>本ポリシーに関するお問い合わせは，下記の窓口までお願いいたします。<br /><br />住所：東京都品川区上大崎３丁目２−１ 目黒センタービル 8階<br /><br />社名：株式会社ミツカル<br /><br />担当部署：事務局<br /><br />Eメールアドレス：info@mitsukaru-jpn.com</p>
                            <br />
                            <p class="agreement_inbox01">当サイトでは広告の効果測定のため、第三者の運営するツールから当サイトに訪れる前にクリックされている広告丈夫尾（クリック日や広告掲載サイトなど）を取得し、ご注文の情報と照合する場合がございます。</p>
                        </div>
                        <p class="p-step-text">プライバシーポリシーに<br>同意した上で送信する</p>
                    </div>
                    <p class="c-error-text">入力にエラーがあります。</p>
                    <div class="p-step-flex">
                        <p class="p-step-flex__text">診断中 ・ ・ ・</p><img class="c-spin" src="/store/blackNew/img/spin.gif" alt="ロード">
                    </div>
                    <input type="submit" class="p-form-button --submit --adj" value="送信">
                </form>
            </div>
        </main>

        <!-- <footer class="l-footer">
      <p class="p-footer-copy">©, All Rights Reserved.</p>
    </footer> -->
        <!-- <script type="text/javascript" src="/store/blackNew/js/lib/heightLine.js"></script> -->
        <!-- <script type="text/javascript" src="/store/blackNew/js/lib//slick.min.js"></script> -->
        <script type="text/javascript">
            $(document).ready(function() {
                // 入力フォームの変更を監視してクラスの付け替えを行う関数
                function updateClass() {
                    var textInputs = document.querySelectorAll('input[type="text"]');
                    var selects = document.querySelectorAll('select');
                    var allTextInputsFilled = true;
                    var allSelectsAnswered = true;
                    for (var i = 0; i < textInputs.length; i++) {
                        if (textInputs[i].value.trim() === '') {
                            allTextInputsFilled = false;
                            break;
                        }
                    }
                    for (var j = 0; j < selects.length; j++) {
                        if (selects[j].value === 'unanswered') {
                            allSelectsAnswered = false;
                            break;
                        }
                    }
                    if (allTextInputsFilled && allSelectsAnswered) {
                        var elementToHighlight = document.querySelector('.special-class');
                        elementToHighlight.classList.add('highlight');
                    } else {
                        var highlightedElements = document.querySelectorAll('.highlight');
                        for (var k = 0; k < highlightedElements.length; k++) {
                            highlightedElements[k].classList.remove('highlight');
                        }
                    }
                }
                // 各入力フォームの変更を監視してクラスの付け替えを行う
                var textInputs = document.querySelectorAll('input[type="text"]');
                var selects = document.querySelectorAll('select');
                for (var l = 0; l < textInputs.length; l++) {
                    textInputs[l].addEventListener('input', updateClass);
                }
                for (var m = 0; m < selects.length; m++) {
                    selects[m].addEventListener('change', updateClass);
                }

                function validateForm() {
                    var isValid = true;
                    var requiredFields = ["firstname", "email", "phone_number"];
                    $.each(requiredFields, function(index, fieldName) {
                        var fieldValue;
                        if (fieldName === "email") {
                            fieldValue = $("input[name='" + fieldName + "']").val().trim();
                            var emailRegex = /^.+@.+\..+$/;
                            if (fieldValue === "") {
                                $("input[name='" + fieldName + "']").addClass("invalid-field");
                                isValid = false;
                            } else if (!emailRegex.test(fieldValue)) {
                                $('.c-form-tel__p--mail').text('emailの形式が異なります。');
                                $("input[name='" + fieldName + "']").addClass("invalid-field");
                                isValid = false;
                            } else {
                                $("input[name='" + fieldName + "']").removeClass("invalid-field");
                                $('.c-form-tel__p--mail').text('');
                            }
                        } else {
                            fieldValue = $("input[name='" + fieldName + "']").val().trim();
                            if (fieldValue === "") {
                                $("input[name='" + fieldName + "']").addClass("invalid-field");
                                isValid = false;
                            } else {
                                $("input[name='" + fieldName + "']").removeClass("invalid-field");
                            }
                        }
                    });
                    return isValid;
                }

                function validateTel() {
                    var isValid = true;
                    var input = $('#c-form-tel').val();
                    var regex = /^0\d{9,10}$/;
                    if (input === "") {
                        isValid = false;
                        $("input[name='phone_number']").addClass("invalid-field");
                    } else if (!regex.test(input)) {
                        isValid = false;
                        $('.c-form-tel__p').text('有効な電話番号を入力してください。');
                        $("input[name='phone_number']").addClass("invalid-field");
                    } else {
                        $("input[name='phone_number']").removeClass("invalid-field");
                        $('.c-form-tel__p').text('');
                    }
                    return isValid;
                }

                function validateSelect() {
                    var isValid = true;
                    $('form').find('.p-main-select').each(function() {
                        if ($(this).val() === 'unanswered') {
                            $(this).addClass('invalid-field');
                            isValid = false;
                        } else {
                            $(this).removeClass('invalid-field');
                        }
                    });
                    if ($(this).find('.invalid-field').length > 0) {
                        isValid = false;
                    }
                    return isValid;
                }
                $("form").submit(function(event) {
                    var isValidForm = validateForm();
                    var isValidTel = validateTel();
                    var isValidSelect = validateSelect();
                    if (isValidForm && isValidTel && isValidSelect) {
                        $(".p-step-flex").addClass("js-appear");
                        $(".c-error-text").removeClass("js-trigger");
                    } else {
                        event.preventDefault();
                        $(".c-error-text").addClass("js-trigger");
                    }
                });
            });

            $(document).ready(function() {
                function checkSelectFields() {
                    $('.p-main-select').each(function() {
                        if ($(this).val() === 'unanswered') {
                            $(this).addClass('invalid-field');
                        } else {
                            $(this).removeClass('invalid-field');
                        }
                    });
                }
                $('.p-main-select').change(function() {
                    checkSelectFields();
                });
                $(".p-main-form__inner").each(function() {
                    checkSelectSelection($(this));
                });
                $(".p-main-form__inner .p-main-select").on("change", function() {
                    var currentArea = $(this).closest(".p-main-form__inner");
                    checkSelectSelection(currentArea);
                });

                function checkSelectSelection(currentArea) {
                    var nextButton = currentArea.find(".p-form-button");
                    var isAllSelected = true;
                    currentArea.find(".p-main-select").each(function() {
                        var selectedValue = $(this).val();
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
            });
        </script>
    </div>
</body>

</html>
