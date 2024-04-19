<?php

// 日本語のメールを配信するための言語設定
mb_language('ja');
mb_internal_encoding('UTF-8');

function sendmail($to, $cc, $from_name, $from_email, $subject, $body)
{
    // メールヘッダの設定（基本的にクライアント用も管理者用も共通
    $header = 'From: ' . mb_encode_mimeheader($from_name) . '<' . $from_email . ">\r\n";
    if ($cc !== "") {
        $header .= 'Cc: ' . $cc . "\r\n";
    }
    $header .= "Content-type: text/plain; charset=\"UTF-8\"\r\n";
    $header .= "Content-Transfer-Encoding: 8bit\r\n";

    $result = mb_send_mail($to, $subject, $body, $header);
    return $result;
}
