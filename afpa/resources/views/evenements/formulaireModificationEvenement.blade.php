<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.ckeditor.com/4.21.0/basic/ckeditor.js"></script>

    @vite(['resources/css/app.css', 'resources/js/evenementModification.js'])
</head>

<body class="flex flex-col items-center">
    <main class="w-[95vw]  max-w-7xl  p-5 bg-white shadow-2xl">
        <h1 class="text-center text-2xl w-72 p-5 border mx-auto">Modifier évènement "{{$evenement[0]['titre']}}"</h1>
        <form id="evenementForm" class="mx-5 " action="{{ route('evenements.update', ['evenement' => $evenement[0]['id']]) }}" method="POST" enctype="multipart/form-data" class="flex flex-col" onkeydown="return event.key != 'Enter'; ">
            @csrf
            @method('PUT')
            <!-- Partie Haute -->

            <div class="flex flex-row justify-between gap-6 w-full mt-14">
                <div class="w-9/12">
                    <h2>Titre</h2>
                    <input class="w-10/12" type="text" name="titre" placeholder="Titre de l'article" value="{{$evenement[0]['titre']}}">
                    <h2>Résumé</h2>
                    <textarea class="h-28 w-10/12" type="text" name="resume" placeholder="Contenu de l'article" id="editor1">{{$evenement[0]['resume']}}</textarea>
                    <h2>Contenu</h2>
                    <textarea class="h-36 w-full" type="text" name="contenu" placeholder="Contenu de l'article" id="editor2">{{$evenement[0]['contenu']}}</textarea>

                </div>
                <div class="w-3/12 h-full">
                    <h2>Mise en page</h2>
                    <div class="border-2 rounded-md p-3 flex flex-col items-center">
                        @foreach ($templates as $template)
                        <div class="flex justify-center items-center gap-4 mb-2 ">
                            <input type="radio" name="template" value="{{$template->id}}" @if($evenement[0]['template_id']==$template->id) checked @endif>
                            <img class="object-fill border-2 rounded-md w-40 h-40" src="{{asset($template['preview'])}}" alt="{{$template->id}}">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <!-- Partie basse -->
            <div class="flex gap-20 w-9/12 justify-evenly mt-8">
                <div class="flex flex-col w-72 ">
                    <div id="imageInputDiv" class="hidden flex flex-col items-center mb-5">
                        <span>Inserer une image</span>
                        <div class="bg-blue-500 w-48 h-10 flex justify-center items-center">
                            <label for="image">Upload</label>
                        </div>

                        <input type="file" id='image' name="image" accept="image/*" class="hidden">
                        <input type="text" name='imageDeleted' class="hidden" id='imageDeleted' value='0'>
                    </div>
                    <div class="flex flex-col w-72 gap-5 items-center">
                        @if (isset($image[0]['chemin']))

                        <button id="imageDelete" class="p-2 w-48 h-10 bg-red-500 rounded-md border-2 border-red-300 shadow">supprimer l'image</button>
                        <img id="imagePreview" src="{{  asset($image[0]['chemin']) }}" alt="image">
                        @else
                        <img id="imagePreview" alt="">
                        @endif
                    </div>


                </div>
                <div class="flex flex-col  w-72 gap-5 items-center">
                    <div id="videoInputDiv" class="hidden flex flex-col items-center mb-5">
                        <label for="urlVid">URL d'une vidéo</label>
                        <input type="text" id="urlVid" name="urlVid" @if (isset($video[0]['chemin'])) value="https://www.youtube.com/embed/{{ $video[0]['chemin'] }}" @endif>
                        <input type="text" name='videoDeleted' class="hidden" id='videoDeleted' value='0'>
                    </div>
                    @if (isset($video[0]['chemin']))
                    <button id="videoDelete" class="p-2 w-48 h-10 bg-red-500 rounded-md border-2 border-red-300 shadow">supprimer la vidéo</button>
                    <iframe id="vidPreview" width="250" height="150" src="https://www.youtube.com/embed/{{ $video[0]['chemin'] }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    @else
                    <iframe class="hidden" id="vidPreview" width="250" height="150" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    @endif
                </div>
            </div>


            <div class="flex gap-6 mt-5">
                <select name="etat" id="etat" class="w-72">
                    @foreach ($etats as $etat)
                    <option value="{{ $etat->id }}" @if ($evenement[0]['etat_id']==$etat->id) selected @endif>
                        {{ $etat->nom }}
                    </option>
                    @endforeach
                </select>
                <select name="visibilite" id="visibilite" class="w-72">
                    @foreach ($visibilites as $visibilite)
                    <option value="{{ $visibilite->id }}" @if ($evenement[0]['visibilite_id']==$visibilite->id) selected @endif>
                        {{ $visibilite->nom }}
                    </option>
                    @endforeach
                </select>
                <button class="p-2 w-48 h-10 bg-green-700 rounded-md border-2 border-green-300 shadow">Valider</button>
                <a href="{{ route('evenements.index') }}"><button class="p-2 w-48 h-10 bg-red-500 rounded-md border-2 border-red-300 shadow">annuler</button></a>
        </form>




        </div>


    </main>
</body>



</html>