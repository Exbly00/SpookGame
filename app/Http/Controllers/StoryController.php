<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStoryRequest;
use App\Http\Requests\UpdateStoryRequest;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class StoryController extends Controller implements HasMiddleware
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
    public function index()
    {
        $stories = Story::all();

        return response()->json($stories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoryRequest $request)
    {
        $validated = $request->validated();

        $story = Story::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return response()->json($story);
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        return response()->json($story);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoryRequest $request, Story $story)
    {
        $validated = $request->validated();

        $story->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return response()->json($story);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Story $story)
    {
        $story->delete();
    }
}
