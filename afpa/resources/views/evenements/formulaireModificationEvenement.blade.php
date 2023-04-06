<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    @vite(['resources/css/app.css', 'resources/js/evenementModification.js'])
</head>

<body>
    <form id="evenementForm" class="px-5 " action="{{ route('evenements.update', ['evenement' => $evenement[0]['id']]) }}" method="POST" enctype="multipart/form-data" class="flex flex-col" onkeydown="return event.key != 'Enter'; ">
        @csrf
        @method('PUT')
        <!-- Partie Haute -->
        <div class="flex flex-row gap-10">
            <div>
                <h2>Titre</h2>
                <input type="text" name="titre" placeholder="Titre de l'article" value="{{$evenement[0]['titre']}}">
                <h2>Résumé</h2>
                <textarea type="text" name="resume" placeholder="Contenu de l'article" id="editor1">{{$evenement[0]['resume']}}</textarea>
                <h2>Contenu</h2>
                <textarea type="text" name="contenu" placeholder="Contenu de l'article" id="editor2">{{$evenement[0]['contenu']}}</textarea>

            </div>
            <div>
                <h2>Mise en page</h2>
                @foreach ($templates as $template)
                <div class="flex">
                    <input type="radio" name="template" value="{{$template->id}}" @if($evenement[0]['template_id']==$template->id) checked @endif>
                    <img src="{{$template->preview}}" alt="{{$template->id}}">
                </div>
                @endforeach
            </div>
        </div>


        <!-- Partie basse -->
        <div class="flex flex-col w-72">
            <div id="imageInputDiv" class="hidden">
                <span>Inserer une image</span>
                <label for="image" class="bg-blue-500 ">Upload</label>
                <input type="file" id='image' name="image" accept="image/*" class="hidden">
                <input type="text" name='imageDeleted' class="hidden" id='imageDeleted' value='0'>
            </div>
            <div class="w-72 flex gap-10">
                @if (isset($image[0]['chemin']))
                <img id="imagePreview" src="{{  asset($image[0]['chemin']) }}" alt="image">
                <button id="imageDelete" onclick="revealImageInput(event)">supprimer</button>
                @else
                <img id="imagePreview" alt="">
                @endif
            </div>


        </div>
        <div class="flex gap-10">
            <div id="videoInputDiv" class="hidden">
                <label for="urlVid">URL d'une vidéo</label>
                <input type="text" id="urlVid" name="urlVid" @if (isset($video[0]['chemin'])) value="https://www.youtube.com/embed/{{ $video[0]['chemin'] }}" @endif>
                <input type="text" name='videoDeleted' class="hidden" id='videoDeleted' value='0'>
            </div>
            @if (isset($video[0]['chemin']))
            <iframe id="vidPreview" width="250" height="150" src="https://www.youtube.com/embed/{{ $video[0]['chemin'] }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <button id="videoDelete" onclick="revealVideoInput(event)">supprimer</button>
            @else
            <iframe id="vidPreview" width="250" height="150" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            @endif
        </div>
        <div>
            <select name="etat" id="etat">
                @foreach ($etats as $etat)
                <option value="{{ $etat->id }}" @if ($evenement[0]['etat_id']==$etat->id) selected @endif>
                    {{ $etat->nom }}
                </option>
                @endforeach
            </select>
            <select name="visibilite" id="visibilite">
                @foreach ($visibilites as $visibilite)
                <option value="{{ $visibilite->id }}" @if ($evenement[0]['visibilite_id']==$visibilite->id) selected @endif>
                    {{ $visibilite->nom }}
                </option>
                @endforeach
            </select>
            <button>Valider</button>
    </form>

    <button>
        <a href="{{ route('evenements.index') }}">annuler</a>
    </button>

    </div>

   

</body>



</html>