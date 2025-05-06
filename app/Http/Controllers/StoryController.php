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
    //Seulement les utilisateurs authentifiés peuvent accéder aux actions de ce controller

    public static function middleware(): array
    {
        return [
            new Middleware('auth', ['except' => ['index', 'show']]),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->user()) {
            $stories = Story::all()->with('firstChapter');
        } else {
            $stories = Story::where('is_visible', true)->with("firstChapter")->get();
        }

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
            'is_visible' => $validated['is_visible'],
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
