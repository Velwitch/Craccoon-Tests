<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Visibilite;
use App\Models\Etat;
use App\Models\Template;
use App\Models\Media_evenement;
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

        Visibilite::factory(3)->create();
        Etat::factory(3)->create();
        Template::factory(4)->create();
        Type_Media::factory(2)->create();
        Evenement::factory(10)->create();
        Media_evenement::factory(10)->create();

        $evenements = Evenement::all();
        $mediaEvenements = Media_evenement::all();
        
        foreach($evenements as $evenement){
            $randomMedias = $mediaEvenements->random(mt_rand(1, 4));
            foreach($randomMedias as $randomMedia){
                $evenement->media_evenements()->attach($randomMedia);
            }
        }
       
        
    }
}
