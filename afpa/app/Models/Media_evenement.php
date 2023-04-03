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
		'id_evenement',
		
	];

    public static function lesImages(){
		$images = Media_evenement::select('*')
		->join('type_medias', 'media_evenements.id_type_media', '=', 'type_medias.id_type_media' )
		->get();

		return $images;
	}
    public static function cetteImage($id){
		$image = Media_evenement::select('*')
		->join('type_medias', 'media_evenements.id_type_media', '=', 'type_medias.id_type_media' )
		->join('evenement_media_evenement', 'media_evenements.id_media', '=', 'evenement_media_evenement.id_media' )
		->where('evenement_media_evenement.id_evenement', $id)
		->get();

		return $image;
	}
  

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }

    public function type_media()
	{
		return $this->belongsTo(Type_media::class);
	}
}
