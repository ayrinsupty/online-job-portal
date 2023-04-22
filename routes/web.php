<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\JobController;
use App\Http\Controllers\SeekerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Auth\PasswordResetLinkController;
use App\Http\Controllers\Backend\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\SeekerEducationController;
use App\Http\Controllers\Backend\SeekerExperienceController;
use App\Http\Controllers\Backend\SeekerExpertController;
use App\Http\Controllers\Backend\SeekerReferenceController;
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

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login/submit', [AuthenticatedSessionController::class, 'store'])->name('login.submit');
    Route::post('/logout/submit', [AuthenticatedSessionController::class, 'destroy'])->name('logout.submit');

    Route::get('/password/reset', [PasswordResetLinkController::class, 'create'])->name('password');
    Route::post('/password/reset/submit', [PasswordResetLinkController::class, 'destroy'])->name('password.submit');
});

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/job/{id}', [PageController::class, 'jobDetails'])->name('job.details');
Route::get('/apply/{id}', [PageController::class, 'apply'])->name('apply')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'auth:web'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::resource('roles', RolesController::class, ['names' => 'roles']);
    Route::resource('admins', AdminController::class, ['names' => 'admins']);
    Route::get('admins/status/{slug}', [AdminController::class, 'isActive'])->name('admins.status');
    Route::resource('users', UserController::class, ['names' => 'users']);
    Route::get('users/status/{slug}', [UserController::class, 'isActive'])->name('users.status');
   Route::resource('category', CategoryController::class, ['names' => 'categories']);
    Route::resource('job', JobController::class, ['names' => 'jobs']);
    Route::get('/all/apply/{id}', [JobController::class, 'allApply'])->name('all.apply');
    Route::get('/short-listed/{id}', [JobController::class, 'shortListed'])->name('short.listed');
    Route::get('/confirm-listed/{id}', [JobController::class, 'confirmListed'])->name('confirm.listed');
    Route::get('approval/{id}/{status}', [JobController::class, 'approveReject'])->name('approval.confirmantion');
    Route::get('admins/status/{slug}', [JobController::class, 'isActive'])->name('jobs.status');

});
Route::post('seeker/education',[SeekerController::class,'addEducation'])->name('add.education');
Route::get('seeker/education/delete/{id}',[SeekerController::class,'deleteEducation'])->name('delete.education');
Route::post('seeker/skill',[SeekerController::class,'addSkill'])->name('add.skill');
Route::get('seeker/skill/delete/{id}',[SeekerController::class,'deleteSkill'])->name('delete.skill');
Route::post('seeker/ref',[SeekerController::class,'addReference'])->name('add.reference');
Route::get('seeker/ref/delete/{id}',[SeekerController::class,'deleteReference'])->name('delete.reference');
Route::post('seeker/experience',[SeekerController::class,'addExperience'])->name('add.experience');
Route::get('seeker/experience/delte/{id}',[SeekerController::class,'deleteExperience'])->name('delete.experience');
Route::post('user/update',[SeekerController::class,'updateUser'])->name('update.user');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
