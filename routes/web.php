<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChapterChoiceController;
use App\Http\Controllers\StoryChapterController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

//Route de la page d'accueil
Route::get('/', function () {
    return view('test');
})->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//Route accessible que si l'utilisateur est connecté
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Groupe d'API versionnée
Route::prefix('api/v1/')->group(function () {
    Route::get('/test', function () {
        return response()->json(['message' => 'Hello, World from api!']);
    });
    Route::delete('/test', function () {
        return response()->json(['message' => 'Deleting']);
    });

    Route::resource('stories', StoryController::class);
    Route::resource('stories.chapters', StoryChapterController::class);
    Route::resource('chapters.choices', ChapterChoiceController::class);
});


require __DIR__ . '/auth.php';
