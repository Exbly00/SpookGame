<?php

use App\Http\Controllers\ChapterChoiceController;
use App\Http\Controllers\StoryChapterController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test');
});

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
