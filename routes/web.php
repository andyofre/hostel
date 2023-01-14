<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PortalFeeController;
use App\Models\User;

// use App\Http\Controllers\HostelController

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');})->name('dashboard');

    Route::get('/dashboard', [UserController::class, 'index'])->name('student.dashboard');

    Route::get('/profile/image', [UserController::class, 'profileImage'])->name('update.profile');

    Route::post('profile/update', [UserController::class, 'profilePost'])->name('profile.post');

    Route::get('/book/hostel', [UserController::class, 'book'])->name('book.hostel');

    Route::get('/student/hostel', [HostelController::class, 'listHostelRoom'])->name('listHostelRoom');

    // Route::post('/pay/portal', [PortalFeeController::class, 'redirectToGateway'])->name('pay');

    Route::post('/pay', [PortalFeeController::class, 'pay'])->name('paying');
    Route::get('/webhook', [PortalFeeController::class, 'webhook'])->name('hooks');

 

    Route::get('/portal/callback', [PortalFeeController::class, 'handleCallBack']);

    // Route::get()


});



Route::middleware(['admin:admin'])->group(function(){
        Route::get('admin/login', [AdminController::class, 'loginForm']);
        Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');


});


Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/admin/dashboard', function () {

        $student = User::count();

                return view('backend.admin.index', compact('student'));})->name('admin.dashboard');

        //  Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
        //     Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        // });


});


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){


    Route::get('/hostel', [HostelController::class, 'index'])->name('hostelView');
    Route::get('/hostel/create', [HostelController::class, 'create'])->name('hostelCreate');
    Route::post('/hostel/store', [HostelController::class, 'store'])->name('hostel.store');
    Route::get('/hostel/edit/{id}', [HostelController::class, 'edit'])->name('hostelEdit');
    Route::post('/hostel/update/{id}', [HostelController::class, 'update'])->name('hostel.update');
    Route::delete('/hostel/delete/{id}', [HostelController::class, 'destroy'])->name('hostel.delete');


    Route::get('/room', [RoomController::class, 'index'])->name('roomView');
    Route::get('/room/create', [RoomController::class, 'create'])->name('roomCreate');
    Route::post('/room/store', [RoomController::class, 'store'])->name('room.store');
    Route::get('/room/edit/{id}', [RoomController::class, 'edit'])->name('roomEdit');
    Route::post('/room/update/{id}', [RoomController::class, 'update'])->name('room.update');
    Route::delete('/room/delete/{id}', [RoomController::class, 'destroy'])->name('room.delete');

});


// Preregistration
Route::get('/verification', [FrontendController::class, 'index'])->name('verify.student');

Route::post('verify/fees', [FrontendController::class, 'checkSchoolFeeStatus'])->name('fee.status');

Route::get('/registration/start', [FrontendController::class, 'registrationForm'])->name('register.student');

Route::post('/registration/post', [UserController::class, 'store'])->name('store.register_student');

// Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('admin/registration', [AdminController::class, 'registration'])->name('registrationView');
