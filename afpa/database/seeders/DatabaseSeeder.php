<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Visibilite;
use App\Models\Etat;
use App\Models\Template;
use App\Models\Media;
use App\Models\Evenement;
use App\Models\Type_media;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $visibilites = ['confidentiel', 'privé', 'public'];
        $etats = ['en cours', 'publié', 'archivé'];
        $typesMedia=['video', 'image'];
        
        foreach ($visibilites as $visibilite) {
            Visibilite::factory()->create([
                'nom' => $visibilite,
            ]);
        }
        foreach ($etats as $etat) {
            Etat::factory()->create([
                'nom' => $etat,
            ]);
        }
        foreach ($typesMedia as $typeMedia) {
            Type_Media::factory()->create([
                'nom' => $typeMedia,
            ]);
        }
        /* Visibilite::factory(3)->create(); */
        /* Etat::factory(3)->create(); */
        /*  Type_Media::factory(2)->create(); */
        Template::factory(4)->create();
        Evenement::factory(10)->create();
        Media::factory(10)->create();

        
    }
}
