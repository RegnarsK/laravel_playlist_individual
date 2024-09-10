<?php
use App\Http\Controllers\SongController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('playlist', PlaylistController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('songs', SongController::class);
    Route::get('songs/create', [SongController::class, 'create'])->name('songs.create');
    Route::post('songs', [SongController::class, 'store'])->name('songs.store');
    Route::get('songs/{id}/edit', [SongController::class, 'edit'])->name('songs.edit');
    Route::put('songs/{id}', [SongController::class, 'update'])->name('songs.update');

});

require __DIR__.'/auth.php';
