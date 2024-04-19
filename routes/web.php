<?php
use App\Http\Controllers\GoogleSheetCompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleSheetRecruitController;
use App\Http\Controllers\FormSpreadSheetController;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/sitemap.xml', function () {
    return view('sitemap');
});

Route::get('/', 'App\Http\Controllers\TopController@index');

Route::get('/whitepaper', 'App\Http\Controllers\TopController@indexlist');
Route::get('/whitepaper/wp01', 'App\Http\Controllers\TopController@showPage1');
Route::get('/whitepaper/wp02', 'App\Http\Controllers\TopController@showPage2');
Route::get('/whitepaper/wp03', 'App\Http\Controllers\TopController@showPage3');
Route::get('/whitepaper/wp04', 'App\Http\Controllers\TopController@showPage4');
Route::get('/whitepaper/wp05', 'App\Http\Controllers\TopController@showPage5');
Route::get('/whitepaper/wp06', 'App\Http\Controllers\TopController@showPage6');
Route::get('/whitepaper/wp07', 'App\Http\Controllers\TopController@showPage7');
Route::get('/whitepaper/wp08', 'App\Http\Controllers\TopController@showPage8');
Route::get('/whitepaper/thanks', 'App\Http\Controllers\TopController@thanks');

Route::get('/article', 'App\Http\Controllers\ArticleController@index');
Route::get('/article/list/{category_id?}', 'App\Http\Controllers\ArticleController@article_list');
Route::get('/article/list/writer/{writer_id?}', 'App\Http\Controllers\ArticleController@writer_article_list');
Route::get('/article/{slug}/{id}', 'App\Http\Controllers\ArticleController@get_article');
Route::get('/get_article_link', 'App\Http\Controllers\ArticleController@get_article_link');

Route::get('/movie/list/', 'App\Http\Controllers\MovieController@index');

//検索ボックス
Route::get('/jobsearch', 'App\Http\Controllers\RecruitController@search');
Route::get('/joblist', 'App\Http\Controllers\RecruitController@joblist');
Route::get('/jobdetail/{id}', 'App\Http\Controllers\RecruitController@detail');
Route::get('/recruit', 'App\Http\Controllers\RecruitController@form');
Route::get('/recruit/{id}', 'App\Http\Controllers\RecruitController@form');
Route::post('/work/mail', 'App\Http\Controllers\RecruitController@mail');
Route::get('/thanks', 'App\Http\Controllers\RecruitController@thanks');
//検索条件が1つの時のリンク
Route::get('/joblink/{category}/{id}', 'App\Http\Controllers\RecruitController@job_link')->name('job_link');

Route::get('/question', 'App\Http\Controllers\QuestionController@index');

Route::group(['middleware' => 'basicauth'], function() {
    // ここに対象のページを記述
//admin
    Route::get('/admin/article', 'App\Http\Controllers\AdminArticleController@index');
    Route::get('/admin/article/category', 'App\Http\Controllers\AdminArticleController@category');
    Route::POST('/admin/article/category/0', 'App\Http\Controllers\AdminArticleController@category_update');
    Route::POST('/admin/article/category/1', 'App\Http\Controllers\AdminArticleController@category_add');
    Route::get('/admin/article/edit/{id}', 'App\Http\Controllers\AdminArticleController@edit');
    Route::post('/admin/article/{id}', 'App\Http\Controllers\AdminArticleController@update');
    Route::post('/admin/preview/{id}', 'App\Http\Controllers\AdminArticleController@preview');

    Route::get('/admin/profile', 'App\Http\Controllers\AdminProfileController@index');
    Route::get('/admin/profile/edit_profile/{id}', 'App\Http\Controllers\AdminProfileController@edit');
    Route::post('/admin/profile/edit_profile/{id}', 'App\Http\Controllers\AdminProfileController@update');

    Route::get('/admin/movie', 'App\Http\Controllers\AdminMovieController@index');
    Route::post('/admin/ajax/edit_modal', 'App\Http\Controllers\AdminMovieController@edit_modal');
    Route::post('/admin/movie/edit', 'App\Http\Controllers\AdminMovieController@movie_edit');
    Route::post('/admin/movie/status/{id}', 'App\Http\Controllers\AdminMovieController@movie_status');
    Route::post('/admin/movie/create', 'App\Http\Controllers\AdminMovieController@movie_create');

    Route::get('/admin/image', 'App\Http\Controllers\AdminImageController@index');
    Route::post('/admin/ajax/edit_image', 'App\Http\Controllers\AdminImageController@edit_image');
    Route::post('/image/post_image', 'App\Http\Controllers\AdminImageController@post_image');
    Route::post('/image/delete', 'App\Http\Controllers\AdminImageController@delete_image');

    Route::get('/admin/company', 'App\Http\Controllers\AdminCompanyController@index');
    Route::get('/admin/company/edit_company/{id}', 'App\Http\Controllers\AdminCompanyController@edit');
    Route::post('/admin/company/{id}', 'App\Http\Controllers\AdminCompanyController@update');

    Route::get('/admin/recruit', 'App\Http\Controllers\AdminRecruitController@index');
    Route::get('/admin/edit_recruit/{id}', 'App\Http\Controllers\AdminRecruitController@edit');
    Route::get('/admin/edit_recruit/copy/{id}', 'App\Http\Controllers\AdminRecruitController@edit');
    Route::post('/admin/recruit/create/{id}', 'App\Http\Controllers\AdminRecruitController@create');
    Route::post('/admin/recruit/update/{id}', 'App\Http\Controllers\AdminRecruitController@update');

    Route::get('/admin/occupation', 'App\Http\Controllers\AdminOccupationController@index');
    Route::POST('/admin/occupation/0', 'App\Http\Controllers\AdminOccupationController@update');
    Route::POST('/admin/occupation/1', 'App\Http\Controllers\AdminOccupationController@create');

    Route::get('/admin/lp_company', 'App\Http\Controllers\AdminLpCompanyController@index');
    Route::get('/admin/lp_company/edit_lp_company/{id}', 'App\Http\Controllers\AdminLpCompanyController@edit');
    Route::post('/admin/lp_company/{id}', 'App\Http\Controllers\AdminLpCompanyController@update');

});

//LP×4
// Route::get('/nennsyushinndann', [App\Http\Controllers\TaxController::class, 'index']);

Route::get(
    '/onlinetour/',
    function () {
        ob_start();
        include public_path('/store/onlinetour/index.php');
        $output = ob_get_clean();
        return $output;
    }
);
Route::get(
    '/onlinetour/thanks.html',
    function () {
        ob_start();
        include public_path('/store/onlinetour/thanks.html');
        $output = ob_get_clean();
        return $output;
    }
);
Route::get(
    '/nennsyushinndann',
    function () {
        ob_start();
        include public_path('/store/skillchecker2/index.php');
        $output = ob_get_clean();
        return $output;
    }
);
Route::post(
    '/nennsyushinndann/step.php',
    function () {
        ob_start();
        include public_path('/store/skillchecker2/step.php');
        $output = ob_get_clean();
        return $output;
    }
);
Route::get(
    '/nennsyushinndann/thanks.html',
    function () {
        ob_start();
        include public_path('/store/skillchecker2/thanks.html');
        $output = ob_get_clean();
        return $output;
    }
);
Route::get(
    '/blacksinndann',
    function () {
        ob_start();
        include public_path('/store/blackNew/index.php');
        $output = ob_get_clean();
        return $output;
    }
);
Route::post(
    '/blacksinndann/step.php',
    function () {
        ob_start();
        include public_path('/store/blackNew/step.php');
        $output = ob_get_clean();
        return $output;
    }
);
Route::get(
    '/blacksinndann/thanks.html',
    function () {
        ob_start();
        include public_path('/store/blackNew/thanks.html');
        $output = ob_get_clean();
        return $output;
    }
);

// Route::get('/nennsyushinndann/thanks', [App\Http\Controllers\TaxController::class, 'thanks']);

Route::get('/tennsyokusinndann', [App\Http\Controllers\TennsyokuController::class, 'index']);

Route::get('/tennsyokusinndann/thanks', [App\Http\Controllers\TennsyokuController::class, 'thanks']);

// Route::get('/blacksinndann', [App\Http\Controllers\BlackController::class, 'index'])->name('black.index');

// Route::get('/blacksinndann/thanks', [App\Http\Controllers\BlackController::class, 'thanks']);

Route::post('/mail/send/{id}', 'App\Http\Controllers\MailController@send');

Route::get('/test/hubspot', 'App\Http\Controllers\HubspotController@index');

// Route::get('/mitsukaru-taxtennsyoku', [App\Http\Controllers\MitsukaruController::class, 'index']);
// Route::post('/mitsukaru-taxtennsyoku', [App\Http\Controllers\MitsukaruController::class, 'index']);
// Route::get('/mitsukaru-taxtennsyoku/thanks', [App\Http\Controllers\MitsukaruController::class, 'thanks']);

Route::get('/kaikeishi/lp01', function () {
    return view('/kaikeishi/index');
});
Route::get('/kaikeishi/lp01/thanks', function () {
    return view('/kaikeishi/thanks');
});
Route::post('/kaikeishi/sendFormData', [App\Http\Controllers\MailController::class, 'lpSendMail']);

Route::get('/office/thanks', function () {
    return view('office.thanks.index');
});

//スプシ連携：管理画面(保留)
Route::post('google_sheet/recruit_webhook', [GoogleSheetRecruitController::class, 'webhook'])->name('google_sheet.recruit_webhook');
Route::post('google_sheet/company_webhook', [GoogleSheetCompanyController::class, 'webhook'])->name('google_sheet.company_webhook');


Route::get('/break_through_income.pdf', function () {
    $path = public_path('/images/break_through_income.pdf');
    if (!File::exists($path)) {
        abort(404);
    }
    return Response::file($path);
});
Route::get('/true_opinion.pdf', function () {
    $path = public_path('/images/true_opinion.pdf');
    if (!File::exists($path)) {
        abort(404);
    }
    return Response::file($path);
});
Route::get('/question_in_return.pdf', function () {
    $path = public_path('/images/question_in_return.pdf');
    if (!File::exists($path)) {
        abort(404);
    }
    return Response::file($path);
});
Route::get('/causes_of_failure.pdf', function () {
    $path = public_path('/images/causes_of_failure.pdf');
    if (!File::exists($path)) {
        abort(404);
    }
    return Response::file($path);
});
Route::get('/office_features.pdf', function () {
    $path = public_path('/images/office_features.pdf');
    if (!File::exists($path)) {
        abort(404);
    }
    return Response::file($path);
});

Route::get('/pdf1-income.pdf', function () {
    $path = public_path('/images/pdf/pdf1-income.pdf');
    if (!File::exists($path)) {
        abort(404);
    }
    return Response::file($path);
});
Route::get('/pdf2-break_through_income.pdf', function () {
    $path = public_path('/images/pdf/pdf2-break_through_income.pdf');
    if (!File::exists($path)) {
        abort(404);
    }
    return Response::file($path);
});
Route::get('/pdf3-black.pdf', function () {
    $path = public_path('/images/pdf/pdf3-black.pdf');
    if (!File::exists($path)) {
        abort(404);
    }
    return Response::file($path);
});
Route::get('/pdf4-causes_of_failure.pdf', function () {
    $path = public_path('/images/pdf/pdf4-causes_of_failure.pdf');
    if (!File::exists($path)) {
        abort(404);
    }
    return Response::file($path);
});
Route::get('/pdf5-common.pdf', function () {
    $path = public_path('/images/pdf/pdf5-common.pdf');
    if (!File::exists($path)) {
        abort(404);
    }
    return Response::file($path);
});
Route::get('/pdf6-office_features.pdf', function () {
    $path = public_path('/images/pdf/pdf6-office_features.pdf');
    if (!File::exists($path)) {
        abort(404);
    }
    return Response::file($path);
});
Route::get('/pdf7-question_in_return.pdf', function () {
    $path = public_path('/images/pdf/pdf7-question_in_return.pdf');
    if (!File::exists($path)) {
        abort(404);
    }
    return Response::file($path);
});
Route::get('/pdf8-inexperienced.pdf', function () {
    $path = public_path('/images/pdf/pdf8-inexperienced.pdf');
    if (!File::exists($path)) {
        abort(404);
    }
    return Response::file($path);
});
