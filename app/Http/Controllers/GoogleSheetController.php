<?php

namespace App\Http\Controllers;

use App\Models\Recruit;
use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Sheets;
use Illuminate\Support\Str;

class GoogleSheetController extends Controller
{
    const SPREADSHEET_ID = '1UXqFEfZhv1uUgcKKtkbmZt0scfgD3DlEIVs9tWJz7Xw';
    const MAX_ROW = 100000; // 最大 100000 行を読み取る

    public function webhook(Request $request)
    {
        $spreadsheet_id = $request->spreadsheet_id;

        if($spreadsheet_id !== self::SPREADSHEET_ID) {

            abort(400, '不正なアクセスです');

        }

        $sheet = $this->getSheetClient();

        $range = 'A1:Z'. self::MAX_ROW;
        $response = $sheet->spreadsheets_values->get(self::SPREADSHEET_ID, $range);
        $sheet_data = $response->getValues();
        $existing_recruit_ids = [];

        foreach ($sheet_data as $index => $row) {

            if($index === 0) continue; // 1行目はヘッダーなのでスキップ

            $name = data_get($row, 0, '');
            $scale_id = data_get($row, 2, '');
            $status_id = data_get($row, 6, '');
            $category = data_get($row, 7, '');
            $income = data_get($row, 8, '');
            $area_id = data_get($row, 10, '');
            $time = data_get($row, 11, '');
            $overtime = data_get($row, 12, '');
            $welfare = data_get($row, 13, '');
            $holiday = data_get($row, 14, '');
            $job_description = data_get($row, 15, '');
            $specific_content = data_get($row, 16, '');
            $work_environment = data_get($row, 17, '');
            $position_worthwhile = data_get($row, 18, '');
            $job_worthwhile = data_get($row, 19, '');
            $career_path = data_get($row, 20, '');
            $required_condition = data_get($row, 21, '');
            $welcome_condition = data_get($row, 22, '');
            $ideal_image = data_get($row, 23, '');
            $movie_title = data_get($row, 24, '');
            $movie = data_get($row, 25, '');

            if(Str::length($name) > 0) {

                $recruit = Recruit::firstOrNew(['name' => $name]);
                $recruit->name = $name;
                $recruit->scale_id = (int)$scale_id;
                $recruit->status_id = (int)$status_id;
                $recruit->category = $category;
                $recruit->income = $income;
                $recruit->area_id = (int)$area_id;
                $recruit->time = $time;
                $recruit->overtime = $overtime;
                $recruit->welfare = $welfare;
                $recruit->holiday = $holiday;
                $recruit->job_description = $job_description;
                $recruit->specific_content = $specific_content;
                $recruit->work_environment = $work_environment;
                $recruit->position_worthwhile = $position_worthwhile;
                $recruit->job_worthwhile = $job_worthwhile;
                $recruit->career_path = $career_path;
                $recruit->required_condition = $required_condition;
                $recruit->welcome_condition = $welcome_condition;
                $recruit->ideal_image = $ideal_image;
                $recruit->movie_title = $movie_title;
                $recruit->movie = $movie;
                $recruit->status_flag = 0;
                $recruit->sheet_flag = 1;

                $recruit->save();

                $existing_recruit_ids[] = $recruit->id;

            }

        }

        if(count($existing_recruit_ids) > 0) {

            Recruit::where('sheet_flag', 1)->whereNotIn('id', $existing_recruit_ids)->delete();

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

