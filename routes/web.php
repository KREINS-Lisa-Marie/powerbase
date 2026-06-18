<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('auth.login', ['locale' => app()->getLocale()]);
});

/*Route::get('/home', function (){
        // si worker alors redirigé vers pages worker et sinon vers admin
    //$locale = app()->getLocale() ?? 'fr';
    //car il n'y a pas encore de locale dans la route home. Je ne peux pas la mettre car sinon laravel cloud n'acceptera pas ma route /home dans fortify

    return ( auth()->user()->job == 'admin' || auth()->user()->job == 'storekeeper' )
        ? route( 'pages::dashboard.index', ['locale' => 'fr'])
        : route( 'worker.homepage', ['locale' => 'fr']);
});*/

Route::get('/login', function () {
    return redirect()->route('auth.login', ['locale' => app()->getLocale()])->name('login');
});

Route::get('/{locale}/login', function () {
    return view('auth.login');
})->name('auth.login')->middleware('guest');

Route::get('/{locale}/forgot-password', function () {
    return view('auth.forgot-password');
})->name('auth.forgot-password')->middleware('guest');

Route::get('/{locale}/reset-password', function () {
    return view('auth.reset-password');
})->name('auth.reset-password')->middleware('guest');
/*
Route::get('/{locale}/dashboard', function () {
    $locale = app()->getLocale() ?? 'fr';
    if (auth()->user()->job == 'worker'){
        return redirect()->route('worker.homepage', ['locale' => $locale]);
    }
    Route::livewire('/{locale}/dashboard', 'pages::dashboard.index')->name('pages::dashboard.index')->middleware([
        'auth', 'isAdminOrStorekeeper'
    ]);
})->name('pages::dashboard.index')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);
*/

Route::livewire('/{locale}/dashboard', 'pages::dashboard.index')->name('pages::dashboard.index')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);

Route::livewire('/{locale}/admin/profile', 'pages::profile.index')->name('pages::profile.index')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);


Route::livewire('/{locale}/admin/contacts', 'pages::contacts.index')->name('pages::contacts.index')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);

Route::livewire('/{locale}/admin/contacts/create', 'pages::contacts.create')->name('pages::contacts.create')->middleware([
    'auth', 'isAdmin',
]);

Route::livewire('/{locale}/admin/contacts/{contact}/edit', 'pages::contacts.edit')->name('pages::contacts.edit')->middleware([
    'auth', 'isAdmin',
]);

Route::livewire('/{locale}/admin/contacts/{contact}/show', 'pages::contacts.show')->name('pages::contacts.show')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);

Route::livewire('/{locale}/admin/products/{product}/show', 'pages::products.show')->name('pages::products.show')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);
Route::livewire('/{locale}/admin/products/create', 'pages::products.create')->name('pages::products.create')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);

Route::livewire('/{locale}/admin/products/{product}/edit', 'pages::products.edit')->name('pages::products.edit')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);

Route::livewire('/{locale}/admin/products', 'pages::products.index')->name('pages::products.index')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);

Route::livewire('/{locale}/admin/projects', 'pages::projects.index')->name('pages::projects.index')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);
Route::livewire('/{locale}/admin/projects/create', 'pages::projects.create')->name('pages::projects.create')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);

Route::livewire('/{locale}/admin/projects/{project}/show', 'pages::projects.show')->name('pages::projects.show')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);

Route::livewire('/{locale}/admin/projects/{project}/edit', 'pages::projects.edit')->name('pages::projects.edit')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);

Route::livewire('/{locale}/admin/orders', 'pages::orders.index')->name('pages::orders.index')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);

Route::livewire('/{locale}/admin/orders/{order}/show', 'pages::orders.show')->name('pages::orders.show')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);

Route::livewire('/{locale}/admin/orders/{order}/edit', 'pages::orders.edit')->name('pages::orders.edit')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);

Route::livewire('/{locale}/admin/orders/create', 'pages::orders.create')->name('pages::orders.create')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);

Route::livewire('/{locale}/admin/profile/{profile}/edit', 'pages::profile.edit')->name('pages::profile.edit')->middleware([
    'auth', 'isAdminOrStorekeeper'
]);




Route::get('/{locale}',  [HomepageController::class, 'index'])->name('worker.homepage')->middleware([
    'auth', 'isWorker',
]);

Route::get('/{locale}/contact', function () {
    return view('worker.contact');
})->name('worker.contact')->middleware([
    'auth', 'isWorker',
]);

Route::livewire('/{locale}/order', 'worker::order')->name('worker::order')->middleware([
    'auth', 'isWorker',
]);

Route::get('/{locale}/profile', function () {
    return view('worker.profile');
})->name('worker.profile')->middleware([
    'auth', 'isWorker',
]);

Route::get('/{locale}/products',  [ProductController::class, 'index']
)->name('worker.products')->middleware([
    'auth', 'isWorker',
]);

Route::livewire('/{locale}/products/{product}', 'worker::product')->name('worker::product')->middleware([
    'auth', 'isWorker',
]);
