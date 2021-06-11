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
|---------------------------------------------------------------------------
| Clear Cache Routes
|---------------------------------------------------------------------------
*/

Route::get('/clear-cache', function () {
	Artisan::call('config:cache');
	Artisan::call('view:clear');
	Artisan::call('config:clear');
	Artisan::call('cache:clear');
	return 'All Cache Erase';
});

/* ----------------------------- End Routes ----------------------------- */

/*
|---------------------------------------------------------------------------
| User / Auth Routes
|---------------------------------------------------------------------------
*/

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

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/UpdateProfile', function () {
        return view('users.update_profile');
    });

    Route::post('/UpdatePersonalInfo', [UserController::class, 'UpdatePersonalInfo']);

    Route::post('/UpdatePassword', [UserController::class, 'UpdatePassword']);

	Route::get('/ChangeUserPassword/{id}', function ($id) {
		return view('users.change_user_password')->with('id', $id);
	});

	Route::post('/ChangeUserPassword', [UserController::class, 'ChangeUserPassword']);

		Route::resources([
			'Roles'             =>  RoleController::class,
			'Users'             =>  UserController::class,
			'Firms'             =>  FirmsController::class,
			'CustVend'          =>  CustomerVendorController::class,
			'ProductCategory'   =>  ProductCategoryController::class,
		]);

	/*
	|---------------------------------------------------------------------------
	| AJAX Routes
	|---------------------------------------------------------------------------
	*/
	
		Route::post('/SwitchFirm', [AjaxController::class, 'SwitchFirm'])->name('SwitchFirm');
	
	/* ----------------------------- End Routes ----------------------------- */

});

/* ----------------------------- End Routes ----------------------------- */
