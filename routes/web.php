<?php

use App\Models\Level;
use App\Models\Question;
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
    echo '<h1><a target="_blank" href="' . route('admin.login') . '">company: </a> <br><a target="_blank" href="' . route('saas.login') . '">saas: </a></h1>';
});
