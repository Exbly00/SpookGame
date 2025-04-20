<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = DB::table('stories')->insertGetId([
            "title" => "Whispering Hallow",
            "description" => "Tu fais partie d'un trio d'amis passionnés de lieux hantés. Après avoir téléchargé l'appli Spook Finder, vous fixez une date pour visiter Whispering Hallow, un manoir réputé maudit. Mais dès que vous entrez… la porte se referme brutalement derrière vous. Vous êtes piégés.
Votre mission : explorer chaque pièce de la maison, résoudre ses mystères, survivre, et trouver un moyen de sortir avant qu'il ne soit trop tard."
        ]);

        DB::table('chapters')->insert([
            [
                "title" => "L'extérieur",
                "number" => 1,
                "text" => "Tu fais partie d'un trio de passionnés de paranormal. Avec tes amis Eliott et Lena, vous avez téléchargé l'application Spook Finder... La porte s'ouvre lentement toute seule dans un gémissement sinistre. Vous êtes maintenant piégés.",
                "image" => "story_1_chapter_1_outside.jpg",
                "story_id" => $id,
            ],
            [
                "title" => "Hall d'entrée",
                "number" => 2,
                "text" => "Le hall est gigantesque. La porte a disparu. Un bruit de pas se fait entendre à l'étage supérieur.",
                "image" => "story_1_chapter_2_kitchen.jpg",
                "story_id" => $id,
            ],
            [
                "title" => "Serre de jardin",
                "number" => 3,
                "text" => "Une serre envahie de brouillard. Les plantes sont mortes, mais certaines semblent bouger. Une clé verte est suspendue.",
                "image" => "story_1_chapter_3_library.jpg",
                "story_id" => $id
            ]
        ]);

        DB::table('choices')->insert([
            [
                "text" => "Entrer d'un pas assuré.",
                "chapter_id" => 1,
            ],
            [
                "text" => "Faire le tour de la maison.",
                "chapter_id" => 1,
            ],
            [
                "text" => "Filmer une intro pour les réseaux.",
                "chapter_id" => 1,
            ],
            [
                "text" => "Hésiter mais suivre les autres.",
                "chapter_id" => 1,
            ],
            [
                "text" => "Prendre la porte de gauche vers la cuisine.",
                "chapter_id" => 2,
            ],
            [
                "text" => "Prendre la porte centrale vers le salon.",
                "chapter_id" => 2,
            ],
            [
                "text" => "Prendre la porte de droite vers la bibliothèque.",
                "chapter_id" => 2,
            ],
            [
                "text" => "Explorer l'étage (les bruits).",
                "chapter_id" => 2,
            ],
            [
                "text" => "Prendre la clé.",
                "chapter_id" => 3,
            ],
            [
                "text" => "Rester et fouiller plus.",
                "chapter_id" => 3,
            ],
            [
                "text" => "Revenir par le jardin.",
                "chapter_id" => 3,
            ],
            [
                "text" => "Briser une vitre pour sortir.",
                "chapter_id" => 3,
            ],
        ]);

        Storage::disk('public')->put("images/story_1_chapter_1.jpg", file_get_contents(__DIR__ . "\images\story_1_chapter_1_outside.jpg"));
        Storage::disk('public')->put("images/story_1_chapter_2.jpg", file_get_contents(__DIR__ . "\images\story_1_chapter_2_kitchen.jpg"));
        Storage::disk('public')->put("images/story_1_chapter_3.jpg", file_get_contents(__DIR__ . "\images\story_1_chapter_3_library.jpg"));
    }
}
