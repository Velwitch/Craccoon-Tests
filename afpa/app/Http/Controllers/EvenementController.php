<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\Media_evenement;
use Illuminate\Support\Str;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evenements = Evenement::lesEvenements();
        $images = Media_evenement::lesImages();
        $all =[$evenements,$images];
        return ( $all);
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

        $cheminMedias = ['https://youtu.be/2Z-trfG1Q58', 'images/fk'];
        $titreMedias = ['video yt', 'image'];
        $positions = [1,2];
        $idTypes = [1,2];

        $evenement = Evenement::create([
            'titre_evenement' => $titre,
            'slug_evenement' => $slug,
            'resume_evenement' => $resume,
            'contenu_evenement' => $contenu,
            'id_etat' => $idEtat,
            'id_template' => $idTemplate,
            'id_visibilite' => $idVisibilite,
           
        ]);

        $idEvenement= $evenement['id_evenement'];

 
        

        foreach ($cheminMedias as $index => $cheminMedia) {
            Media_evenement::create([
                'chemin_media_evenement' => $cheminMedia,
                'titre_media_evenement' => $titreMedias[$index],
                'position_media_evenement' => $positions[$index],
                'id_type_media' => $idTypes[$index],
                'id_evenement' => $idEvenement,
            ]);

    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evenements = Evenement::cetEvenement($id);
        $image = Media_evenement::cetteImage($id);
        $all = [$evenements, $image];
        return ($all);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
