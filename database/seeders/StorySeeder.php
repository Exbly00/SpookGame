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
                "title" => "Extérieur",
                "number" => 1,
                "text" => "Tu fais partie d'un trio de passionnés de paranormal. Avec tes amis Eliott et Lena, vous avez téléchargé l'application Spook Finder, qui promet de localiser les maisons hantées les plus intenses. Après des semaines de planification, vous vous retrouvez enfin devant Whispering Hallow, une bâtisse abandonnée au passé trouble.
                Eliott, smartphone en main, déclare en souriant :
                « Spook Finder dit que c'est niveau 5... y'a pas plus haut. C'est parfait pour notre vidéo ! »
                Lena, plus prudente, regarde les fenêtres noires de la maison :
                « T'es sûr qu'on doit faire ça ? Elle me met mal à l'aise...»
                Alors que tu approches la porte, elle s'ouvre lentement toute seule dans un gémissement sinistre. Un vent froid souffle derrière vous, et le portail se referme automatiquement. Vous êtes maintenant piégés.",
                "image" => "story_1_chapter_1.jpg",
                "story_id" => $id,
            ],
            [
                "title" => "Hall d'entrée",
                "number" => 2,
                "text" => "Le hall est gigantesque, recouvert de tapisseries poussiéreuses et d'un lustre éteint qui tangue lentement. L'air est glacial. Derriere vous, la porte d'entrée a disparu. Littéralement. Juste un mur.
                Lena : « Attendez... où est passée la porte ?! »
                Eliott se met à frapper le mur. « C'est pas possible ! Elle était là, je l'ai vue ! »
                Un bruit de pas se fait entendre à l'étage supérieur. Lent, traînant, régulier.
                Trois portes sont visibles au rez-de-chaussée.",
                "image" => "story_1_chapter_2.jpg",
                "story_id" => $id,
            ],
            [
                "title" => "Serre de jardin",
                "number" => 3,
                "text" => "Vous contournez la maison en passant par le jardin à l'abandon. Une serre envahie de brouillard se tient au bout d'un chemin de pierres désordonnées.
                En y entrant, vous entendez des chuchotements à peine audibles. Les plantes sont mortes, mais certaines semblent se pencher légèrement quand vous passez. Un outil rouillé repose sur une table de rempotage. Il y a aussi une petite clé verte sur un crochet.
                Eliott : « J'aime pas ça... Les plantes bougent toutes seules ou je deviens fou ? »",
                "image" => "story_1_chapter_3.jpg",
                "story_id" => $id
            ],
            [
                "title" => "Cuisine",
                "number" => 4,
                "text" => "La cuisine est figée dans le temps, comme si quelqu'un avait quitté les lieux en plein milieu d'un repas. Une chaise est renversée, la table est dressée pour trois. Trois assiettes, trois verres. L'air est moisi, et une forte odeur de rouille flotte dans la pièce.
                Lena s'approche du frigo : « On dirait qu'il a été ouvert récemment... »
                Eliott ouvre un tiroir. Il sursaute : un couteau ensanglanté. « C'est pas une mise en scène, hein ? Dis-moi que c'est pas une blague...»
                Une porte s'ouvre lentement toute seule. Elle descend vers le **sous-sol**.",
                "image" => "story_1_chapter_4.jpg",
                "story_id" => $id
            ],
            [
                "title" => "Salon",
                "number" => 5,
                "text" => "Le salon est plongé dans une obscurité oppressante. Une vieille télévision à tube s'allume soudainement, diffusant de la neige statique. Sur un fauteuil poussiéreux repose une poupée aux yeux vitreux, qui semble vous observer.
                Une horloge à balancier se met à sonner... alors qu'il est 2h15. Vous entendez une voix d'enfant, très près de vous :
                « Tu veux jouer avec moi ? »
                La voix vient du haut de l'escalier menant à l'étage.",
                "image" => "story_1_chapter_5.jpg",
                "story_id" => $id
            ],
            [
                "title" => "Bibliothèque ",
                "number" => 6,
                "text" => "Des rayonnages de livres poussiéreux montent jusqu'au plafond. Un vieux globe terrestre tourne lentement sur lui-même, sans raison apparente. Au centre de la pièce, une table en bois massif est recouverte de documents, cartes et dessins.
                Lena chuchote : « Ces livres parlent tous de nécromancie... et regarde ce symbole, on l'a vu sur la clé de la serre.»
                Eliott trouve un carnet de bord daté de 1922 :« La maison est un prisme... elle reflète ce qu'on fuit.»
                Une échelle permet d'accéder à une mezzanine. Quelque chose bouge rapidement en haut.",
                "image" => "story_1_chapter_6.jpg",
                "story_id" => $id
            ],
            [
                "title" => "Chambre à coucher",
                "number" => 7,
                "text" => "Un lit à baldaquin trône au milieu de la pièce, couvert de draps déchirés. Un miroir fendillé reflète les silhouettes de vos amis... mais pas la tienne.
                Eliott : « Mec... pourquoi on te voit pas dans le miroir ? »
                Sur la coiffeuse, une lettre à demi brûlée : «Si tu lis ça, il est déjà trop tard. La maison t'a vu.»",
                "image" => "story_1_chapter_7.jpg",
                "story_id" => $id
            ],
            [
                "title" => "Chambre d'enfant",
                "number" => 8,
                "text" => "Des jouets sont disposés en cercle autour d'un ours en peluche très usé. Sur le mur, un dessin à la craie montre trois enfants... et un quatrième visage flou. Une boîte à musique joue une mélodie déformée.
                Lena tremble : « Ce dessin... il bouge, non ?! »",
                "image" => "story_1_chapter_8.jpg",
                "story_id" => $id
            ],
            [
                "title" => "Cave",
                "number" => 9,
                "text" => "L'humidité est écrasante. Des rituels sont gravés sur les murs. Une forme humaine semble figée dans un recoin sombre... elle respire.
                Eliott recule : « Y'a quelqu'un là. Je te jure qu'il nous regarde...»
                Un grimoire repose sur un piédestal, relié par des chaînes.",
                "image" => "story_1_chapter_9.jpg",
                "story_id" => $id
            ],
            [
                "title" => "Salle de bain",
                "number" => 10,
                "text" => "La lumière vacille, révélant une baignoire remplie d'eau noirâtre. Un miroir fissuré montre une silhouette derrière vous… mais quand vous vous retournez, il n'y a rien. Des gouttes rouges tombent lentement du plafond, sans source visible.
                Lena murmure : « On ne devrait pas rester ici... »
                Une trappe d'accès est entrouverte sous le lavabo. Vous sentez un courant d'air.",
                "image" => "story_1_chapter_10.jpg",
                "story_id" => $id
            ],
            [
                "title" => "Grenier",
                "number" => 11,
                "text" => "Un grenier poussiéreux et bas de plafond. L'odeur de renfermé est insupportable. Des coffres sont empilés dans un coin. Une voix étouffée vous appelle : « Venez... on peut sortir... »
                Dans un vieux coffre, vous trouvez une corde, une boîte d'allumettes, et... une cassette audio.",
                "image" => "story_1_chapter_11.jpg",
                "story_id" => $id
            ],
            [
                "title" => "Rituel",
                "number" => 12,
                "text" => "Tous les indices mènent ici. Dans le salon, les meubles ont été déplacés en cercle. Le grimoire s'ouvre tout seul, les pages tournent. Un chant grave résonne.
                «Le prix du passage est le souvenir oublié. Une seule âme doit se sacrifier.»
                Eliott et Lena vous regardent, terrorisés. Le choix doit être fait.",
                "image" => "story_1_chapter_12.jpg",
                "story_id" => $id
            ],
            [
                "title" => "Garage",
                "number" => 13,
                "text" => "Un vieux véhicule repose sous une bâche. Des outils jonchent le sol. La porte de garage est verrouillée par un mécanisme ancien... qui s'ouvre avec la clé verte.
                En actionnant le levier, la lumière du matin filtre enfin. Vous avez trouvé la sortie… mais à quel prix ?",
                "image" => "story_1_chapter_13.jpg",
                "story_id" => $id
            ],
            [
                "title" => "Bonne fin : Le prix du souvenir",
                "number" => 14,
                "text" => "Vous sortez tous les trois, fatigués, blessés, mais vivants. Une brume s'échappe de la maison derrière vous, comme si elle expirait enfin. La photo dans ta poche est maintenant vide. Aucun visage. Tu sais que tu as donné quelque chose… mais tu ne te souviens plus quoi.
                 «On est sortis... mais je sens qu'un morceau de moi est resté là-bas.»",
                "image" => "story_1_chapter_14.jpg",
                "story_id" => $id
            ],
            [
                "title" => "Fin tragique : Un seul survivra",
                "number" => 15,
                "text" => "La lumière s'ouvre sur le garage. Tu t'échappes en courant, seul. Le portail claque derrière toi. Dans le silence du matin, tu ne sais plus si tu as été sauvé… ou simplement épargné.
                Le prix du rituel était lourd. Et tu l'as payé avec quelqu'un d'autre.",
                "image" => "story_1_chapter_15.jpg",
                "story_id" => $id
            ],
            [
                "title" => "Fin neutre : La fuite",
                "number" => 16,
                "text" => "Tu sors sans rien accomplir. Le vent souffle derrière toi, glacial. Dans le reflet du rétroviseur, la maison semble te regarder partir.
                «On a fui... mais on est encore liés. Je le sens.»",
                "image" => "story_1_chapter_16.jpg",
                "story_id" => $id
            ],
            [
                "title" => "Fin maudite : La maison vous a choisis",
                "number" => 17,
                "text" => "Tu refuses. Tu refuses de choisir, de sacrifier, de jouer à ce jeu. Et la maison te remercie… en te gardant.
                Le temps passe. Ou peut-être pas. Tu ne sais plus. Tu fais maintenant partie des murs.",
                "image" => "story_1_chapter_17.jpg",
                "story_id" => $id
            ],
            [
                "title" => "FIN",
                "number" => 18,
                "text" => "Merci d'avoir joué à Whispering Hallow. Et maintenant… qui osera y retourner ?",
                "image" => "story_1_chapter_18.jpg",
                "story_id" => $id
            ],
        ]);

        DB::table('choices')->insert([
            [
                "text" => "Entrer d'un pas assuré.",
                "next_chapter_id" => 2,
                "chapter_id" => 1,
            ],
            [
                "text" => "Faire le tour de la maison.",
                "next_chapter_id" => 3,
                "chapter_id" => 1,
            ],
            [
                "text" => "Filmer une intro pour les réseaux.",
                "next_chapter_id" => 2,
                "chapter_id" => 1,
            ],
            [
                "text" => "Hésiter mais suivre les autres.",
                "next_chapter_id" => 2,
                "chapter_id" => 1,
            ],
            [
                "text" => "Prendre la porte de gauche vers la cuisine.",
                "next_chapter_id" => 4,
                "chapter_id" => 2,
            ],
            [
                "text" => "Prendre la porte centrale vers le salon.",
                "next_chapter_id" => 5,
                "chapter_id" => 2,
            ],
            [
                "text" => "Prendre la porte de droite vers la bibliothèque.",
                "next_chapter_id" => 6,
                "chapter_id" => 2,
            ],
            [
                "text" => "Explorer l'étage (les bruits).",
                "next_chapter_id" => 8,
                "chapter_id" => 2,
            ],
            [
                "text" => "Prendre la clé.",
                "next_chapter_id" => 2,
                "chapter_id" => 3,
            ],
            [
                "text" => "Rester et fouiller plus.",
                "next_chapter_id" => 10,
                "chapter_id" => 3,
            ],
            [
                "text" => "Revenir par le jardin.",
                "next_chapter_id" => 2,
                "chapter_id" => 3,
            ],
            [
                "text" => "Briser une vitre pour sortir.",
                "next_chapter_id" => 2,
                "chapter_id" => 3,
            ],
            [
                "text" => "Descendre dans la cave.",
                "next_chapter_id" => 9,
                "chapter_id" => 4,
            ],
            [
                "text" => "Rester fouiller la cuisine.",
                "next_chapter_id" => 6,
                "chapter_id" => 4,
            ],
            [
                "text" => "Revenir au Hall.",
                "next_chapter_id" => 2,
                "chapter_id" => 4,
            ],
            [
                "text" => "Suivre un bruit provenant du couloir.",
                "next_chapter_id" => 5,
                "chapter_id" => 4,
            ],
            [
                "text" => "Suivre la voix à l'étage",
                "next_chapter_id" => 8,
                "chapter_id" => 5,
            ],
            [
                "text" => "Explorer le salon.",
                "next_chapter_id" => 6,
                "chapter_id" => 5,
            ],
            [
                "text" => "Revenir au Hall.",
                "next_chapter_id" => 2,
                "chapter_id" => 5,
            ],
            [
                "text" => "Suivre un passage dissimulé derrière une bibliothèque.",
                "next_chapter_id" => 11,
                "chapter_id" => 5,
            ],
            [
                "text" => "Monter voir sur la mezzanine.",
                "next_chapter_id" => 7,
                "chapter_id" => 6,
            ],
            [
                "text" => "Lire les pages du carnet.",
                "next_chapter_id" => 12,
                "chapter_id" => 6,
            ],
            [
                "text" => "Prendre une carte marquée : Sortie.",
                "next_chapter_id" => 13,
                "chapter_id" => 6,
            ],
            [
                "text" => "Retourner au Hall.",
                "next_chapter_id" => 2,
                "chapter_id" => 6,
            ],
            [
                "text" => "Briser le miroir.",
                "next_chapter_id" => 12,
                "chapter_id" => 7,
            ],
            [
                "text" => "Lire la lettre entière.",
                "next_chapter_id" => 9,
                "chapter_id" => 7,
            ],
            [
                "text" => "Fuir la chambre.",
                "next_chapter_id" => 8,
                "chapter_id" => 7,
            ],
            [
                "text" => "Se reposer un instant.",
                "next_chapter_id" => 7,
                "chapter_id" => 7,
            ],
            [
                "text" => "Ouvrir la boîte à musique.",
                "next_chapter_id" => 11,
                "chapter_id" => 8,
            ],
            [
                "text" => "Reprendre le dessin.",
                "next_chapter_id" => 6,
                "chapter_id" => 8,
            ],
            [
                "text" => "Inspecter l'ours.",
                "next_chapter_id" => 12,
                "chapter_id" => 8,
            ],
            [
                "text" => "Quitter rapidement l'endroit.",
                "next_chapter_id" => 2,
                "chapter_id" => 8,
            ],
            [
                "text" => "Ouvrir le grimoire.",
                "next_chapter_id" => 12,
                "chapter_id" => 9,
            ],
            [
                "text" => "Tenter de parler à la forme humaine.",
                "next_chapter_id" => 12,
                "chapter_id" => 9,
            ],
            [
                "text" => "Chercher une sortie.",
                "next_chapter_id" => 13,
                "chapter_id" => 9,
            ],
            [
                "text" => "Revenir prudemment.",
                "next_chapter_id" => 4,
                "chapter_id" => 9,
            ],
            [
                "text" => "Ouvrir la trappe.",
                "next_chapter_id" => 11,
                "chapter_id" => 10,
            ],
            [
                "text" => "Regarder de plus près dans la baignoire.",
                "next_chapter_id" => 12,
                "chapter_id" => 10,
            ],
            [
                "text" => "Briser le miroir.",
                "next_chapter_id" => 6,
                "chapter_id" => 10,
            ],
            [
                "text" => "Quitter la salle de bain",
                "next_chapter_id" => 2,
                "chapter_id" => 10,
            ],
            [
                "text" => "Écouter la cassette.",
                "next_chapter_id" => 12,
                "chapter_id" => 11,
            ],
            [
                "text" => "Utiliser la corde pour descendre dans le garage",
                "next_chapter_id" => 13,
                "chapter_id" => 11,
            ],
            [
                "text" => "Fouiller plus loin.",
                "next_chapter_id" => 9,
                "chapter_id" => 11,
            ],
            [
                "text" => "Revenir à l'étage.",
                "next_chapter_id" => 7,
                "chapter_id" => 11,
            ],
            [
                "text" => "Sacrifier un objet personnel.",
                "next_chapter_id" => 13,
                "chapter_id" => 12,
            ],
            [
                "text" => "Sacrifier un ami.",
                "next_chapter_id" => 15,
                "chapter_id" => 12,
            ],
            [
                "text" => "Tenter de rompre le rituel.",
                "next_chapter_id" => 16,
                "chapter_id" => 12,
            ],
            [
                "text" => "Refuser.",
                "next_chapter_id" => 17,
                "chapter_id" => 12,
            ],
        ]);

        foreach (glob(__DIR__ . "\images\story_1_chapter_*.jpg") as $image) {
            Storage::disk('public')->put("images/" . basename($image), file_get_contents($image));
        }
    }
}
