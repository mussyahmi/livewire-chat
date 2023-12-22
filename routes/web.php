<?php

use App\Livewire\Chat\Chat;
use App\Livewire\Chat\Index;
use App\Livewire\Users;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function (){
    Route::get('chat', Index::class)->name('chat.index');
    Route::get('chat/{query}', Chat::class)->name('chat');

    Route::get('users', Users::class)->name('users');
});