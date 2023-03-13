<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Auth\PasswordResetLinkController;
use App\Http\Controllers\Backend\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\UserController;

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
Route::get('/storage-shortcut', function () {
    Artisan::call('storage:link');
});

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [PageController::class, 'home'])->name('home');

Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
Route::get('/login',[AuthenticatedSessionController::class,'create'])->name('login');
Route::post('/login/submit',[AuthenticatedSessionController::class,'store'])->name('login.submit');
Route::post('/logout/submit',[AuthenticatedSessionController::class,'destroy'])->name('logout.submit');

Route::get('/password/reset',[PasswordResetLinkController::class,'create'])->name('password');
Route::post('/password/reset/submit',[PasswordResetLinkController::class,'destroy'])->name('password.submit');
});
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

Route::get('/',[DashboardController::class,'index'])->name('home');
Route::resource('roles', RolesController::class,['names'=>'roles']);
Route::resource('admins', AdminController::class,['names'=>'admins']);
Route::get('admins/status/{slug}', [AdminController::class, 'isActive'])->name('admins.status');
Route::resource('users', UserController::class,['names'=>'users']);
Route::get('users/status/{slug}', [UserController::class, 'isActive'])->name('users.status');

});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
