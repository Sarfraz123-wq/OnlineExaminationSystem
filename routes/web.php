<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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

Route::get('/login',[AuthController::class, 'loadLogin']);
Route::post('/login',[AuthController::class, 'Login']);
Route::get('/register',[AuthController::class, 'loadRegister']);
Route::post('/register',[AuthController::class, 'register']);
Route::get('/logout',[AuthController::class, 'logout']);

Route::get('/', function () {
    return view('login');
});
Route::group(['middleware' => ['web', 'checkAdmin']], function(){
    Route::get('/admin/dashboard',[AuthController::class, 'loadAdminDashboard']);
    Route::post('/add-subject',[AdminController::class, 'addSubjects'])->name('addSubject');
});
Route::group(['middleware' => ['web', 'checkUser']],function(){
    Route::get('/dashboard',[AuthController::class, 'loadDashboard']);
});
