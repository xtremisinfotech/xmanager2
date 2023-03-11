<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CustomerVendorController;
use App\Http\Controllers\FirmsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/*
|===========================================================================
| Clear Cache Routes
|===========================================================================
*/

Route::get('/clear-cache', function () {
	Artisan::call('config:cache');
	Artisan::call('view:clear');
	Artisan::call('config:clear');
	Artisan::call('cache:clear');
	return 'All Cache Erase';
});

/* ============================= End Routes ============================= */

Auth::routes();

/* --- Disable User Registration Routes --- */
Route::get('/register', function(){
    return redirect('/login');
});
/**----------------------------------------- */

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware'	=> ['auth', 'isActive']], function () {

	/*
	|===========================================================================
	| User / Auth Routes
	|===========================================================================
	*/
	Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/UpdateProfile', function () {
        return view('users.update_profile');
    })->name('UpdateProfile');

    Route::post('/UpdatePersonalInfo', [UserController::class, 'UpdatePersonalInfo'])->name('UpdatePersonalInfo');

    Route::post('/UpdatePassword', [UserController::class, 'UpdatePassword'])->name('UpdatePassword');

	Route::get('/ChangeUserPassword/{id}', function ($id) {
		return view('users.change_user_password')->with('id', $id);
	})->name('ChangeUserPassword');

	Route::post('/ChangeUserPassword', [UserController::class, 'ChangeUserPassword']);
	/* ============================= End Routes ============================= */


	/*
	|===========================================================================
	| Resource Routes
	|===========================================================================
	*/
	Route::resources([
		'Roles'             =>  RoleController::class,
		'Users'             =>  UserController::class,
		'Firms'             =>  FirmsController::class,
		'CustVend'          =>  CustomerVendorController::class,
		'ProductCategory'   =>  ProductCategoryController::class,
	]);
	/* ============================= End Routes ============================= */


	/*
	|===========================================================================
	| AJAX Routes
	|===========================================================================
	*/
	Route::post('/SwitchFirm', [AjaxController::class, 'SwitchFirm'])->name('SwitchFirm');
	/* ============================= End Routes ============================= */
});