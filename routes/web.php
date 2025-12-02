<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\MoziController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\AdminController;

Route::get('/', function(){ return view('welcome'); })->name('home');




Route::resource('films', FilmController::class);


Route::get('mozis', [MoziController::class, 'index'])->name('mozis.index');
Route::get('mozis/{mozi}', [MoziController::class, 'show'])->name('mozis.show');


Route::get('contact', [MessageController::class, 'create'])->name('contact.create');
Route::post('contact', [MessageController::class, 'store'])->name('contact.store');


Route::middleware('auth')->group(function(){
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
});


Route::get('charts/films-by-mozi', [ChartController::class, 'filmsByMozi'])->name('charts.films_by_mozi');


Route::middleware(['auth','admin'])->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class,'index'])->name('admin.index');
});

Route::get('/', function () {
    return view('home');
})->name('home');

