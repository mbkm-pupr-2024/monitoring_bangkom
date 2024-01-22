<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/courses', function () {
    return view('courses');
})->name('add-course');

Route::get('/courses/status', function () {
    return view('courses');
})->name('ongoing-course');

Route::get('/courses/completed', function () {
    return view('courses');
})->name('completed-course');