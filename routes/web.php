<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ActivitesController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomBooking;
use App\Models\RoomNumber;

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

Route::get('/add/{name}', function ($param) {
    return view('form.admin_add', ['name'=>$param]);
})->name('add');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/place/{place:tourist_spot}/', [PlaceController::class, 'index'])->name('place');
Route::post('/place/add', [PlaceController::class, 'store'])->name('place.add');

Route::get('/activity/{activity:name}/', [ActivitesController::class, 'index'])->name('activity');

Route::get('/package/{package:name}/', [PackageController::class, 'index'])->name('package');

Route::get('/article', [ArticleController::class, 'index'])->name('article');
Route::post('/article', [ArticleController::class, 'store']);
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.add');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [RegisterController::class, 'login_index'])->name('login');
Route::post('/login', [RegisterController::class, 'login_store']);
Route::post('/logout', [RegisterController::class, 'logout_user'])->name('logout');

Route::get('/hotel/add', [HotelController::class, 'index'])->name('hotel');
Route::post('/hotel/add', [HotelController::class, 'store']);

Route::get('/hotel/list', [HotelController::class, 'list_hotel'])->name('hotel.list');
Route::get('/hotel/room/{hotel}', [HotelController::class, 'hotel_room'])->name('hotel.room');
Route::post('/hotel/room/{hotel}', [HotelController::class, 'hotel_room_byname']);

Route::get('/hotel/create/room', [HotelController::class, 'hotel_room_add_form'])->name('hotel.room.create');
Route::post('/hotel/create/room', [HotelController::class, 'hotel_room_add']);

Route::get('/hotel/update/room/{hotel}', [HotelController::class, 'hotel_room_add_form'])->name('hotel.room.update');
Route::get('/hotel/details/room/{room}', [HotelController::class, 'room_details'])->name('hotel.room.details');

Route::get('/hotel/booking', [RoomBooking::class, 'index'])->name('hotel.booking');
Route::post('/hotel/booking', [RoomBooking::class, 'store']);
Route::delete('room/{room}/delete', [RoomBooking::class, 'destroy_room_number'])->name('room.delete');

Route::post('hotel/book/{room}', [RoomBooking::class, 'book_hotel'])->name('guest.book');
Route::get('hotel/book/{room}', [RoomBooking::class, 'book_hotel'])->name('guest.book');

Route::post('/hotel/search', [RoomBooking::class, 'search_hotel'])->name('hotel.search');

//Route::get('/hotel/confirm/{room}', [RoomBooking::class, 'place_order'])->name('confirm.book');
Route::post('/hotel/confirm/{room}', [RoomBooking::class, 'place_order'])->name('confirm.book');

Route::get('/hotel/room/guest/look/{room_number}', [RoomBooking::class, 'customer_list'])->name('customer.room');
Route::post('/hotel/room/guest/add/', [RoomBooking::class, 'room_provide_byadmin'])->name('customer.room.add');
Route::post('/hotel/room/guest/remove/{room_number}', [RoomBooking::class, 'removeGuest'])->name('customer.room.remove');




