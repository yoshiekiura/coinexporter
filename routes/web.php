<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MycampaignController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', 'IndexController@index')->name('index');
Route::get('about', 'AboutController@index')->name('about');
Route::get('faq', 'FaqController@index')->name('faq');
Route::get('contact', 'ContactController@index')->name('contact');
Route::get('terms', 'TermController@index')->name('terms');
Route::get('404', 'ErrorController@index')->name('404');

Route::get('/finishtask', 'FinishtaskController@index')->name('finishtask');
Route::get('/myaccount', 'MyaccountController@index')->name('myaccount');
Route::get('/mycampaign', 'MycampaignController@index')->name('mycampaign');
Route::post('/mycampaignstore', 'MycampaignController@store')->name('mycampaignstore');
Route::get('/withdraw', 'WithdrawController@index')->name('withdraw');
Route::get('/tutorial', 'TutorialController@index')->name('tutorial');
Route::get('/history', 'HistoryController@index')->name('history');
Route::get('/editprofile', 'EditprofileController@index')->name('editprofile');
