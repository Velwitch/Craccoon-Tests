<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'evenements';

    protected $primaryKey = 'id';

    protected $fillable = [
        'titre',
        'slug',
        'resume',
        'contenu',
        'etat_id',
        'template_id',
        'visibilite_id',
    ];


    public static function lesEvenements(){
        $evenements = Evenement::select('*')
        ->join('templates', 'evenements.template_id', '=', 'templates.id')
        ->join('visibilites', 'evenements.visibilite_id', '=', 'visibilites.id')
        ->join('etats', 'evenements.etat_id', '=', 'etats.id')
        ->get();

        return $evenements;
    }

    public static function cetEvenement($id){
        $evenement = Evenement::select('*')
        ->join('templates', 'evenements.template_id', '=', 'templates.id')
        ->join('visibilites', 'evenements.visibilite_id', '=', 'visibilites.id')
        ->join('etats', 'evenements.etat_id', '=', 'etats.id')
        ->where('evenements.id', $id)
        ->get();

        return $evenement;
    }





    public function visibilite()
    {
        return $this->belongsTo(Visiblite::class);
    }
    public function etat()
    {
        return $this->belongsTo(Etat::class);
    }
    public function template()
    {
        return $this->belongsTo(Template::class);
    }
    public function media_evements()
	{
		return $this->hasMany(Media::class, 'evenement_id');
	}
}
