<?php

use App\Models\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/profiles/{user}', function (User $user) {
    return view('profile', compact('user'));
})->name('profiles.show');

Route::get('/qrcodes/{user}', function (User $user) {
    return Response::download(public_path('qrcodes/' . $user->qrcode), Str::random(15) . '.png');
})->name('qrcodes.download');

require __DIR__.'/auth.php';
