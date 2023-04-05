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
            'titre'=> fake()->title(),
            'slug'=> fake()->title(),
            'resume'=> fake()->paragraph(),
            'contenu'=> fake()->paragraph(),
            'etat_id'=> Etat::all()->random()->id,
            'template_id'=> Template::all()->random()->id,
            'visibilite_id'=> Visibilite::all()->random()->id,
        ];
    }
}
