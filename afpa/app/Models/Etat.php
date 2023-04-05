<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    use HasFactory;

    protected $table = 'etats';

    protected $fillable = [
		'nom',

	];

    

    public function evenements()
	{
		return $this->hasMany(Evenement::class);
	}
}
