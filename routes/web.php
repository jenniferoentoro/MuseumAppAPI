<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MuseumController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/login', function() {
//     return "aaa"
// });


Route::post('/login-admin', [AuthController::class, 'loginAdmin'])->name('post-login-admin');

Route::post('/logout-admin', [AuthController::class, 'logoutAdmin'])->middleware('auth:web')->name('post-logout-admin');

Route::get('/login', function() {
    $data = ['error' => 'Unauthorized'];
    return response()->json(['error' => 'Unauthorized'], 401);
    // return view('login', $data);
})->name('login-unauthorized');

Route::get('/login-admin', function() {
    if (Auth::guard('web')->check()) {
        return redirect()->route('museum-page');
    }
    return view('login');
})->name('login-admin');

// Route::get('/login', function() {
//     if (session('usertoken') != null) {
//         return view('welcome');
//     }
//     $data = ['error' => 'Unauthorized'];

//     return view('login', $data);
// })->name('login');

Route::get('/', [MuseumController::class, 'museumAdminView'])->name('museum-page');

Route::get('/add-museum', function() {
    return view('add-museum');
})->name('get-add-museum');

Route::post('/add-museum', [MuseumController::class, 'addMuseum'])->middleware('auth:web')->name('post-add-museum');