<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ChapterChoiceController extends Controller implements HasMiddleware

{
    //Seulement les utilisateurs authentifiés peuvent accéder aux actions de ce controller
    public static function middleware(): array
    {
        return [
            new Middleware('auth', ['except' => ['index', 'show']]),
        ];
    }

    /**
     * Affiche la liste des choix disponibles pour un chapitre spécifique.
     */
    public function index(Chapter $chapter)
    {
        return response()->json($chapter->choices()->get());
    }

    /**
     * Enregistre un nouveau choix dans la base de données.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Affiche les détails d'un choix spécifique.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Met à jour un choix existant dans la base de données.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Supprime un choix de la base de données.
     */
    public function destroy(string $id)
    {
        //
    }
}
