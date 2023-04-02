<?php

namespace Database\Factories;
use App\Models\Visibilite;
use App\Models\Etat;
use App\Models\Template;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evenement>
 */
class EvenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titre_evenement'=> fake()->title(),
            'slug_evenement'=> fake()->title(),
            'resume_evenement'=> fake()->paragraph(),
            'contenu_evenement'=> fake()->paragraph(),
            'id_etat'=> Etat::all()->random()->id_etat,
            'id_template'=> Template::all()->random()->id_template,
            'id_visibilite'=> Visibilite::all()->random()->id_visibilite,
        ];
    }
}
