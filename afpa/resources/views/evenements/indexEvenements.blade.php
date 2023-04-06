<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/evenementIndexUser.js'])
</head>

<body>
    <a href="{{route('home')}}">Retour sur le menu</a>

    <h1>Le journal du centre</h1>

    <input type="text" placeholder="rechercher..." id="rechercher" >
    <div>
        @foreach ($evenements as $evenement)
        <a href="{{ route('evenements.show', ['evenement' => $evenement['id']]) }}">
            <article class="flex mt-10 w-10/12 gap-10">
                <div class="w-28">
                    @php
                    $imageExist = false;
                    @endphp

                    @foreach ($images as $image)
                    @if ($evenement['id'] == $image['evenement_id'])
                    <img id="imagePreview" src="{{  asset($image['chemin']) }}" alt="image">
                    @php
                    $imageExist=true;
                    @endphp

                    @endif

                    @endforeach

                    @if ($imageExist == false)
                    <img id="imagePreview" src="{{  asset('storage/imagesEvenement/logo-afpa.jpg') }}" alt="sdfsdfsd">
                    @endif


                </div>
                <div class="text-ellipsis">
                    <h1>{{$evenement['titre']}}</h1>
                    @if ($evenement['resume'] !== null)
                    <p>{{$evenement['resume']}}</p>
                    @else
                    <p>{{$evenement['contenu']}}</p>
                    @endif
                </div>
            </article>
        </a>
        @endforeach
    </div>

    {{ $evenements->links() }}
</body>



</html>