<?php


use App\Http\Controllers\Saas\AdminController;
use App\Http\Controllers\Saas\AdmingroupController;
use App\Http\Controllers\Saas\CategoryController;
use App\Http\Controllers\Saas\CityController;
use App\Http\Controllers\Saas\CountryController;
use App\Http\Controllers\Saas\HomeController;
use App\Http\Controllers\Saas\MainController;
use App\Http\Controllers\Saas\MemberController;
use App\Http\Controllers\Saas\SettingController;
use App\Http\Controllers\Saas\LevelController;
use App\Http\Controllers\Saas\QuestionController;


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

Route::get('/', function () {
    return redirect()->route('admin.login');
});
Route::group(['middleware' => 'guest:web'], function () {
    Route::get('/login', [AdminController::class, 'viewLogin'])->name('saas.login');
    Route::post('/login', [AdminController::class, 'login'])->name('saas.login.post');
});

Route::group(['middleware' => 'auth:web', 'as' => 'saas.'], function () {
    Route::get('change-password', [AdminController::class, 'changePasswordView'])->name('change-password');
    Route::put('change-password/update', [AdminController::class, 'changePassword'])->name('change-password.update');
    Route::any('saas-logout', [AdminController::class, 'adminLogout'])->name('logout');
    Route::resource('home', HomeController::class);

    Route::resource('category', CategoryController::class);
    Route::get('category/update-status/{id}/{status}', [CategoryController::class, 'status']);
    Route::get('category/get-destroy/{id}', [CategoryController::class, 'destroy'])->name('category.get-destroy');


    Route::resource('city', CityController::class);
    Route::get('city/update-status/{id}/{status}', [CityController::class, 'status']);
    Route::get('city/get-destroy/{id}', [CityController::class, 'destroy'])->name('city.get-destroy');


    Route::get('get-cities', [MainController::class, 'cities']);


    Route::resource('country', CountryController::class);
    Route::get('country/update-status/{id}/{status}', [CountryController::class, 'status']);
    Route::get('country/get-destroy/{id}', [CountryController::class, 'destroy'])->name('country.get-destroy');

    Route::resource('member', MemberController::class);
    Route::get('member/update-status/{id}/{status}', [MemberController::class, 'status']);
    Route::get('member/get-destroy/{id}', [MemberController::class, 'destroy'])->name('member.get-destroy');


    Route::resource('admingroup', AdmingroupController::class);
    Route::get('admingroup/update-status/{groupid}/{roleid}/{status}', [AdmingroupController::class, 'status']);

    Route::resource('setting', SettingController::class);


    Route::resource('level', LevelController::class);

    Route::get('level/update-status/{id}/{status}', [LevelController::class, 'status']);
    Route::get('level/orderings/{id}/{num}', [LevelController::class, 'orderings']);
    Route::get('level/get-destroy/{id}', [LevelController::class, 'destroy'])->name('level.get-destroy');


    Route::resource('question', QuestionController::class);
    Route::get('question/update-status/{id}/{status}', [QuestionController::class, 'status']);
    Route::get('question/orderings/{id}/{num}', [QuestionController::class, 'orderings']);
    Route::get('question/get-destroy/{id}', [QuestionController::class, 'destroy'])->name('question.get-destroy');


    // Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    // Route::get('setting/create', [SettingController::class, 'create'])->name('saas.setting.create');
    // Route::get('setting/index1', [SettingController::class, 'index1'])->name('setting.index1');
    // Route::put('setting', [SettingController::class, 'update'])->name('setting.update');

});
