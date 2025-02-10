<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
require base_path('routes/admin.php');

Route::get('/', function () {
    return Inertia::render('HomePage/HomePage', [
        'canLogin' => Route::has('loginpage'),
        'canRegister' => Route::has('signuppage'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('MainPage/MainPage');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/loginpage', function () {
    return Inertia::render('HomePage/LoginPage', []);
})->name('loginpage');
// Logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Login route



// Register route
Route::get('/signuppage', function () {
    return Inertia::render('HomePage/SignupPage');
})->name('signuppage');





// HOMEPAGE

Route::get('/about', function () {
    return Inertia::render('HomePage/AboutPage');
})->name('about');

Route::get('/contact', function () {
    return Inertia::render('HomePage/ContactUsPage');
})->name('contact');







// MAINPAGE
Route::get('/mainpage', function () {
    return Inertia::render('MainPage/MainPage');
})->name('mainpage');


//DISPLAY PRODUCTS FOR MAINPAGE
Route::get('/mainpage/products', [ProductController::class, 'getMainPageProducts']);

// Existing Product Routes
Route::get('/api/products', [ProductController::class, 'getProductsByType'])->middleware('auth');
Route::get('/api/fetch', [ProductController::class, 'fetchProducts']);

// New Favorite Route
Route::get('/api/favorites/count', [FavoriteController::class, 'getFavoritesCount'])->middleware('auth');
Route::get('/favorites/count', [FavoriteController::class, 'getFavoritesCount'])->middleware('auth:sanctum');
Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->middleware('auth:sanctum');

// OTHER LINKS

Route::get('/products', function () {
    return Inertia::render('Products/ProductsPage');
})->name('products');


Route::get('/favorites', function () {
    return Inertia::render('Favorites/FavoritesPage');
})->name('favorites');

Route::post('/api/favorites/toggle', [FavoriteController::class, 'toggle'])->middleware('auth');







//USER LINKS

Route::get('/user', function () {
    return Inertia::render('Account/user/UserPage', [
        'user' => auth()->user(),
    ]);
})->name('user');

Route::post('/change-password', [UserController::class, 'changePassword'])->name('password.change');

Route::get('/sellerprofile', function () {
    return Inertia::render('Account/user/SellerProfile');
})->name('sellerprofile');

Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('profile.update');


//USER AND SELLER LINKS

Route::get('/usercreate', function () {
    return Inertia::render('Account/seller/UserCreate');
})->name('usercreate');

Route::get('/sellercreate', function () {
    return Inertia::render('Account/seller/SellerCreate');
})->name('sellercreate');

Route::get('/sellerproduct', function () {
    return Inertia::render('Account/seller/SellerProduct');
})->name('sellerproduct');





//ORDERS  SECTION

Route::get('/order', function () {
    return Inertia::render('Checkout/OrderPage');
})->name('order');

Route::get('/carts', function () {
    return Inertia::render('Checkout/CartsPage');
})->name('carts');

Route::get('/details', function () {
    return Inertia::render('Checkout/Details');
})->name('details');








//FETCH PRODUCT SUBTYPE IMAGES
Route::get('/api/fetch', [ProductController::class, 'fetchProductsBySubtype']);


//SKINCARE ROUTES
Route::prefix('skincare')->group(function () {
    Route::get('/', function () {
        return Inertia::render('MainPage/Skincare/SkincarePage');
    })->name('skincare.index');

    Route::get('/toner', function () {
        return Inertia::render('MainPage/Skincare/Toner', [
            'subtype_id' => 4,
        ]);
    })->name('skincare.toner');

    Route::get('/moisturizer', function () {
        return Inertia::render('MainPage/Skincare/Moisturizer', [
            'subtype_id' => 2,
        ]);
    })->name('skincare.moisturizer');

    Route::get('/cream', function () {
        return Inertia::render('MainPage/Skincare/Cream', [
            'subtype_id' => 1,
        ]);
    })->name('skincare.cream');

    Route::get('/sunscreen', function () {
        return Inertia::render('MainPage/Skincare/Sunscreen', [
            'subtype_id' => 3,
        ]);
    })->name('skincare.sunscreen');
});



//MAKEUP ROUTES
Route::prefix('makeup')->group(function () {
    Route::get('/', function () {
        return Inertia::render('MainPage/Makeup/MakeupPage');
    })->name('makeup.index');

    Route::get('/foundations', function () {
        return Inertia::render('MainPage/Makeup/Foundations', [
            'subtype_id' => 11,
        ]);
    })->name('makeup.foundations');

    Route::get('/concealers', function () {
        return Inertia::render('MainPage/Makeup/Concealers', [
            'subtype_id' => 10,
        ]);
    })->name('makeup.concealers');

    Route::get('/blushes', function () {
        return Inertia::render('MainPage/Makeup/Blushes', [
            'subtype_id' => 9,
        ]);
    })->name('makeup.blushes');

    Route::get('/lip-tints', function () {
        return Inertia::render('MainPage/Makeup/LipTints', [
            'subtype_id' => 12,
        ]);
    })->name('makeup.lip-tints');
});



// HAIRCARE LISTS
Route::prefix('haircare')->group(function () {
    Route::get('/', function () {
        return Inertia::render('MainPage/Haircare/HaircarePage');
    })->name('haircare.index');

    Route::get('/shampoo', function () {
        return Inertia::render('MainPage/Haircare/Shampoo', [
            'subtype_id' => 8,
        ]);
    })->name('haircare.shampoo');

    Route::get('/conditioner', function () {
        return Inertia::render('MainPage/Haircare/Conditioner', [
            'subtype_id' => 5,
        ]);
    })->name('haircare.conditioner');

    Route::get('/dry-shampoo', function () {
        return Inertia::render('MainPage/Haircare/DryShampoo', [
            'subtype_id' => 6,
        ]);
    })->name('haircare.dry-shampoo');

    Route::get('/hairspray', function () {
        return Inertia::render('MainPage/Haircare/Hairspray', [
            'subtype_id' => 7,
        ]);
    })->name('haircare.hairspray');
});

