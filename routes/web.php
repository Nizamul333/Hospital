<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
//Route::get('/', function(){
//return view('welcome');
//});



Route::get('/',[HomeController::class,'index']);
Route::get('/add_doctor_view',[AdminController::class,'addview']);
Route::post('/upload_doctor',[AdminController::class,'upload']);
Route::post('/appointment',[HomeController::class,'appointment']);
Route::get('/myappointment',[HomeController::class,'myappointment']);
Route::get('/cancel_appoint/{id}',[HomeController::class,'cancelAppoint']);
Route::get('/showappointment',[AdminController::class,'showappointment']);
Route::get('/showdoctor',[AdminController::class,'showdoctor']);

Route::get('/approved/{id}',[AdminController::class,'approvedAppoint']);
Route::get('/canceled/{id}',[AdminController::class,'canceledAppoint']);
Route::get('/doctorDelete/{id}',[AdminController::class,'doctorDelete']);
Route::get('/doctorUpdate/{id}',[AdminController::class,'doctorUpdate']);
Route::post('/editdoctor/{id}',[AdminController::class,'editdoctor']);

Route::get('/emailview/{id}',[AdminController::class,'emailview']);
Route::post('/sendemail/{id}',[AdminController::class,'sendemail']);

Route::get('/home',[HomeController::class, 'redirect'])->middleware('auth','verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
