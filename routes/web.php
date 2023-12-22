<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
    // return view('welcome');
    return redirect('login');
});

Auth::routes();
// Ajax route to toggle user status
Route::post("/toggleUserStatus", [App\Http\Controllers\AjaxController::class, 'toggleUserStatus'])->name('toggleUserStatus');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('Users');
Route::get('/add-tour', [App\Http\Controllers\HomeController::class, 'AddTour'])->name('AddTour');
Route::get('/edit-tour/{id}', [App\Http\Controllers\HomeController::class, 'EditTour'])->name('EditTour');
Route::post('/SaveTour', [App\Http\Controllers\HomeController::class, 'SaveTour'])->name('SaveTour');
Route::post('/update-Tour', [App\Http\Controllers\HomeController::class, 'UpdateTour'])->name('UpdateTour');
Route::get('/tours', [App\Http\Controllers\HomeController::class, 'tours'])->name('Tours');
Route::get('/user-details/{id}', [App\Http\Controllers\HomeController::class, 'userDetail'])->name('UserDetail');
Route::get('/manage-booking', [App\Http\Controllers\HomeController::class, 'ManageBooking'])->name('ManageBooking');
Route::get('/tour-inquiry-request', [App\Http\Controllers\HomeController::class, 'InquiryRequest'])->name('InquiryRequest');
Route::get('/view-transaction-history', [App\Http\Controllers\HomeController::class, 'ViewTransactionHistory'])->name('ViewTransactionHistory');
Route::get('/accept-tour-booking/{id}', [App\Http\Controllers\HomeController::class, 'AcceptTourBooking'])->name('AcceptTourBooking');
Route::get('/reject-tour-booking/{id}', [App\Http\Controllers\HomeController::class, 'RejectTourBooking'])->name('RejectTourBooking');
Route::post('/delete-tour', [App\Http\Controllers\HomeController::class, 'DeleteTour'])->name('DeleteTour');
Route::get('/manage-virtual-tour', [App\Http\Controllers\HomeController::class, 'ManageVirtualTour'])->name('ManageVirtualTour');
Route::get('/add-edit-virtual-tour', [App\Http\Controllers\HomeController::class, 'AddVirtualTour'])->name('AddVirtualTour');
Route::post('/submit-virtual-tour', [App\Http\Controllers\HomeController::class, 'SaveVirtualTour'])->name('SaveVirtualTour');
Route::post('/update-virtual-tour', [App\Http\Controllers\HomeController::class, 'UpdateVirtualTour'])->name('UpdateVirtualTour');
Route::get('/edit-virtual-tour/{id}', [App\Http\Controllers\HomeController::class, 'EditVirtualTour'])->name('EditVirtualTour');
Route::post('/delete-virtual-tour', [App\Http\Controllers\HomeController::class, 'DeleteVirtualTour'])->name('DeleteVirtualTour');

Route::get('/manage-photo-booth', [App\Http\Controllers\HomeController::class, 'ManagePhotoBooth'])->name('ManagePhotoBooth');
Route::get('/add-photo-booth', [App\Http\Controllers\HomeController::class, 'AddPhoto'])->name('AddPhoto');
Route::get('/edit-photo-booth/{id}', [App\Http\Controllers\HomeController::class, 'EditPhotoBooth'])->name('EditPhotoBooth');
Route::post('/delete-photo-booth', [App\Http\Controllers\HomeController::class, 'DeletePhotoBooth'])->name('DeletePhotoBooth');
Route::post('/submit-photo-booth', [App\Http\Controllers\HomeController::class, 'SavePhotoBooth'])->name('SavePhotoBooth');
Route::post('/update-photo-booth', [App\Http\Controllers\HomeController::class, 'UpdatePhotoBooth'])->name('UpdatePhotoBooth');



Route::get('taxi-booking-request', [App\Http\Controllers\HomeController::class, 'TaxiBookingRequest'])->name('TaxiBookingRequest');
Route::get('/virtual-transaction-history', [App\Http\Controllers\HomeController::class, 'VirtualTransactionHistory'])->name('VirtualTransactionHistory');
Route::get('/photo-transaction-history', [App\Http\Controllers\HomeController::class, 'PhotoTransactionHistory'])->name('PhotoTransactionHistory');
Route::get('/load-sectors', [App\Http\Controllers\HomeController::class,'loadSectors'])->name('load-sectors');
Route::get('/profile', [App\Http\Controllers\HomeController::class,'profile'])->name('Profile');
Route::post('/update-password', [App\Http\Controllers\HomeController::class,'UpdatePassword'])->name('UpdatePassword');
Route::post('/update-profile', [App\Http\Controllers\HomeController::class,'UpdateProfile'])->name('UpdateProfile');
Route::get('/tour-detail/{id}', [App\Http\Controllers\HomeController::class,'TourDetails'])->name('TourDetails');
Route::get('/delete-booth-video-image/{id}', [App\Http\Controllers\HomeController::class,'DeletePhotoBoothImage'])->name('DeletePhotoBoothImage');
Route::get('/delete-tour-image/{id}', [App\Http\Controllers\HomeController::class,'DeleteTourImage'])->name('DeleteTourImage');
Route::get('/live_tours', [App\Http\Controllers\HomeController::class, 'live_tours'])->name('live_tours');
Route::get('/live_users', [App\Http\Controllers\HomeController::class, 'live_users'])->name('live_users');