<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AdmingroupController;

use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\MainController;
use App\Http\Controllers\Dashboard\MemberController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\LevelController;
use App\Http\Controllers\Dashboard\QuestionController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\CountryController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('/login', [AdminController::class, 'viewLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::any('admin-logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::resource('home', HomeController::class);



    Route::resource('patient', PatientController::class);
    Route::get('patient/update-status/{id}/{status}', [PatientController::class, 'status']);
    Route::get('patient/get-destroy/{id}', [PatientController::class, 'destroy'])->name('patient.get-destroy');


    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('setting', [SettingController::class, 'update'])->name('setting.update');

    Route::resource('member', MemberController::class);
    Route::get('member/update-status/{id}/{status}', [MemberController::class, 'status']);
    Route::get('member/get-destroy/{id}', [MemberController::class, 'destroy'])->name('member.get-destroy');


    Route::resource('doctor', DoctorController::class);
    Route::get('doctor/update-status/{id}/{status}', [DoctorController::class, 'status']);
    Route::get('doctor/get-destroy/{id}', [DoctorController::class, 'destroy'])->name('doctor.get-destroy');
    Route::get('doctor/export_data', [DoctorController::class, 'export_data'])->name('doctor.export_data');


    Route::resource('admingroup', AdmingroupController::class);
    Route::get('admingroup/update-status/{groupid}/{roleid}/{status}', [AdmingroupController::class, 'status']);


    Route::get('get-cities', [MainController::class, 'cities']);
});

/* 
Route::resource('level', LevelController::class);
Route::get('level/update-status/{id}/{status}', [LevelController::class, 'status']);
Route::get('level/orderings/{id}/{num}', [LevelController::class, 'orderings']);
Route::get('level/get-destroy/{id}', [LevelController::class, 'destroy'])->name('level.get-destroy');
Route::resource('country', CountryController::class);
Route::get('country/update-status/{id}/{status}', [CountryController::class, 'status']);
Route::get('country/get-destroy/{id}', [CountryController::class, 'destroy'])->name('country.get-destroy');
Route::resource('category', CategoryController::class);
Route::get('category/update-status/{id}/{status}', [CategoryController::class, 'status']);
Route::get('category/get-destroy/{id}', [CategoryController::class, 'destroy'])->name('category.get-destroy');
Route::resource('city', CityController::class);
Route::get('city/update-status/{id}/{status}', [CityController::class, 'status']);
Route::get('city/get-destroy/{id}', [CityController::class, 'destroy'])->name('city.get-destroy');
Route::resource('question', QuestionController::class);
Route::get('question/update-status/{id}/{status}', [QuestionController::class, 'status']);
Route::get('question/orderings/{id}/{num}', [QuestionController::class, 'orderings']);
Route::get('question/get-destroy/{id}', [QuestionController::class, 'destroy'])->name('question.get-destroy');
 */