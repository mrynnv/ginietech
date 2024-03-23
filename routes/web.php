<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhoneController;
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

Route::view('/letter-combinations', 'letter_combinations');
Route::post('/letter-combinations', [PhoneController::class, 'generateLetterCombinations']);

Route::get('/users', 'UserController@index')->name('users.index');
Route::post('/users', 'UserController@store')->name('users.store');
Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('/users/{user}', 'UserController@update')->name('users.update');
Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

Route::resource('users', 'UserController');

Route::get('/', function () {
    return view('welcome');
});
