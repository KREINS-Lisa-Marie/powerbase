<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/{locale}',  [HomepageController::class, 'index'])->name('worker.homepage');

Route::get('/{locale}/contact', function () {
    return view('worker.contact');
})->name('worker.contact');

Route::get('/{locale}/order', function () {
    return view('worker.order');
})->name('worker.order');

Route::get('/{locale}/profile', function () {
    return view('worker.profile');
})->name('worker.profile');

Route::get('/{locale}/products',  [ProductController::class, 'index']
)->name('worker.products');

Route::get('/{locale}/products/{product}', function () {
    return view('worker.product');
})->name('worker.product');

Route::get('/{locale}/login', function () {
    return view('auth.login');
})->name('auth.login');

Route::get('/{locale}/forgot-password', function () {
    return view('auth.forgot-password');
})->name('auth.forgot-password');

Route::get('/{locale}/reset-password', function () {
    return view('auth.reset-password');
})->name('auth.reset-password');



Route::livewire('/{locale}/dashboard', 'pages::dashboard.index')->name('pages::dashboard.index')->middleware([
    'auth',
]);

Route::livewire('/{locale}/admin/profile', 'pages::profile.index')->name('pages::profile.index')->middleware([
    'auth',
]);


Route::livewire('/{locale}/admin/contacts', 'pages::contacts.index')->name('pages::contacts.index')->middleware([
    'auth',
]);

Route::livewire('/{locale}/admin/contacts/create', 'pages::contacts.create')->name('pages::contacts.create')->middleware([
    'auth',
]);

Route::livewire('/{locale}/admin/contacts/{contact}/edit', 'pages::contacts.edit')->name('pages::contacts.edit')->middleware([
    'auth',
]);

Route::livewire('/{locale}/admin/contacts/{contact}/show', 'pages::contacts.show')->name('pages::contacts.show')->middleware([
    'auth',
]);

Route::livewire('/{locale}/admin/products/{product}/show', 'pages::products.show')->name('pages::contacts.show')->middleware([
    'auth',
]);


Route::livewire('/{locale}/admin/products', 'pages::products.index')->name('pages::products.index')->middleware([
    'auth',
]);
