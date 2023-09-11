<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

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
    return redirect(App::getLocale() . '/' . (App::getLocale() == 'tr' ? 'anasayfa' : 'home'));
});

// Türkçe için özelleştirilmiş rotalar
Route::prefix('tr')->group(function() {
    Route::get('anasayfa', [HomeController::class, 'homepage'])->name('tr.home');
    Route::get('hakkimizda', [HomeController::class, 'about'])->name('tr.about');
    Route::get('menu', [HomeController::class, 'menu'])->name('tr.menu');
    Route::get('foto-galeri', [HomeController::class, 'gallery'])->name('tr.gallery');
    Route::get('blog', [HomeController::class, 'blog'])->name('tr.blog');
    Route::get('rezervasyon', [HomeController::class, 'booking'])->name('tr.reservation');
    Route::get('iletisim', [HomeController::class, 'contact'])->name('tr.contact');
    Route::get('subeler', [HomeController::class, 'branches'])->name('tr.branches');
    Route::get('sube-detay/{slug}', [HomeController::class, 'branch_details'])->name('tr.branch_details');
    Route::get('blog_detay/{slug}', [HomeController::class, 'blogDetails'])->name('tr.blog_details');
    Route::post('book_a_table', [HomeController::class, 'book_a_table_form'])->name('tr.book_a_table');


});


Route::prefix('en')->group(function() {
    Route::get('home', [HomeController::class, 'homepage'])->name('en.home');
    Route::get('about', [HomeController::class, 'about'])->name('en.about');
    Route::get('menu', [HomeController::class, 'menu'])->name('en.menu');
    Route::get('gallery', [HomeController::class, 'gallery'])->name('en.gallery');
    Route::get('blog', [HomeController::class, 'blog'])->name('en.blog');
    Route::get('reservation', [HomeController::class, 'booking'])->name('en.reservation');
    Route::get('contact', [HomeController::class, 'contact'])->name('en.contact');
    Route::get('branches', [HomeController::class, 'branches'])->name('en.branches');
    Route::get('branch-details/{slug}', [HomeController::class, 'branch_details'])->name('en.branch_details');
    Route::get('blog_details/{slug}', [HomeController::class, 'blogDetails'])->name('en.blog_details');
    Route::post('book_a_table', [HomeController::class, 'book_a_table_form'])->name('en.book_a_table');

});

Route::prefix('ar')->group(function() {
    Route::get('al-bayt', [HomeController::class, 'homepage'])->name('ar.home');
    Route::get('an', [HomeController::class, 'about'])->name('ar.about');
    Route::get('qaimat', [HomeController::class, 'menu'])->name('ar.menu');
    Route::get('mustawda', [HomeController::class, 'gallery'])->name('ar.gallery');
    Route::get('mudawwanat', [HomeController::class, 'blog'])->name('ar.blog');
    Route::get('hajz', [HomeController::class, 'booking'])->name('ar.reservation');
    Route::get('ittisal', [HomeController::class, 'contact'])->name('ar.contact');
    Route::get('furoo', [HomeController::class, 'branches'])->name('ar.branches');
    Route::get('tafaasil-furoo/{slug}', [HomeController::class, 'branch_details'])->name('ar.branch-details');
    Route::get('tafaasil-mudawwanat/{slug}', [HomeController::class, 'blogDetails'])->name('ar.blog_details');
    Route::post('book_a_table', [HomeController::class, 'book_a_table_form'])->name('ar.book_a_table');

});





//Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
//Route::get('/menu', [App\Http\Controllers\HomeController::class, 'menu'])->name('menu');
//Route::get('/menu_single/{slug}', [App\Http\Controllers\HomeController::class, 'menu_single'])->name('menu_single');
//Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
//Route::get('/gallery', [App\Http\Controllers\HomeController::class, 'gallery'])->name('gallery');
//Route::get('/booking', [App\Http\Controllers\HomeController::class, 'booking'])->name('booking');
//Route::get('/privacy', [App\Http\Controllers\HomeController::class, 'privacy'])->name('privacy');
//Route::post('/add_send_contact_form', [App\Http\Controllers\HomeController::class, 'add_send_contact_form'])->name('add_send_contact_form');
//Route::post('/add_subscriber', [App\Http\Controllers\HomeController::class, 'add_subscriber'])->name('add_subscriber');
//
//
//
Auth::routes();
Route::get('/admin', [AdminController::class, 'root'])->name('root');
Route::get('/home', [AdminController::class, 'home'])->name('home');
//Route::get('/login', [App\Http\Controllers\AdminController::class, 'root'])->name('root');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin-main', [AdminController::class, 'main'])->name('admin_main');
    Route::get('/admin-contact', [AdminController::class, 'contact'])->name('admin_contact');
    Route::post('/contact-update', [AdminController::class, 'contact_update'])->name('admin.update_contact');
    Route::get('/admin-bookings', [AdminController::class, 'bookings'])->name('admin.bookings');

    Route::get('/admin-about', [AdminController::class, 'about'])->name('admin_about');
    Route::post('/about-update', [AdminController::class, 'about_update'])->name('admin.update_about');

    Route::get('/edit-menu/{id}', [AdminController::class, 'edit_menu'])->name('menu.edit');
    Route::post('/update-menu/{id}', [AdminController::class, 'update_menu'])->name('menu.update');
    Route::get('/admin-menu/{id}', [AdminController::class, 'admin_menu'])->name('admin-menu');
    Route::post('/add-menu', [AdminController::class, 'add_menu'])->name('add_menu');
    Route::get ('/delete-menu/{id}', [AdminController::class, 'delete_menu'])->name('menu.delete');
    Route::post('/menu-update-priority', [AdminController::class, 'menu_update_priority'])->name('menu-update-priority');
    Route::post('/add-foodtype', [AdminController::class, 'add_foodtype'])->name('add_foodtype');
    Route::get('/edit-foodtype/{id}', [AdminController::class, 'edit_foodtype'])->name('foodtype.edit');
    Route::delete ('/delete-foodtype/{id}', [AdminController::class, 'delete_foodtype'])->name('foodtype.delete');
    Route::post('/update-foodtype/{id}', [AdminController::class, 'update_foodtype'])->name('foodtype.update');


    Route::get('/admin-slider', [AdminController::class, 'slider'])->name('admin_slider');
    Route::post('/add-slider', [AdminController::class, 'add_slider'])->name('add_slider');
    Route::get ('/slider-edit/{id}', [AdminController::class, 'slider_edit'])->name('slider.edit');
    Route::post('/slider-update/{id}', [AdminController::class, 'slider_update'])->name('slider.update');
    Route::delete('/slider-delete/{id}', [AdminController::class, 'slider_delete'])->name('slider.delete');

    Route::get('/admin-photos', [AdminController::class, 'admin_photos'])->name('admin-photos');
    Route::post('/update-photo/{id}', [AdminController::class, 'update_photo'])->name('photo.update');
    Route::get ('/edit-photo/{id}', [AdminController::class, 'edit_photo'])->name('photo.edit');
    Route::post('/add-photo', [AdminController::class, 'add_photos'])->name('photos.add');
    Route::delete('/delete-photo/{id}', [AdminController::class, 'delete_photo'])->name('photo.delete');
    Route::delete('/delete-photo-category/{id}', [AdminController::class, 'delete_photo_category'])->name('photocategory.delete');
    Route::post('/add-photo-category', [AdminController::class, 'add_photo_category'])->name('photo_category.add');
    Route::get('/edit-photocategory/{id}', [AdminController::class, 'edit_photocategory'])->name('photocategory.edit');
    Route::post('/update-photocategory/{id}', [AdminController::class, 'update_photocategory'])->name('photocategory.update');

    Route::get('/admin-blog/{id}', [AdminController::class, 'admin_blog'])->name('admin-blog');
    Route::post('/add-blog', [AdminController::class, 'add_blog'])->name('add_blog');
    Route::post('/update-blog/{id}', [AdminController::class, 'update_blog'])->name('blog.update');
    Route::get ('/edit-blog/{id}', [AdminController::class, 'edit_blog'])->name('blog.edit');
    Route::get ('/delete-blog/{id}', [AdminController::class, 'delete_blog'])->name('blog.delete');
    Route::post('/add-blog-category', [AdminController::class, 'add_blogcategory'])->name('add_blogcategory');
    Route::get('/edit-blogcategory/{id}', [AdminController::class, 'edit_blogcategory'])->name('blogcategory.edit');
    Route::delete ('/delete-blogcategory/{id}', [AdminController::class, 'delete_blogcategory'])->name('blogcategory.delete');
    Route::post('/update-blogcategory/{id}', [AdminController::class, 'update_blogcategory'])->name('blogcategory.update');


    Route::get('/admin-seo', [AdminController::class, 'admin_seo'])->name('admin-seo');
    Route::post('/update-seo/{id}', [AdminController::class, 'update_seo'])->name('seo.update');
    Route::get ('/edit_seo/{id}', [AdminController::class, 'edit_seo'])->name('seo.edit');


});

