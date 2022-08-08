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
Route::get('/migrate', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
     Artisan::call('route:clear');
    Artisan::call('config:cache');
   // return what you want
});

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
Route::get('promote_to_earn', 'PromoteController@index')->name('promote_to_earn');
Route::post('contactstore', 'ContactController@store')->name('contactstore');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/finishtask', 'FinishtaskController@index')->name('finishtask');
    Route::post('/finishtask/{id}', 'FinishtaskController@store')->name('finishtask.update');
	
    Route::post('/finishtask', 'FinishtaskController@appeal')->name('finishtask/appeal');

    Route::get('/myaccount', 'MyaccountController@index')->name('myaccount');
    Route::get('/mycampaign', 'MycampaignController@index')->name('mycampaign');
    Route::post('/mycampaignstore', 'MycampaignController@store')->name('mycampaignstore');
    Route::get('/withdraw', 'WithdrawController@index')->name('withdraw');
    Route::get('/tutorial', 'TutorialController@index')->name('tutorial');
    Route::get('/history/{id}', 'HistoryController@index')->name('history');
    Route::post('/history/approval', 'HistoryController@create')->name('history/approval');

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
    Route::get('/jobspace', 'DashboardController@index')->name('user.dashboard');
    Route::post('/ajaxjobspace', 'DashboardController@jobspace_filter')->name('ajax_dashboard');
    
});




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


Route::get('setlocale/{locale}', function ($lang) {
	\Session::put('locale', $lang);
	return redirect()->back();
})->name('setlocale');


// Frontend Routes
//Route::get('/', 					[App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

//Route::get('/', 					[App\Http\Controllers\Frontend\IndexController::class, 'index'])->name('index');



Route::group(['middleware' => 'language'], function () {
	// Admin Routes
	Route::prefix('admin')->group(function () {

		Route::get('/login', 					[App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');
		Route::post('/login', 					[App\Http\Controllers\Admin\Auth\LoginController::class, 'login_go'])->name('login_go');
		Route::get('/logout', 					[App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

		Route::get('forget-password', 			[App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
		Route::post('forget-password', 			[App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');

		Route::get('reset-password/{token}', 	[App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
		Route::post('reset-password', 			[App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

		// Admin Authenticated Routes
		Route::group(['middleware' => ['auth:admin']], function () {

		Route::get('/dashboard', 			[App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
		

		// Profile
		Route::get('/profile', 				[App\Http\Controllers\Admin\UserController::class, 'profile'])->name('profile');
		Route::post('/profile/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'profile_update'])->name('profile.update');

		// User
		Route::prefix('users')->group(function () {
			Route::get('/index', 			[App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
			Route::get('/create', 			[App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
			Route::post('/store', 			[App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
			Route::get('/edit/{id}', 		[App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
			Route::post('/update/{id}', 	[App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
			Route::post('/destroy', 		[App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
			Route::get('/status_update', 	[App\Http\Controllers\Admin\UserController::class, 'status_update'])->name('users.status_update');
		});

		// Role
		Route::prefix('roles')->group(function () {
			Route::get('/index', 			[App\Http\Controllers\Admin\RoleController::class, 'index'])->name('roles.index');
			Route::get('/create', 			[App\Http\Controllers\Admin\RoleController::class, 'create'])->name('roles.create');
			Route::post('/store', 			[App\Http\Controllers\Admin\RoleController::class, 'store'])->name('roles.store');
			Route::get('/edit/{id}', 		[App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('roles.edit');
			Route::post('/update/{id}', 	[App\Http\Controllers\Admin\RoleController::class, 'update'])->name('roles.update');
			Route::post('/destroy', 		[App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('roles.destroy');
		});

		// Permission
		Route::prefix('permissions')->group(function () {
			Route::get('/index', 			[App\Http\Controllers\Admin\PermissionController::class, 'index'])->name('permissions.index');
			Route::get('/create', 			[App\Http\Controllers\Admin\PermissionController::class, 'create'])->name('permissions.create');
			Route::post('/store', 			[App\Http\Controllers\Admin\PermissionController::class, 'store'])->name('permissions.store');
			Route::get('/edit/{id}', 		[App\Http\Controllers\Admin\PermissionController::class, 'edit'])->name('permissions.edit');
			Route::post('/update/{id}', 	[App\Http\Controllers\Admin\PermissionController::class, 'update'])->name('permissions.update');
			Route::post('/destroy', 		[App\Http\Controllers\Admin\PermissionController::class, 'destroy'])->name('permissions.destroy');
		});

		// Currency
		Route::prefix('currencies')->group(function () {
			Route::get('/index', 			[App\Http\Controllers\Admin\CurrencyController::class, 'index'])->name('currencies.index');
			Route::get('/create', 			[App\Http\Controllers\Admin\CurrencyController::class, 'create'])->name('currencies.create');
			Route::post('/store', 			[App\Http\Controllers\Admin\CurrencyController::class, 'store'])->name('currencies.store');
			Route::get('/edit/{id}', 		[App\Http\Controllers\Admin\CurrencyController::class, 'edit'])->name('currencies.edit');
			Route::post('/update/{id}', 	[App\Http\Controllers\Admin\CurrencyController::class, 'update'])->name('currencies.update');
			Route::post('/destroy', 		[App\Http\Controllers\Admin\CurrencyController::class, 'destroy'])->name('currencies.destroy');
			Route::get('/status_update', 	[App\Http\Controllers\Admin\CurrencyController::class, 'status_update'])->name('currencies.status_update');
		});

		// Setting
		Route::prefix('setting')->group(function () {
			Route::get('/file-manager/index', 			 [App\Http\Controllers\Admin\FileManagerController::class, 'index'])->name('filemanager.index');
			Route::get('/website-setting/edit', 		 [App\Http\Controllers\Admin\SettingController::class, 'edit'])->name('website-setting.edit');
			Route::post('/website-setting/update/{id}',  [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('website-setting.update');
		});

		// CMS category
		Route::prefix('cmscategories')->group(function () {
			Route::get('/index', 			[App\Http\Controllers\Admin\CMSCategoryController::class, 'index'])->name('cmscategories.index');
			Route::get('/create', 			[App\Http\Controllers\Admin\CMSCategoryController::class, 'create'])->name('cmscategories.create');
			Route::post('/store', 			[App\Http\Controllers\Admin\CMSCategoryController::class, 'store'])->name('cmscategories.store');
			Route::get('/edit/{id}', 		[App\Http\Controllers\Admin\CMSCategoryController::class, 'edit'])->name('cmscategories.edit');
			Route::post('/update/{id}', 	[App\Http\Controllers\Admin\CMSCategoryController::class, 'update'])->name('cmscategories.update');
			Route::post('/destroy', 		[App\Http\Controllers\Admin\CMSCategoryController::class, 'destroy'])->name('cmscategories.destroy');
			Route::get('/status_update', 	[App\Http\Controllers\Admin\CMSCategoryController::class, 'status_update'])->name('cmscategories.status_update');
		});

		// CMS Pages
		Route::prefix('cmspages')->group(function () {
			Route::get('/index', 			[App\Http\Controllers\Admin\CMSPageController::class, 'index'])->name('cmspages.index');
			Route::get('/create', 			[App\Http\Controllers\Admin\CMSPageController::class, 'create'])->name('cmspages.create');
			Route::post('/store', 			[App\Http\Controllers\Admin\CMSPageController::class, 'store'])->name('cmspages.store');
			Route::get('/edit/{id}', 		[App\Http\Controllers\Admin\CMSPageController::class, 'edit'])->name('cmspages.edit');
			Route::post('/update/{id}', 	[App\Http\Controllers\Admin\CMSPageController::class, 'update'])->name('cmspages.update');
			Route::post('/destroy', 		[App\Http\Controllers\Admin\CMSPageController::class, 'destroy'])->name('cmspages.destroy');
			Route::get('/status_update', 	[App\Http\Controllers\Admin\CMSPageController::class, 'status_update'])->name('cmspages.status_update');
		});

		// Testimonials
		Route::prefix('testimonials')->group(function () {
			Route::get('/index', 			[App\Http\Controllers\TestimonialController::class, 'index'])->name('testimonials.index');
			Route::get('/create', 			[App\Http\Controllers\TestimonialController::class, 'create'])->name('testimonials.create');
			Route::post('/store', 			[App\Http\Controllers\TestimonialController::class, 'store'])->name('testimonials.store');
			Route::get('/edit/{id}', 		[App\Http\Controllers\TestimonialController::class, 'edit'])->name('testimonials.edit');
			Route::post('/update/{id}', 	[App\Http\Controllers\TestimonialController::class, 'update'])->name('testimonials.update');
			Route::post('/destroy', 		[App\Http\Controllers\TestimonialController::class, 'destroy'])->name('testimonials.destroy');
			Route::get('/status_update', 	[App\Http\Controllers\TestimonialController::class, 'status_update'])->name('testimonials.status_update');
		});

		// User/Promotor
		Route::prefix('userpromotor')->group(function () {
			Route::get('/index', 			[App\Http\Controllers\Admin\UserPromotorController::class, 'index'])->name('userpromotors.index');
			Route::get('/create', 			[App\Http\Controllers\Admin\UserPromotorController::class, 'create'])->name('userpromotors.create');
			Route::post('/store', 			[App\Http\Controllers\Admin\UserPromotorController::class, 'store'])->name('userpromotors.store');
			Route::get('/edit/{id}', 		[App\Http\Controllers\Admin\UserPromotorController::class, 'edit'])->name('userpromotors.edit');
			Route::post('/update/{id}', 	[App\Http\Controllers\Admin\UserPromotorController::class, 'update'])->name('userpromotors.update');
			Route::post('/destroy', 		[App\Http\Controllers\Admin\UserPromotorController::class, 'destroy'])->name('userpromotors.destroy');
			Route::get('/approve/{id}', 			[App\Http\Controllers\Admin\UserPromotorController::class, 'approve'])->name('userpromotors.approve');
			Route::get('/reject/{id}', 			[App\Http\Controllers\Admin\UserPromotorController::class, 'reject'])->name('userpromotors.reject');
			
		});

		//Account Officer Social link
		Route::prefix('sociallink')->group(function () {
			Route::get('/index', 			[App\Http\Controllers\Admin\SociallinkController::class, 'index'])->name('sociallinks.index');
			Route::get('/verify/{id}', 		[App\Http\Controllers\Admin\SociallinkController::class, 'verify'])->name('sociallinks.verify');
			Route::get('/reject/{id}', 		[App\Http\Controllers\Admin\SociallinkController::class, 'reject'])->name('sociallinks.reject');
		});

		//Disciplinary Officer Employer Compalin
		Route::prefix('employer')->group(function () {
			Route::get('/complaints', 						[App\Http\Controllers\Admin\DisciplinaryController::class, 'index'])->name('employers.complain');
			Route::get('/complaints/approve/{id}', 			[App\Http\Controllers\Admin\DisciplinaryController::class, 'approve'])->name('employerscomplain.approve');
			Route::get('/complaints/reject/{id}', 			[App\Http\Controllers\Admin\DisciplinaryController::class, 'reject'])->name('employerscomplain.reject');
			Route::get('/complaints/view/{id}', 			[App\Http\Controllers\Admin\DisciplinaryController::class, 'view'])->name('employerscomplain.view');
		
		});
		//Disciplinary Officer Social Link
		Route::prefix('sociallink_verified')->group(function () {
			Route::get('/sociallink',						[App\Http\Controllers\Admin\VerifiedSociallinkController::class, 'sociallink'])->name('sociallink_verified.sociallink');
			Route::get('/suspend/{id}', 					[App\Http\Controllers\Admin\VerifiedSociallinkController::class, 'suspend'])->name('sociallink_verified.suspend');
			Route::get('/restrict/{id}', 					[App\Http\Controllers\Admin\VerifiedSociallinkController::class, 'restrict'])->name('sociallink_verified.restrict');
		});

		//Accountant 
		Route::prefix('accountant')->group(function () {
			Route::get('/index', 					[App\Http\Controllers\Admin\WithdrawRequestController::class, 'index'])->name('withdraws.index');
			Route::post('/confirm', 				[App\Http\Controllers\Admin\WithdrawRequestController::class, 'confirm'])->name('withdraws.confirm');
			Route::get('/cancel/{id}', 				[App\Http\Controllers\Admin\WithdrawRequestController::class, 'cancel'])->name('withdraws.cancel');
		});	

		//Accountant Cancel Withdrawal
		Route::prefix('cancelwithdraw')->group(function () {
			Route::get('/index', 					[App\Http\Controllers\Admin\CancelWithdrawController::class, 'index'])->name('cancelwithdraw.index');
		});	

		//Job Spaces
		Route::prefix('jobspace')->group(function () {
			Route::get('/index', 					[App\Http\Controllers\Admin\JobspaceController::class, 'index'])->name('jobspaces.index');
			Route::get('/jobdetail/{id}', 			[App\Http\Controllers\Admin\JobspaceController::class, 'view'])->name('jobspaces.view');
			Route::post('/jobdetail/approve', 		[App\Http\Controllers\Admin\JobspaceController::class, 'approve'])->name('jobspaces.approve');
			Route::get('/jobdetail/reject/{id}', 	[App\Http\Controllers\Admin\JobspaceController::class, 'reject'])->name('jobspaces.reject');
		});	

		//Job Spaces
		Route::prefix('joblists')->group(function () {
			Route::get('/index', 					[App\Http\Controllers\Admin\JoblistController::class, 'index'])->name('joblists.index');
		});	
			
		//Transactions
		Route::prefix('transaction')->group(function () {
			Route::get('/index', 					[App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions.index');
		});	
		});
	});
});