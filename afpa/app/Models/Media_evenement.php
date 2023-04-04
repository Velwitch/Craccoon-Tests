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
		->where('media_evenements.id_evenement', '=', $id)
		->where('media_evenements.id_type_media','=', 2)
		->get();

		return $image;
	}

    public static function cetteVideo($id){
		$video = Media_evenement::select('*')
		->join('type_medias', 'media_evenements.id_type_media', '=', 'type_medias.id_type_media' )		
		->where('media_evenements.id_evenement', '=', $id)
		->where('media_evenements.id_type_media','=', 1)
		->get();

		return $video;
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
