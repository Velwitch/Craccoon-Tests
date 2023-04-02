<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $table = 'evenements';

    protected $primaryKey = 'id_evenement';

    protected $fillable = [
        'titre_evenements',
        'slug_evenements',
        'resume_evenements',
        'contenu_evenements',
        'id_etat',
        'id_template',
        'id_visibilite',
    ];



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
    public function media_evenements()
    {
        return $this->belongsToMany(Media_evenement::class, 'evenement_media_evenement', 'id_evenement', 'id_media');
    }
}
