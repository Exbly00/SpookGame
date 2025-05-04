<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStoryChapterRequest;
use App\Http\Requests\UpdateStoryChapterRequest;
use App\Models\Chapter;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class StoryChapterController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('auth', ['except' => ['index', 'show']]),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Story $story)
    {
        return response()->json($story->chapters()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoryChapterRequest $request, Story $story)
    {
        $validated = $request->validated();

        $file =  Storage::disk('public')->putFile('images', $validated['image']);

        $chapter = $story->chapters()->create([
            'title' => $validated['title'],
            'number' => $validated['number'],
            'image' => $file
        ]);

        return response()->json($chapter);
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story, Chapter $chapter)
    {
        return response()->json($chapter->load('choices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoryChapterRequest $request, Chapter $chapter)
    {
        $validated = $request->validated();

        $chapter->update([
            'title' => $validated['title'],
            'number' => $validated['number'],
        ]);

        return response()->json($chapter);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
    }
}
