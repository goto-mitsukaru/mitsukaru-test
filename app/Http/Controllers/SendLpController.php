<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Company;
use App\Models\Income;
use App\Models\License;
use App\Models\Feature;
use App\Models\Movie;
use App\Models\Occupation;
use App\Models\PrefectureMaster;
use App\Models\Recruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class SendLpController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        require_once(__DIR__.'/sendmail.php');
        header('Content-Type: application/json; charset=utf-8');

        /*
         * ここから設定
         */
// フォームのデータ形式を定義

        $FORM_DATA = [
            [
                'propertyName' => 'status',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'points',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => false,
            ],
            [
                'propertyName' => 'licenses',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => false,
            ],
            [
                'propertyName' => 'timing',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'area',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,

            ],
            [
                'propertyName' => 'experience',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'birthYear',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'birthMonth',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'birthDay',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'lastName',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'firstName',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'tel',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'mail',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => true,
            ],
            [
                'propertyName' => 'media',
                'filter' => FILTER_SANITIZE_STRING,
                'required' => false,
            ],
        ];

// メールの設定
        $FROM_NAME = '転職サービス【ミツカル】'; // 送信者名
        $FROM_EMAIL = 'info@taxtennsyokusinndann.com'; // 送信元アドレス
        $FROM_EMAIL = 'cocoa2647@gmail.com';

// $ADMIN_EMAIL = 'y.kambayashi@flexbox.co.jp'; // 管理者用メールアドレス
        $ADMIN_CC = ''; // 管理者用 CC メールアドレス

// 本番はこちらに送る
        $ADMIN_EMAIL = 'info@taxtennsyokusinndann.com';
        $ADMIN_EMAIL = 'cocoa2647@gmail.com';
// $ADMIN_CC = '';

// コンテンツ
        date_default_timezone_set('Asia/Tokyo');
        $now = date("Y年m月d日 H時i分s秒");

        $ADMIN_SUBJECT = '公認会計士LPから登録を受け付けました';// 管理者用メールタイトル
        $ADMIN_BODY = "以下のLPから登録を受け付けました。\r\n";
        $ADMIN_BODY .= "ご対応お願いいたします。\r\n";
        $ADMIN_BODY .= "\r\n";
        $ADMIN_BODY .= "https://mitsukaru.cc/lp_kaikeishi_01\r\n";
        $ADMIN_BODY .= "──────────────────────────\r\n";
        $ADMIN_BODY .= "①転職活動状況：{{status}}\r\n";
        $ADMIN_BODY .= "②今回の転職で重視するポイント：{{points}}\r\n";
        $ADMIN_BODY .= "③お持ちの資格：{{licenses}}\r\n";
        $ADMIN_BODY .= "④希望転職時期：{{timing}}\r\n";
        $ADMIN_BODY .= "⑤希望勤務地：{{area}}\r\n";
        $ADMIN_BODY .= "⑥経験年数：{{experience}}\r\n";
        $ADMIN_BODY .= "⑦生まれ年：{{birthYear}}/{{birthMonth}}/{{birthDay}}\r\n";
        $ADMIN_BODY .= "⑦姓：{{lastName}}\r\n";
        $ADMIN_BODY .= "⑦名：{{firstName}}\r\n";
        $ADMIN_BODY .= "⑧電話番号：{{tel}}\r\n";
        $ADMIN_BODY .= "⑧アドレス：{{mail}}\r\n";
        $ADMIN_BODY .= "──────────────────────────\r\n";
        $ADMIN_BODY .= "\r\n";

        $USER_SUBJECT = '【重要】公認会計士特化の転職サービス【ミツカル】にご登録ありがとうございます';
        $USER_BODY = "※こちらは自動返信メールとなります。\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "{{lastName}} {{firstName}}様\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "ミツカルにご登録いただきありがとうございました。\r\n";
        $USER_BODY .= "以下、今後の流れになります。\r\n";
        $USER_BODY .= "あなたのより良い転職を実現するために、目を通していただけますと幸いです。\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "～今後の流れ～\r\n";
        $USER_BODY .= "①お電話にて詳細をヒアリングさせて下さい。\r\n";
        $USER_BODY .= "面談時に希望の事務所を紹介するために、お電話にて、\r\n";
        $USER_BODY .= "あなたの経験や実績、担当案件など確認させ\r\n";
        $USER_BODY .= "て下さい。\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "1時間以内に下記の電話番号からお電話いたします。\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "担当電話番号：090-8506-6780 or 080-4449-0163\r\n";
        $USER_BODY .= "※最初のお電話には必ずご対応頂けますようお願い致します。\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "②キャリアコンシェルジュとのzoom面談の日程を調整してください。\r\n";
        $USER_BODY .= "面談にてあなたの希望に合った事務所をお伝えします。\r\n";
        $USER_BODY .= "地域専門のキャリアコンシェルジュが対応致します。\r\n";
        $USER_BODY .= "すぐに転職したい方も、そうでない方も、その方の状況に合わせてアドバイスを差し上げます。\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "▼日程調整URL\r\n";
        $USER_BODY .= "・東日本在住の方はこちら（北海道・東北・関東・東海・中部・北陸）\r\n";
        $USER_BODY .= "https://nitte.app/LdDNwczz5La5U9G7oIcIx1KrhZv2/0e87294b\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "・西日本在住の方はこちら（関西・中国・四国・九州・沖縄）\r\n";
        $USER_BODY .= "https://nitte.app/yZwMF3XqloRzQO2AqMv67ZgJBZo2/f8174d79\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "③事務所面談\r\n";
        $USER_BODY .= "ミツカルにはホワイト会計事務所の求人を多数保有しています。\r\n";
        $USER_BODY .= "お話ししたい事務所がありましたら、事務所の代表の方とのカジュアルzoom面談を設定させていただきます。\r\n";
        $USER_BODY .= "入社に向けた選考に参加することも可能です。\r\n";
        $USER_BODY .= "\r\n";
        $USER_BODY .= "どうぞよろしくお願いいたします。\r\n";
        $USER_BODY .= "…………………………………………………………………………………………………………\r\n";
        $USER_BODY .= "会社名： 株式会社ミツカル\r\n";
        $USER_BODY .= "住 所： 〒141-0021 東京都品川区上大崎3-2-1 目黒センタービル 8階\r\n";
        $USER_BODY .= "E-mail： info@mitsukaru-jpn.com\r\n";
        $USER_BODY .= "URL： https://mitsukaru.cc/\r\n";
        $USER_BODY .= "\r\n";

        /*
         * ここまでがデータの設定。
         * 以下は変更する必要がない
         */

// フィルタを作って POST DATA を SANITIZE
        $filters = [];
        foreach ($FORM_DATA as $data) {
            $filters[$data['propertyName']] = $data['filter'];
        }
        $post_data = filter_input_array(INPUT_POST, $filters);

// フィルタ結果のチェック
        foreach ($FORM_DATA as $data) {
            if ($data['required'] && !$post_data[$data['propertyName']]) {
                http_response_code(400);
                echo json_encode(array('error' => $post_data));
                return;
            }
        }

// フォームデータに置き換え
        foreach ($FORM_DATA as $data) {
            $key = $data['propertyName'];
            $value = (isset($post_data[$key]) && $post_data[$key] !== '') ? $post_data[$key] : "選択なし";
            $ADMIN_BODY = str_replace("{{{$key}}}", $value, $ADMIN_BODY);
            $USER_BODY = str_replace("{{{$key}}}", $value, $USER_BODY);
            $ADMIN_SUBJECT = str_replace("{{{$key}}}", $value, $ADMIN_SUBJECT);
            $USER_SUBJECT = str_replace("{{{$key}}}", $value, $USER_SUBJECT);
        }

// 確認用にユーザーへ送信
        sendmail($post_data['mail'], '', $FROM_NAME, $FROM_EMAIL, $USER_SUBJECT, $USER_BODY);

// 管理者に送信（こちらが重要なのでこちらの結果だけ確認）
        $result = sendmail($ADMIN_EMAIL, $ADMIN_CC, $FROM_NAME, $FROM_EMAIL, $ADMIN_SUBJECT, $ADMIN_BODY);

// レスポンスを返す。正常に完了していれば200（正常コード）、そうでなければ内部エラーと判断して500（異常コード）を返す
        return $result ? '200' : '500';
    }
}
