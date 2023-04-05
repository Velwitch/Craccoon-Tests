<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Type_media;
use App\Models\Evenement;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media_evenement>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'chemin'=> fake()->title(),
            'titre'=> fake()->title(),
            'positionnement'=> fake()->numberBetween($min = 0, $max = 3),
            'type_media_id'=> Type_media::all()->random()->id,
            'evenement_id'=> Evenement::all()->random()->id,
        ];
    }
}
