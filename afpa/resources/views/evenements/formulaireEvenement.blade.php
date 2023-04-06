<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    @vite(['resources/css/app.css', 'resources/js/evenementFormulaire.js'])
</head>

<body>
    <form id="evenementForm" class="px-5 " action="{{ route('evenements.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col" onkeydown="return event.key != 'Enter'; ">
        @csrf
        <!-- Partie Haute -->
        <div class="flex flex-row gap-10">
            <div>
                <h2>Titre</h2>
                <input type="text" name="titre" placeholder="Titre de l'article" required>
                <h2>Résumé (optionel)</h2>
                <textarea type="text" name="resume" id="editor1"></textarea>
                <h2>Contenu</h2>
                <textarea type="text" name="contenu" id="editor2" required></textarea>

            </div>
            <div>
                <h2>Mise en page</h2>
                @foreach ($templates as $template)
                <div class="flex">
                    <input type="radio" name="template" value="{{$template->id}}" @if ($template->id == 1) checked @endif>
                    <img src="{{$template->preview}}" alt="{{$template->id}}">
                </div>
                @endforeach
            </div>
        </div>


        <!-- Partie basse -->
        <div class="flex flex-col w-72">
            <div id="imageInputDiv" class="">
                <span>Inserer une image</span>
                <label for="image" class="bg-blue-500 ">Upload</label>
                <input type="file" id='image' name="image" accept="image/*" class="hidden">
                <input type="text" name='imageDeleted' class="hidden" id='imageDeleted' value='0'>
            </div>
            <div class="w-72 flex gap-10">             
                <img id="imagePreview" alt="">
            </div>


        </div>
        <div class="flex gap-10">
            <div id="videoInputDiv" class="">
                <label for="urlVid">URL d'une vidéo</label>
                <input type="text" id="urlVid" name="urlVid">
                <input type="text" name='videoDeleted' class="hidden" id='videoDeleted' value='0'>
            </div>
           
            <iframe id="vidPreview" width="250" height="150" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        
        </div>
        <div>
            <select name="etat" id="etat">
                @foreach ($etats as $etat)
                <option value="{{ $etat->id }}"  @if ($etat->id == 2) selected @endif>
                    {{ $etat->nom }}
                </option>
                @endforeach
            </select>
            <select name="visibilite" id="visibilite">
                @foreach ($visibilites as $visibilite)
                <option value="{{ $visibilite->id }}" @if ($visibilite->id == 3) selected @endif >
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