<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MycampaignController;
use App\Http\Controllers\JobdetailController;


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

// Route::get('/jobspace', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
 
Route::get('/', 'IndexController@index')->name('index');
Route::get('job_space', 'JobspaceController@index')->name('job_space');
Route::get('about', 'AboutController@index')->name('about');
Route::get('faq', 'FaqController@index')->name('faq');
Route::get('contact', 'ContactController@index')->name('contact');
Route::get('terms', 'TermController@index')->name('terms');
Route::get('404', 'ErrorController@index')->name('404');
Route::get('coinexporter_token', 'CoinexportertokenController@index')->name('coinexporter_token');
Route::get('tokenomic', 'TokenomicController@index')->name('tokenomic');
Route::get('investor', 'InvestorController@index')->name('investor');
Route::get('roadmap', 'RoadmapController@index')->name('roadmap');
Route::get('team', 'TeamController@index')->name('team');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/finishtask', 'FinishtaskController@index')->name('finishtask');
    Route::post('/finishtask/{id}', 'FinishtaskController@store')->name('finishtask.update');

    Route::get('/myaccount', 'MyaccountController@index')->name('myaccount');
    Route::get('/mycampaign', 'MycampaignController@index')->name('mycampaign');
    Route::post('/mycampaignstore', 'MycampaignController@store')->name('mycampaignstore');
    Route::get('/withdraw', 'WithdrawController@index')->name('withdraw');
    Route::get('/tutorial', 'TutorialController@index')->name('tutorial');
    Route::get('/history/{id}', 'HistoryController@index')->name('history');

    Route::get('/editprofile', 'EditprofileController@index')->name('editprofile');
    Route::post('/editprofileupdate', 'EditprofileController@store')->name('editprofileupdate');
    Route::post('/profileImageUpload', 'EditprofileController@imagestore')->name('profileImageUpload');
    Route::post('/changepassword', 'EditprofileController@changepassword')->name('changepassword');

    Route::get('/jobdetail/{id}', 'JobdetailController@index')->name('jobdetail');
    Route::post('/jobdetail/update', 'JobdetailController@store')->name('jobdetail.update');

    Route::post('/create', 'MyaccountController@create')->name('create');
    Route::post('/payment', 'MycampaignController@create')->name('payment');

    Route::post('/transactionAmount', 'WithdrawController@create')->name('transactionAmount');
    Route::post('/jobdetail/downloadfile', 'DownloadfileController@store')->name('downloadfile');
    Route::get('/refferedUsers', 'ReffereduserController@index')->name('refferedUsers');
    Route::get('/dashboard', 'MyaccountController@controlpanel')->name('controlpanel');
    Route::get('/jobspace', 'DashboardController@index')->name('dashboard');
    
});
