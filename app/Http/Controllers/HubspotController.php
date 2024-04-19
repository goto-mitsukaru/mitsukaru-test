<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Company;
use App\Models\Movie;
use App\Models\Occupation;
use App\Models\Recruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use HubSpot\Client\Crm\Contacts\ApiException;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;

class HubspotController extends Controller
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

        $apiKey = 'pat-na1-14185715-8c19-4f6a-8111-dbac1b4ed819';
        $hubspot = \HubSpot\Factory::createWithAccessToken($apiKey);

        $properties1 =
            [
                'diagnose_type' => 'diagnose_type',
                'motivation' => 'motivation',
                'state' => 'state',
                'number_of_advisors' => 'number_of_advisors',
                'annual_sales' => 'annual_sales',
                'skill' => 'skill_cpa', // 選択項目の確認必須
                'income_lp' => 'income_lp',
                'management' => 'management',
                'financial_consulting' => 'financial_consulting',
                'inheritance' => 'inheritance',
                'added_value_others' => 'added_value_others',
                'lastname' => 'lastname',
                'firstname' => 'firstname',
                'mobilephone' => '08011112222',
                'email' => 'test@gmail.com',
                'experience' => 'experience',
                'age' => '10代後半', // 選択項目の確認必須
                'channel' => 'Facebook広告', // 選択項目の確認必須
                'message' => 'TEST',
            ];

//        $properties1 =
//            [
//                'lastname' => 'lastname',
//                'firstname' => 'firstname',
//            ];

        $simplePublicObjectInput = new SimplePublicObjectInput([
            'properties' => $properties1,
        ]);
        try {
            $apiResponse = $hubspot->crm()->contacts()->basicApi()->create($simplePublicObjectInput);
            return [true, "Success basic_api->create"];
        } catch (ApiException $e) {
            return [false, $e->getMessage()];
        }
    }
}
