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
//profile
Route::get('profile',function (){
   return view('layouts.profile');
})->name('profile');



//brand|--------------------------------------------------------------------------
Route::get('/', function () {
    $brands = \Illuminate\Support\Facades\DB::table('brands')->get();
    return view('home', compact('brands'));

});

//روت های فوتر
//درباره ما|--------------------------------------------------------------------------
Route::get('abouts_us', function () {
    $abouts = \Illuminate\Support\Facades\DB::table('home_abouts')->first();
    return view('layouts.body.foot.home_abouts', compact('abouts'));

});


//دررباره وب سایت|--------------------------------------------------------------------------
Route::get('abouts_web', function () {
    $aboutsweb = \Illuminate\Support\Facades\DB::table('web_abouts')->first();
    return view('layouts.body.foot.web_abouts', compact('aboutsweb'));

});


//قوانین|--------------------------------------------------------------------------
Route::get('laws', function () {
    $laws = \Illuminate\Support\Facades\DB::table('laws')->first();
    return view('layouts.body.foot.laws', compact('laws'));

});


//تماس با ما|--------------------------------------------------------------------------
Route::get('contact_us', function () {
    $contact_us = \Illuminate\Support\Facades\DB::table('contact_us')->first();
    return view('layouts.body.foot.contact_us', compact('contact_us'));

});


Route::get('/home', function () {
    echo 'this is home page';

});

Route::get('/about', function () {
    return view('about');
});





//category|--------------------------------------------------------------------------
Route::resource('categories', \App\Http\Controllers\CategoryController::class);



//For Brand Route|--------------------------------------------------------------------------

Route::get('/brand/all', [\App\Http\Controllers\BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [\App\Http\Controllers\BrandController::class, 'StoreBrand'])->name('store.brand');

Route::get('/brand/edit/{id}', [\App\Http\Controllers\BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [\App\Http\Controllers\BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [\App\Http\Controllers\BrandController::class, 'Delete']);




//Multi Image  Route|--------------------------------------------------------------------------
Route::get('/multi/image', [\App\Http\Controllers\BrandController::class, 'MultiPic'])->name('multi.image');
Route::post('/multi/add', [\App\Http\Controllers\BrandController::class, 'StoreImage'])->name('store.image');





//Admin slider All Route|--------------------------------------------------------------------------
Route::get('/home/slider', [\App\Http\Controllers\HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider', [\App\Http\Controllers\HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [\App\Http\Controllers\HomeController::class, 'StoreSlider'])->name('store.slider');




// Home About As|--------------------------------------------------------------------------
Route::get('/home/About', [\App\Http\Controllers\AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/About', [\App\Http\Controllers\AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/About', [\App\Http\Controllers\AboutController::class, 'StoreAbout'])->name('store.about');

Route::get('/about/edit/{id}', [\App\Http\Controllers\AboutController::class, 'EditAbout']);
Route::post('/update/homeabout/{id}', [\App\Http\Controllers\AboutController::class, 'UpdateAbout']);
Route::get('/about/delete/{id}', [\App\Http\Controllers\AboutController::class, 'DeleteAbout']);





// Web About|--------------------------------------------------------------------------
Route::get('/about/web', [\App\Http\Controllers\AboutWebController::class, 'AboutWeb'])->name('about.web');
Route::get('/add/web', [\App\Http\Controllers\AboutWebController::class, 'AddWeb'])->name('add.web');
Route::post('/store/web', [\App\Http\Controllers\AboutWebController::class, 'StoreWeb'])->name('store.web');

Route::get('/web/edit/{id}', [\App\Http\Controllers\AboutWebController::class, 'EditWeb']);
Route::post('/update/aboutweb/{id}', [\App\Http\Controllers\AboutWebController::class, 'UpdateWeb']);
Route::get('/web/delete/{id}', [\App\Http\Controllers\AboutWebController::class, 'DeleteWeb']);




// Laws|--------------------------------------------------------------------------
Route::get('/laws/web', [\App\Http\Controllers\LawsController::class, 'LawsWeb'])->name('laws.web');
Route::get('/add/laws', [\App\Http\Controllers\LawsController::class, 'AddLaws'])->name('add.laws');
Route::post('/store/laws', [\App\Http\Controllers\LawsController::class, 'StoreLaws'])->name('store.laws');

Route::get('/laws/edit/{id}', [\App\Http\Controllers\LawsController::class, 'EditLaws']);
Route::post('/update/lawsweb/{id}', [\App\Http\Controllers\LawsController::class, 'UpdateLaws']);
Route::get('/laws/delete/{id}', [\App\Http\Controllers\LawsController::class, 'DeleteLaws']);



// Contact Us|--------------------------------------------------------------------------
Route::get('/contact/web', [\App\Http\Controllers\ContacUstController::class, 'ContactWeb'])->name('contact.web');
Route::get('/add/contact', [\App\Http\Controllers\ContacUstController::class, 'AddContact'])->name('add.contact');
Route::post('/store/contact', [\App\Http\Controllers\ContacUstController::class, 'StoreContact'])->name('store.contact');

Route::get('/contact/edit/{id}', [\App\Http\Controllers\ContacUstController::class, 'EditContact']);
Route::post('/update/contactweb/{id}', [\App\Http\Controllers\ContacUstController::class, 'UpdateContact']);
Route::get('/contact/delete/{id}', [\App\Http\Controllers\ContacUstController::class, 'DeleteContact']);
Route::get('/contactUs', [\App\Http\Controllers\ContacUstController::class, 'ContactUs'])->name('contactUs');





// Question|--------------------------------------------------------------------------
Route::get('/question/web', [\App\Http\Controllers\QuestionController::class, 'QuestionWeb'])->name('question.web');
Route::get('/add/question', [\App\Http\Controllers\QuestionController::class, 'AddQuestion'])->name('add.question');
Route::post('/store/question', [\App\Http\Controllers\QuestionController::class, 'StoreQuestion'])->name('store.question');

Route::get('/question/edit/{id}', [\App\Http\Controllers\QuestionController::class, 'EditQuestion']);
Route::post('/update/questionweb/{id}', [\App\Http\Controllers\QuestionController::class, 'UpdateQuestion']);
Route::get('/question/delete/{id}', [\App\Http\Controllers\QuestionController::class, 'DeleteQuestion']);





//offers|--------------------------------------------------------------------------
Route::get('/offers/web', [\App\Http\Controllers\OfferController::class, 'OffersWeb'])->name('offers.web');
Route::get('/offers/delete/{id}', [\App\Http\Controllers\OfferController::class, 'DeleteOffers']);

Route::get('offers', [\App\Http\Controllers\OfferController::class, 'Create'])->name('offer');
Route::post('offers', [\App\Http\Controllers\OfferController::class, 'Save'])->name('offer.form');


// Logout====================================================================
Route::get('/user/logout', [\App\Http\Controllers\BrandController::class, 'logOut'])->name('user.logout');




//  Change Password And User Profile Rute|--------------------------------------------------------------------------
Route::get('/user/password', [\App\Http\Controllers\ChangePass::class, 'CPassword'])->name('change.password');
Route::post('/password/update', [\App\Http\Controllers\ChangePass::class, 'UpdatePassword'])->name('password.update');





// User Profile|--------------------------------------------------------------------------
Route::get('/user/profile', [\App\Http\Controllers\ChangePass::class, 'PUpdate'])->name('profile.update');
Route::post('/user/profile/update', [\App\Http\Controllers\ChangePass::class, 'UpdateProfile'])->name('update.user.profile');

Route::get('order', [\App\Http\Controllers\OrderController::class, 'index'])->name('profile.orders');
Route::get('order/{order}', [\App\Http\Controllers\OrderController::class, 'showDetails'])->name('profile.orders.detail');
Route::get('order/{order}/payment', [\App\Http\Controllers\OrderController::class, 'payment'])->name('profile.orders.payment');



// Route Login Admin|--------------------------------------------------------------------------
Route::middleware(['auth:sanctum','verified','auth.admin'])->get('/dashboard',function(){
    return view('admin.index');
})->name('master_home');




// route Login User|--------------------------------------------------------------------------
Route::get('/',function(){
    return view('home');
})->name('user_home');

// Routs Users|--------------------------------------------------------------------------
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::get('/users/{user}/permissions', [\App\Http\Controllers\PerController::class, 'Create'])->name('users.permissions')->middleware('can:staff-user-permissions');
Route::post('/users/{user}/permissions', [\App\Http\Controllers\PerController::class, 'Store'])->name('users.permissions.store')->middleware('can:staff-user-permissions');
Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
Route::resource('roles', \App\Http\Controllers\RoleController::class);


//Routes Product|--------------------------------------------------------------------------
Route::resource('products', \App\Http\Controllers\ProductController::class);



// Route Product page|--------------------------------------------------------------------------
Route::get('product', [\App\Http\Controllers\ProductPageController::class, 'index'])->name('product');
Route::get('products/{product}', [\App\Http\Controllers\ProductPageController::class, 'single']);
Route::post('comments', [\App\Http\Controllers\HomeController::class, 'comment'])->name('send.comment');





// Gallery Image For Product|--------------------------------------------------------------------------
Route::resource('products.gallery',\App\Http\Controllers\ProductGalleryController::class);

//Route Comment Approved|--------------------------------------------------------------------------
Route::get('comments/unapproved', [\App\Http\Controllers\CommentController::class, 'unapproved'])->name('comment.approved');
Route::resource('comment', \App\Http\Controllers\CommentController::class)->only(['index', 'update', 'destroy']);





// Route search|--------------------------------------------------------------------------
Route::post('product/search', [\App\Http\Controllers\ProductPageController::class, 'ProductSearch'])->name('product.search');





//Rute Cart|--------------------------------------------------------------------------
Route::post('cart/add/{product}', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
Route::get('cart', [\App\Http\Controllers\CartController::class, 'cart']);
Route::patch('cart/quantity/change', [\App\Http\Controllers\CartController::class, 'quantityChange']);
Route::delete('cart/delete/{cart}', [\App\Http\Controllers\CartController::class, 'deleteFromCart'])->name('cart.destroy');



// Rote Payment|--------------------------------------------------------------------------
Route::middleware(['auth:sanctum'])->post('payment', [\App\Http\Controllers\PaymentController::class, 'payment'])->name('cart.payment');
Route::middleware(['auth:sanctum'])->get('payment/callback', [\App\Http\Controllers\PaymentController::class, 'callback'])->name('payment.callback');




//Route Orders|--------------------------------------------------------------------------
Route::resource('orders', \App\Http\Controllers\OrederbackController::class);
Route::get('orders/{order}/orders', [\App\Http\Controllers\OrederbackController::class, 'payments'])->name('orders.payments');

//Route Information------------------------------------------------------------------------

Route::get('/information/web', [\App\Http\Controllers\InformationController::class, 'InformationWeb'])->name('information.web');
Route::get('/information/delete/{id}', [\App\Http\Controllers\InformationController::class, 'DeleteInformation']);

Route::get('information', [\App\Http\Controllers\InformationController::class, 'Create'])->name('information');
Route::post('information', [\App\Http\Controllers\InformationController::class, 'Save'])->name('Information.form');

