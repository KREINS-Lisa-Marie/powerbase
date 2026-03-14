<?php

use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',  [HomepageController::class, 'index'])->name('worker.homepage');
