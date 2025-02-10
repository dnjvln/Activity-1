<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/signup', function () {
    return Inertia::render('HomePage/SignupPage');
})->name('signup');

Route::get('/login', function () {
    return Inertia::render('HomePage/LoginPage');
})->name('login');

Route::get('/home', function () {
    return Inertia::render('HomePage/HomePage');
})->name('home');

Route::get('/about', function () {
    return Inertia::render('HomePage/AboutPage');
})->name('about');

Route::get('/contact', function () {
    return Inertia::render('HomePage/ContactUsPage');
})->name('contact');



//MAINPAGE

Route::get('/mainpage', function () {
    return Inertia::render('MainPage/MainPage');
})->name('mainpage');


//NAVBAR BUTTONS
Route::get('/haircare', function () {
    return Inertia::render('MainPage/Haircare/HaircarePage');
})->name('haircare');

Route::get('/skincare', function () {
    return Inertia::render('MainPage/Skincare/SkincarePage');
})->name('skincare');

Route::get('/makeup', function () {
    return Inertia::render('MainPage/Makeup/MakeupPage');
})->name('makeup');



// DROPDOWNS

Route::get('/user', function () {
    return Inertia::render('Account/user/UserPage');
})->name('user');

Route::get('/order', function () {
    return Inertia::render('Checkout/OrderPage');
})->name('order');

Route::get('/carts', function () {
    return Inertia::render('Checkout/CartsPage');
})->name('carts');

Route::get('/favorites', function () {
    return Inertia::render('Favorites/FavoritesPage');
})->name('favorites');



// OTHER LINKS

Route::get('/details', function () {
    return Inertia::render('Checkout/Details');
})->name('details');

Route::get('/products', function () {
    return Inertia::render('Products/ProductsPage');
})->name('products');



//USER AND SELLER LINKS
Route::get('/usercreate', function () {
    return Inertia::render('Account/seller/UserCreate');
})->name('usercreate');

Route::get('/sellerprofile', function () {
    return Inertia::render('Account/user/SellerProfile');
})->name('sellerprofile');

Route::get('/sellercreate', function () {
    return Inertia::render('Account/seller/SellerCreate');
})->name('sellercreate');

Route::get('/sellerproduct', function () {
    return Inertia::render('Account/seller/SellerProduct');
})->name('sellerproduct');



