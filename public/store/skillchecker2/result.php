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
    })(window, document, 'script', 'dataLayer', 'GTM-PDF9TBC7');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="獣医師限定、あなたの外科診療スキルを階級別に診断します！できる外科処置を選ぶだけで初級・中級・上級別の習熟度がわかります。あなたの外科スキルの市場価値を確かめてください。">
    <title>獣医師のための外科診療スキル診断</title>
    <link rel="icon" href="./img/favicon.ico">
    <link rel="canonical" href="https://animal-mitsukaru.com/skillchecker2/result.php">
    <!-- <link rel="stylesheet" href="./css/the-new-css-reset.css"> -->
    <!-- <link rel="stylesheet" href="./css/lib/slick.css">
    <link rel="stylesheet" href="./css/lib/slick-theme.css"> -->
    <link rel="stylesheet" href="./css/style.css">
    <noscript>
        <link rel="stylesheet" href="./css/style.css">
    </noscript>
    <script type="text/javascript" src="./js/lib/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <!-- <meta name="robots" content="noindex"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

</head>

<body class="l-body">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PDF9TBC7" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="l-body-inner --result">
        <header class="l-header">
            <div class="p-header-inner">
                <a href="https://animal-mitsukaru.com/lp01/" class="p-header-thumb">
                    <img class="p-header-thumb__img" src="./img/main_logo_pc.webp" alt="メインロゴ">
                </a>
                <p class="p-header-inner__text">獣医師のための外科診療スキル診断</p>
            </div>
        </header>
        <main class="l-main --result">
            <div class="p-result-thumb">
                <?php
// クエリ文字列から 'param' の値を取得
$elementaryValue = isset($_GET['elementary']) ? $_GET['elementary'] : '';
$intermediateValue = isset($_GET['intermediate']) ? $_GET['intermediate'] : '';
$advancedValue = isset($_GET['advanced']) ? $_GET['advanced'] : '';
// 条件分岐
// unset($_SESSION['yesCount1']);
?>

                <div class="p-result-content-box">
                    <div class="p-result-content">
                        <div class="head"><img src="./img/beginner-title.png" alt="外科技能初級"></div>
                        <div class="count">
                            <p class="ja">レベル<span class="num"><?php echo $elementaryValue; ?></span></p>
                        </div>
                        <div class="numbers">
                            <?php for ($i = 0; $i <= 9; $i++) {
    if ($elementaryValue > $i) {
        $class = "on";
    } else {
        $class = "";
    }
    echo '<span class="' . $class . '"></span>';
}?>
                        </div>
                        <?php if ($elementaryValue <= 3) {?>
                        <div class="c-main-text">臨床外科のスタート地点にたったばかり。今後の外科スキルの基礎になる大事なステップです。基本に忠実に、切開や結紮、縫合、麻酔のスキルを着実なものにしていきましょう。</div>
                        <?php } elseif (4 <= $elementaryValue && $elementaryValue <= 7) {?>
                        <div class="c-main-text">手術の流れに慣れてきて、去勢避妊から次のステップへスキルを広げ始めているタイミング。組織の剥離や血管の処理、粘膜の縫合など軟部組織の丁寧な扱いの基本を身につけていきましょう。</div>
                        <?php } elseif (8 <= $elementaryValue && $elementaryValue <= 10) {?>
                        <div class="c-main-text">一次病院でよく行われる初歩的な外科手術を広く執刀し始めている先生は、病院内でも外科戦力として周りからも期待される技能を身につけています。より繊細な剥離や粘膜縫合の感覚を習得し、院長クラスの外科技能習得を目指しましょう。</div>
                        <?php }?>

                    </div>
                    <div class="p-result-content">
                        <div class="head"><img src="./img/intermediate-title.png" alt="外科技能中級"></div>
                        <div class="count">
                            <p class="ja">レベル<span class="num"><?php echo $intermediateValue; ?></span></p>
                        </div>
                        <div class="numbers">
                            <?php for ($i = 0; $i <= 9; $i++) {
    if ($intermediateValue > $i) {
        $class = "on";
    } else {
        $class = "";
    }
    echo '<span class="' . $class . '"></span>';
}?>
                        </div>
                        <?php if ($intermediateValue <= 3) {?>
                        <div class="c-main-text">初歩的な外科技能からさらにステップアップし、より繊細な操作を求められる外科を実施している先生は、外科手術において病院内でもかなり頼りになる存在となっていることでしょう。</div>
                        <?php } elseif (4 <= $intermediateValue && $intermediateValue <= 7) {?>
                        <div class="c-main-text">基礎的な軟部外科はもちろん初歩的な整形外科も卒なく執刀できる先生は、病院の運営にも大きく貢献していることでしょう。</div>
                        <?php } elseif (8 <= $intermediateValue && $intermediateValue <= 10) {?>
                        <div class="c-main-text">一次病院で頻繁に行われるレベルの外科手術に関して、ほとんど十分な技能を持っています。病院内でも上級医クラスの外科技能で、周りからも外科の相談や依頼をされるほど頼られる存在となっているでしょう。</div>
                        <?php }?>

                    </div>
                    <div class="p-result-content">
                        <div class="head"><img src="./img/advanced-title.png" alt="外科技能上級"></div>
                        <div class="count">
                            <p class="ja">レベル<span class="num"><?php echo $advancedValue; ?></span></p>
                        </div>
                        <div class="numbers">
                            <?php for ($i = 0; $i <= 9; $i++) {
    if ($advancedValue > $i) {
        $class = "on";
    } else {
        $class = "";
    }
    echo '<span class="' . $class . '"></span>';
}?>
                        </div>
                        <?php if ($advancedValue <= 3) {?>
                        <div class="c-main-text">軟部外科、整形外科ともに一般一次病院で行われるレベルの外科は大部分執刀可能な技能を持っています。イレギュラーの多い手術も経験と知識をもって落ち着いて対処できるよう難しい外科も経験を増やしていきましょう。</div>
                        <?php } elseif (4 <= $advancedValue && $advancedValue <= 7) {?>
                        <div class="c-main-text">手術中の判断力や繊細な手技を問われる症例も確実に対処できる技能を持っています。病院内では外科医として中心的なポジションで活躍できるでしょう。</div>
                        <?php } elseif (8 <= $advancedValue && $advancedValue <= 10) {?>
                        <div class="c-main-text">一次病院で行われる軟部外科、整形外科に広く精通し、自院のみならず他院からも頼られ、外科分野ではかなりの存在感を示していることでしょう。</div>
                        <?php }?>
                    </div>
                </div>

                <div class="p-result-bottom">
                    <div class="head">診断結果はいかがでしたでしょうか？</div>
                    <div class="box">
                        <div class="article">現在の獣医師としての市場価値を知ると、<br>今後進むべき道がみえてきます。</div>
                        <div class="btn"><a href="https://animal-mitsukaru.com/incomechecker/"><span class="ja">他の診断もやってみる</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M255.9,512C114.3,511.8-0.3,397,0,255.6C0.3,113.7,114.9-0.3,257.3,0C397.8,0.2,512.2,115.3,512,256.2	C511.8,397.6,397.1,512.2,255.9,512z M256.2,19c-131.1,0-237.4,106.5-237.3,237.2C19,385.6,124.2,493.8,257.6,493	c130.8-0.8,235.5-107.4,235.5-237.1C493,125.2,386.8,19,256.2,19z M300.3,273.7c-30.3,29.7-60.9,59.2-91.3,88.8	c-4.5,4.3-4.9,10.2-1,14.2c3.9,4,9.8,3.8,14.2-0.6c14.6-14.2,29.2-28.4,43.8-42.5c13.9-13.5,27.8-27,41.7-40.5	c10.2-9.9,20.5-19.9,30.6-29.9c4.1-4,4.6-9.6,1.4-13.2c-1.2-1.4-2.5-2.6-3.9-3.9c-14.4-14-28.7-27.9-43.1-41.9	c-23.4-22.8-46.9-45.5-70.3-68.3c-4.7-4.5-10.5-4.9-14.4-1c-4.1,4.1-3.7,9.8,1.3,14.6c4.7,4.6,9.5,9.2,14.3,13.9	c29.3,28.5,58.5,56.9,87.8,85.4c2.3,2.3,4.7,4.5,6.1,5.8C311.7,261.2,306.3,267.8,300.3,273.7z" />
                                    </svg></span></a></div>
                    </div>
                    <div class="box">
                        <div class="article"><span class="line">ニーズの高い診療スキル</span>を習得済みの先生は、<br>
                            今より好条件の求人と出会える可能性が高いです！<br>
                            転職意欲がなくとも、<span class="line">ほかの動物病院の話</span>が<br>
                            カジュアルに聞けますので、こちらもご覧ください。</div>
                        <div class="btn"><a href="https://animal-mitsukaru.com/lp01/?utm_source=site&utm_medium=link&utm_campaign=cc"><span class="ja">獣医師向け求人サイトをみてみる</span><span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M255.9,512C114.3,511.8-0.3,397,0,255.6C0.3,113.7,114.9-0.3,257.3,0C397.8,0.2,512.2,115.3,512,256.2	C511.8,397.6,397.1,512.2,255.9,512z M256.2,19c-131.1,0-237.4,106.5-237.3,237.2C19,385.6,124.2,493.8,257.6,493	c130.8-0.8,235.5-107.4,235.5-237.1C493,125.2,386.8,19,256.2,19z M300.3,273.7c-30.3,29.7-60.9,59.2-91.3,88.8	c-4.5,4.3-4.9,10.2-1,14.2c3.9,4,9.8,3.8,14.2-0.6c14.6-14.2,29.2-28.4,43.8-42.5c13.9-13.5,27.8-27,41.7-40.5	c10.2-9.9,20.5-19.9,30.6-29.9c4.1-4,4.6-9.6,1.4-13.2c-1.2-1.4-2.5-2.6-3.9-3.9c-14.4-14-28.7-27.9-43.1-41.9	c-23.4-22.8-46.9-45.5-70.3-68.3c-4.7-4.5-10.5-4.9-14.4-1c-4.1,4.1-3.7,9.8,1.3,14.6c4.7,4.6,9.5,9.2,14.3,13.9	c29.3,28.5,58.5,56.9,87.8,85.4c2.3,2.3,4.7,4.5,6.1,5.8C311.7,261.2,306.3,267.8,300.3,273.7z" />
                                    </svg>
                                </span></a></div>
                    </div>
                </div>
                <!-- <a class="c-result-button" href="https://animal-mitsukaru.com/lp01/">ミツカルの転職支援サイトへ</a> -->
            </div>

        </main>

        <!-- <footer class="l-footer">
      <p class="p-footer-copy">©, All Rights Reserved.</p>
    </footer> -->
        <!-- <script type="text/javascript" src="./js/lib/heightLine.js"></script> -->
        <!-- <script type="text/javascript" src="./js/lib//slick.min.js"></script> -->
        <!-- <script type="text/javascript" src="./js/script.js"></script> -->
    </div>
</body>

</html>