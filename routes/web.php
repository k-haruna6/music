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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Admin\ArtistController;
Route::controller(ArtistController::class)->prefix('artist')->group(function() {
    Route::get('/', 'index')->name('artist.index');
    Route::get('create', 'add')->name('artist.add');
    Route::post('create', 'create')->name('artist.create');
    Route::get('edit', 'edit')->name('artist.edit');
    Route::post('edit', 'update')->name('artist.update');
    Route::post('delete', 'delete')->name('artist.delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
