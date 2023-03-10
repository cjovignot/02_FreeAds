<?php


use App\Http\Controllers\Authmanager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\ProductController;


// COSME
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FreeadsUserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// tutut
Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('admin.index');
});
Route::resource('categories', CategoriesController::class);

// Cosme route
Route::resource('products', ProductController::class);
// Cosme Picture Upload
Route::get('picture_upload', [ PictureController::class, 'index' ]);
Route::post('picture_upload', [ PictureController::class, 'store' ])->name('image.store');






//Seb route

// Route::get('/', function () {

    //     return view('welcome');
    // })->name('home');
    
    
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::resource('users', FreeadsUserController::class);

Route::group(['middleware' => ['auth']], function() {
    /**
    * Verification Routes
    */
    Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');
});

//only authenticated can access this group
Route::group(['middleware' => ['auth']], function() {
    //only verified account can access with this group
    Route::group(['middleware' => ['verified']], function() {
            /**
             * Dashboard Routes
             */
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    });
});

