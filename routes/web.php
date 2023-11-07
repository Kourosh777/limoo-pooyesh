<?php

use App\Http\Controllers\ProfileController;
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
    return redirect()->route('register');
//    return view('welcome');
});
Route::get('/register/confirm',[\App\Http\Controllers\Auth\RegisteredUserController::class,'registerConfirm'])->name('register.confirm');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('get-child-shahrestans',[\App\Http\Controllers\HomeController::class,'getChildShahrestans']);


Route::middleware(['auth','can:is_admin'])->group(function (){

Route::get('admin',function (){
   return view('admin.index');
});
Route::get('admin/user/index',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('admin.user.index');
});
require __DIR__.'/auth.php';
