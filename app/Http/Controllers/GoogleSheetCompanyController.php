<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Sheets;
use Illuminate\Support\Str;

class GoogleSheetCompanyController extends Controller
{
    const SPREADSHEET_ID = '1Uyy3Uzl5lbwcmbX53ORBWbndjoyaJUtKgPhuK-BIHMM';
    const MAX_ROW = 100000; // 最大 100000 行を読み取る

    public function webhook(Request $request)
    {
        $spreadsheet_id = $request->spreadsheet_id;

        if($spreadsheet_id !== self::SPREADSHEET_ID) {

            abort(400, '不正なアクセスです');

        }

        $sheet = $this->getSheetClient();

        $range = 'A1:N'. self::MAX_ROW;
        $response = $sheet->spreadsheets_values->get(self::SPREADSHEET_ID, $range);
        $sheet_data = $response->getValues();
        $existing_company_ids = [];

        foreach ($sheet_data as $index => $row) {

            if($index === 0) continue; // 1行目はヘッダーなのでスキップ

            $name = data_get($row, 0, '');
            $workplace = data_get($row, 1, '');
            $feature = data_get($row, 2, '');
            $income = data_get($row, 3, '');
            $adviser = data_get($row, 4, '');
            $matter = data_get($row, 5, '');
            $soft = data_get($row, 6, '');
            $url = data_get($row, 7, '');
            $employee = data_get($row, 8, '');
            $mvv = data_get($row, 9, '');
            $scale = data_get($row, 10, '');
            $number = data_get($row, 11, '');
            $business = data_get($row, 12, '');
            $average_number = data_get($row, 13, '');

            if(Str::length($name) > 0) {

                $company = Company::firstOrNew(['name' => $name]);
                $company->name = $name;
                $company->workplace = $workplace;
                $company->feature = $feature;
                $company->income = $income;
                $company->adviser = $adviser;
                $company->matter = $matter;
                $company->soft = $soft;
                $company->url = $url;
                $company->employee = $employee;
                $company->mvv = $mvv;
                $company->scale = $scale;
                $company->number = $number;
                $company->business = $business;
                $company->average_number = $average_number;
                $company->sheet_flag = 1;

                $company->save();

                $existing_company_ids[] = $company->id;

            }

        }

        if(count($existing_company_ids) > 0) {

            Company::where('sheet_flag', 1)->whereNotIn('id', $existing_company_ids)->delete();

        }
    }

    private function getSheetClient(): Google_Service_Sheets
    {
        $credentials_path = storage_path('app/json/credentials.json');

        $client = new Google_Client();
        $client->setAuthConfig($credentials_path);
        $client->setScopes([
            Google_Service_Sheets::SPREADSHEETS,
        ]);

        return new Google_Service_Sheets($client);
    }
}

