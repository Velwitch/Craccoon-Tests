<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\Media;
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
        $evenements = Evenement::all();
        $images = Media::all();

     
        return view('evenements.gestionEvenements')
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
            'titre' => $titre,
            'slug' => $slug,
            'resume' => $resume,
            'contenu' => $contenu,
            'etat_id' => $idEtat,
            'template_id' => $idTemplate,
            'visibilite_id' => $idVisibilite,

        ]);

        $idEvenement = $evenement['id'];

        //-------------------------------------

        $cheminImg = 'images/fk';
        $titreImg = 'image';
        $positionImg = 1;
        $idTypeImg = 1;

        $cheminVid = 'http:yt';
        $titreVid = 'video';
        $positionVid = 2;
        $idTypeVid = 2;



        Media::create([
            'chemin' => $cheminImg,
            'titre' => $titreImg,
            'positionnement' => $positionImg,
            'type_media_id' => $idTypeImg,
            'evenement_id' => $idEvenement,
        ]);

        Media::create([
            'chemin' => $cheminVid,
            'titre' => $titreVid,
            'positionnement' => $positionVid,
            'type_media_id' => $idTypeVid,
            'evenement_id' => $idEvenement,
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
        $image = Media::cetteImage($id);
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

        $evenement->titre = $titre;
        $evenement->slug = $slug;
        $evenement->resume = $resume;
        $evenement->contenu = $contenu;
        $evenement->etat_id = $idEtat;
        $evenement->template_id =  $idTemplate;
        $evenement->visibilite_id = $idVisibilite;
        $evenement->save();

        // ----------------------------------

       
        $image = ['images/fkMODIF', 'image', 1, 1, $id];
        $video = ['http:ytMODIF', 'video', 2, 2, $id];

        DB::transaction(function () use ($evenement, $image, $video) {
            $evenement->media_evements()->delete();
             Media::create([
            'chemin' => $image[0],
            'titre' => $image[1],
            'positionnement' => $image[2],
            'type_media_id' => $image[3],
            'evenement_id' => $image[4],
        ]);

        Media::create([
            'chemin' =>  $video[0],
            'titre' => $video[1],
            'positionnement' => $video[2],
            'type_media_id' => $video[3],
            'evenement_id' => $video[4],
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


    return redirect()->route('evenements.index');
    }
}
