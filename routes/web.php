<?php

use App\Http\Controllers\admin\adminDashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SearchviewController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/login', function () {
    return view('auth.login');
    return redirect('/');
})->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*================================
         Normal User Panel
==================================*/
/*
Route::controller(SearchController::class)->group(function () {
        
    Route::get('/search', 'search')->name('search');

});

Route::controller(SearchviewController::class)->group(function () {
        
    Route::get('/posts/{id}', 'search_show')->name('searchshow');

});

*/
Route::controller(HomeController::class)->group(function () {
        
    Route::get('/', 'home_final')->name('home');

});



Route::controller(ClientController::class)->group(function () {
        
    Route::get('/category-page/{id}/{slug}', 'category_page')->name('category');
    Route::get('/single-product/{id}/{slug}', 'single_product')->name('singleproduct');
    Route::get('/new-releases', 'new_releases')->name('newreleases');
    Route::get('/best-seller', 'best_seller')->name('bestseller');
    Route::get('/gift-idea', 'gift_idea')->name('giftidea');

});

/*================================
         Logged in User Panel
==================================*/

Route::middleware(['auth', 'role:user'])->group(function () {
   
    Route::controller(ClientController::class)->group(function () {
        
        Route::get('/add-to-cart', 'add_to_cart')->name('addtocart');
        Route::post('/add-product-to-cart', 'add_product_to_cart')->name('addproducttocart');
        Route::get('/remove-cart-item/{id}', 'remove_cart_item')->name('removecartitem');
        Route::get('/check-out', 'check_out')->name('checkout');
        Route::get('/shipping-address', 'shipping_address')->name('shippingaddress');
        Route::post('/add-shipping-address', 'add_shipping_address')->name('addshippingaddress');
        Route::post('/place-order', 'place_order')->name('placeorder');
        Route::get('/user-profile', 'user_profile')->name('userprofile');
        Route::get('/user-pending-orders', 'user_pending_orders')->name('userpendingorders');
        Route::get('/order-history', 'order_history')->name('orderhistory');
        Route::get('/profile-info', 'profile_info')->name('profileinfo');
        Route::get('/todays-deal', 'todays_deal')->name('todaysdeal');
        Route::get('/customer-service', 'customer_service')->name('customerservice');

    });

});

/*=======================
         Admin Panel
========================*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    
    Route::controller(adminDashboardController::class)->group(function () {
        
        Route::get('/admin/admin-dashboard', 'admin_dashboard')->name('admindashboard');

    });
    
    Route::controller(CategoryController::class)->group(function () {

        Route::get('/admin/add-category', 'add_category')->name('addcategory');
        Route::get('/admin/all-category', 'all_category')->name('allcategory');
        Route::post('/admin/store-category', 'store_category')->name('storecategory');
        Route::get('/admin/edit-category/{id}', 'edit_category')->name('editcategory');
        Route::post('/admin/update-category', 'update_category')->name('updatecategory');
        Route::get('/admin/delete-category/{id}', 'delete_category')->name('deletecategory');

    });

    Route::controller(SubCategoryController::class)->group(function () {

        Route::get('/admin/add-subcategory', 'add_subcategory')->name('addsubcategory');
        Route::get('/admin/all-subcategory', 'all_subcategory')->name('allsubcategory');
        Route::post('/admin/store-subcategory', 'store_subcategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}', 'edit_subcategory')->name('editsubcategory');
        Route::post('/admin/update-subcategory', 'update_subcategory')->name('updatesubcategory');
        Route::get('/admin/delete-subcategory/{id}', 'delete_subcategory')->name('deletesubcategory');

    });

    Route::controller(ProductController::class)->group(function () {

        Route::get('/admin/add-products', 'add_products')->name('addproducts');
        Route::get('/admin/all-products', 'all_products')->name('allproducts');
        Route::post('/admin/store-product', 'store_product')->name('storeproduct');
        Route::get('/admin/edit-product/{id}', 'edit_product')->name('editproduct');
        Route::get('/admin/edit-product-image/{id}', 'edit_product_image')->name('editproductimage');
        Route::post('/admin/update-product', 'update_product')->name('updateproduct');
        Route::post('/admin/update-product-image', 'update_product_image')->name('updateproductimage');
        Route::get('/admin/delete-product/{id}', 'delete_product')->name('deleteproduct');

    });

    Route::controller(OrderController::class)->group(function () {

        Route::get('/admin/pending-orders', 'pending_orders')->name('pendingorders');
        Route::post('/admin/approve-order/', 'approve_order')->name('approveorder');
        Route::get('/admin/completed-orders', 'completed_orders')->name('completedorders');
        Route::get('/admin/canceled-orders', 'canceled_orders')->name('canceledorders');

    });
    
});


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

require __DIR__.'/auth.php';

