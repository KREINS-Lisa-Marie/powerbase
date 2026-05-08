<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/{locale}',  [HomepageController::class, 'index'])->name('worker.homepage')->middleware([
    'auth',
]);

Route::get('/{locale}/contact', function () {
    return view('worker.contact');
})->name('worker.contact')->middleware([
    'auth',
]);

Route::get('/{locale}/order', function () {
    return view('worker.order');
})->name('worker.order')->middleware([
    'auth',
]);

Route::get('/{locale}/profile', function () {
    return view('worker.profile');
})->name('worker.profile')->middleware([
    'auth',
]);

Route::get('/{locale}/products',  [ProductController::class, 'index']
)->name('worker.products')->middleware([
    'auth',
]);

Route::get('/{locale}/products/{product}', [ProductController::class, 'show'])->name('worker.product')->middleware([
    'auth',
]);

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

Route::livewire('/{locale}/admin/products/{product}/show', 'pages::products.show')->name('pages::products.show')->middleware([
    'auth',
]);
Route::livewire('/{locale}/admin/products/create', 'pages::products.create')->name('pages::products.create')->middleware([
    'auth',
]);

Route::livewire('/{locale}/admin/products/{product}/edit', 'pages::products.edit')->name('pages::products.edit')->middleware([
    'auth',
]);

Route::livewire('/{locale}/admin/products', 'pages::products.index')->name('pages::products.index')->middleware([
    'auth',
]);

Route::livewire('/{locale}/admin/projects', 'pages::projects.index')->name('pages::projects.index')->middleware([
    'auth',
]);
Route::livewire('/{locale}/admin/projects/create', 'pages::projects.create')->name('pages::projects.create')->middleware([
    'auth',
]);

Route::livewire('/{locale}/admin/projects/{project}/show', 'pages::projects.show')->name('pages::projects.show')->middleware([
    'auth',
]);

Route::livewire('/{locale}/admin/projects/{project}/edit', 'pages::projects.edit')->name('pages::projects.edit')->middleware([
    'auth',
]);

Route::livewire('/{locale}/admin/orders', 'pages::orders.index')->name('pages::orders.index')->middleware([
    'auth',
]);

Route::livewire('/{locale}/admin/orders/{order}/show', 'pages::orders.show')->name('pages::orders.show')->middleware([
    'auth',
]);

Route::livewire('/{locale}/admin/orders/{order}/edit', 'pages::orders.edit')->name('pages::orders.edit')->middleware([
    'auth',
]);

Route::livewire('/{locale}/admin/orders/create', 'pages::orders.create')->name('pages::orders.create')->middleware([
    'auth',
]);

Route::livewire('/{locale}/admin/profile/{profile}/edit', 'pages::profile.edit')->name('pages::profile.edit')->middleware([
    'auth',
]);

