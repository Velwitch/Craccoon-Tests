<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Type_media;
use App\Models\Evenement;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media_evenement>
 */
class Media_evenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'chemin_media_evenement'=> fake()->title(),
            'titre_media_evenement'=> fake()->title(),
            'position_media_evenement'=> fake()->numberBetween($min = 0, $max = 3),
            'id_type_media'=> Type_media::all()->random()->id_type_media,
            'id_evenement'=> Evenement::all()->random()->id_evenement,
        ];
    }
}
