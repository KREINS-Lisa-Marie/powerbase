<?php

use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',  [HomepageController::class, 'index'])->name('worker.homepage');


Route::get('/{locale}/contact', function () {
    return view('worker.contact');
})->name('worker.contact');

Route::get('/{locale}/order', function () {
    return view('worker.order');
})->name('worker.order');

Route::get('/{locale}/profile', function () {
    return view('worker.profile');
})->name('worker.profile');
