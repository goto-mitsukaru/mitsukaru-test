<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSpreadSheet extends Model
{
    use HasFactory;

    // スプレッドシート挿入用Function
    static function insert_spread_sheet($insert_data)
    {
        // スプレッドシートを操作するGoogleClientインスタンスの生成（後述のファンクション）
        $sheets = FormSpreadSheet::instance();

        // データを格納したい SpreadSheet のURLが
        // https://docs.google.com/spreadsheets/d/×××××××××××××××××××/edit#gid=0
        // である場合、××××××××××××××××××× の部分を以下に記入する
        $env = config('environment.env');
        if ($env == 'develop') {
        //開発用スプシ
            $sheet_id = '1Pkv0qMNSNlQIioZIEZLMCSEdIVcteKnzlrh6RTdruVc';
        }else{
        //本番用スプシ
            $sheet_id = '127mD8Ob6pVEskMHzeCM0uMcEB_6Hm8FYD_iQdc7sjq4';
        }

        $range = 'A:Z';
        $response = $sheets->spreadsheets_values->get($sheet_id, $range);
        // 格納する行の計算
        $values = $response->getValues();
        $row = count($values) > 0 ? count($values) + 1 : 1; // 行にデータがあれば次の行に、なければ最初の行にデータを挿入

        // データを整形（この順序でシートに格納される）
        $contact = [
            $insert_data['title'],
            $insert_data['name'],
            $insert_data['mail_address'],
            $insert_data['phone_number'],
            $insert_data['area'],
            $insert_data['age'],
            $insert_data['cv_date'],
            $insert_data['cv_time'],
            $insert_data['p'],
            $insert_data['license'],
            $insert_data['career'],
            $insert_data['management_experience'],
            $insert_data['t'],
            $insert_data['env'],
            $insert_data['charge_number'],
            $insert_data['annual_sales'],
            $insert_data['yearly_income'],
            $insert_data['plus_3'],
            $insert_data['text_form'],

        ];
        $values = new \Google_Service_Sheets_ValueRange();
        $values->setValues([
            'values' => $contact
        ]);
        $sheets->spreadsheets_values->append(
            $sheet_id,
            'H'.$row,
            $values,
            ["valueInputOption" => 'USER_ENTERED']
        );

        return true;
    }

    // スプレッドシート操作用のインスタンスを生成するFunction
    public static function instance() {
        // storage/app/json フォルダに GCP からダウンロードした JSON ファイルを設置する
        $credentials_path = storage_path('app/json/credentials.json');
        $client = new \Google_Client();
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAuthConfig($credentials_path);
        return new \Google_Service_Sheets($client);
    }
}
