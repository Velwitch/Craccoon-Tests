<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media_evenement extends Model
{
    use HasFactory;

    protected $table = 'media_evenements';

    protected $primaryKey = 'id_media';

    protected $fillable = [
		'chemin_media_evenement',
		'titre_media_evenement',
		'position_media_evenement',
		'id_type_media',
		
	];

    
  

    public function evenements()
	{
		return $this->belongsToMany(Evenement::class, 'evenement_media_evenement', 'id_media', 'id_evenement');
	}
    public function type_media()
	{
		return $this->belongsTo(Type_media::class);
	}
}
