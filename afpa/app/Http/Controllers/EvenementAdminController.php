<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\Media_evenement;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EvenementAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evenements = Evenement::lesEvenements();
        $images = Media_evenement::lesMedias();
        $all = [$evenements, $images];
        return view('indexGestionArticle')
        ->with('images', $images)
        ->with('evenements', $evenements);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view(formulaireCreation)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $titre = 'Tarataa mon boul';
        $slug = Str::slug($titre);
        $resume = 'test du resumé tatarrzeze . /> ';
        $contenu = 'djsfnjsdjnjndsfsjdcnjsbdjbvsb   shdsdhiufhiusd dsfds ;:dsdzuçà"éè"';
        $idEtat = 1;
        $idTemplate = 1;
        $idVisibilite = 1;

        // --------------------------------------------------

        $evenement = Evenement::create([
            'titre_evenement' => $titre,
            'slug_evenement' => $slug,
            'resume_evenement' => $resume,
            'contenu_evenement' => $contenu,
            'id_etat' => $idEtat,
            'id_template' => $idTemplate,
            'id_visibilite' => $idVisibilite,

        ]);

        $idEvenement = $evenement['id_evenement'];

        //-------------------------------------

        $cheminImg = 'images/fk';
        $titreImg = 'image';
        $positionImg = 1;
        $idTypeImg = 1;

        $cheminVid = 'http:yt';
        $titreVid = 'video';
        $positionVid = 2;
        $idTypeVid = 2;



        Media_evenement::create([
            'chemin_media_evenement' => $cheminImg,
            'titre_media_evenement' => $titreImg,
            'position_media_evenement' => $positionImg,
            'id_type_media' => $idTypeImg,
            'id_evenement' => $idEvenement,
        ]);

        Media_evenement::create([
            'chemin_media_evenement' => $cheminVid,
            'titre_media_evenement' => $titreVid,
            'position_media_evenement' => $positionVid,
            'id_type_media' => $idTypeVid,
            'id_evenement' => $idEvenement,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evenements = Evenement::cetEvenement($id);
        $image = Media_evenement::cetteImage($id);
        $all = [$evenements, $image];
        return ($all);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $titre = 'Tarataa mon boul modif';
        $slug = Str::slug($titre);
        $resume = 'test du resumé tatarrzeze . /> modif';
        $contenu = 'djsfnjsdjnjndsfsjdcnjsbdjbvsb   shdsdhiufhiusd dsfds ;:dsdzuçà"éè modif"';
        $idEtat = 1;
        $idTemplate = 1;
        $idVisibilite = 1;


        $evenement = Evenement::find($id);

        $evenement->titre_evenement = $titre;
        $evenement->slug_evenement = $slug;
        $evenement->resume_evenement = $resume;
        $evenement->contenu_evenement = $contenu;
        $evenement->id_etat = $idEtat;
        $evenement->id_template =  $idTemplate;
        $evenement->id_visibilite = $idVisibilite;
        $evenement->save();

        // ----------------------------------

       
        $image = ['images/fkMODIF', 'image', 1, 1, $id];
        $video = ['http:ytMODIF', 'video', 2, 2, $id];

        DB::transaction(function () use ($evenement, $image, $video) {
            $evenement->media_evements()->delete();
             Media_evenement::create([
            'chemin_media_evenement' => $image[0],
            'titre_media_evenement' => $image[1],
            'position_media_evenement' => $image[2],
            'id_type_media' => $image[3],
            'id_evenement' => $image[4],
        ]);

        Media_evenement::create([
            'chemin_media_evenement' =>  $video[0],
            'titre_media_evenement' => $video[1],
            'position_media_evenement' => $video[2],
            'id_type_media' => $video[3],
            'id_evenement' => $video[4],
        ]);
       
        });


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
    
    $evenement = Evenement::find($id) ;
    $evenement->media_evements()->delete();   
    $evenement->delete();


        //
    }
}
