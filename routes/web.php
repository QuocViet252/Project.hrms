<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//branch
Route::get('/branch', 'Branch\BranchController@index')->name('Branch');

Route::get('/add-branch', 'Branch\BranchController@create')->name('Branch');
Route::post('/add-branch', 'Branch\BranchController@store')->name('Branch');

Route::get('/delete/{id}', 'Branch\BranchController@destroy')->name('delete');

Route::get('/update/{id}', 'Branch\BranchController@edit')->name('update');
Route::post('/update/{id}', 'Branch\BranchController@update')->name('update');

//branch_employee
Route::get('/branch-employee', 'Branch\BranchEmployeeController@index')->name('Branch');



