<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//* --------------------------------- Web Application --------------------------------------- *//

Route::get('/overview', 'Api\StudentController@overview');
Route::post('/update/status/{student}', 'Api\StudentController@updateStatus');

//* ----------------------------------------------------------------------------------------- *//
