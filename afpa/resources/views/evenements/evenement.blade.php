<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/evenements.js'])
</head>

<body>
    <a href="{{ route('evenements.indexUser') }}">index journal</a>
    <h1>{{$evenement[0]['titre']}}</h1>
    <span>{{$evenement[0]['created_at']}}</span>
    <div>
        <p>{{$evenement[0]['resume']}}</p>
        <div>
            @if (isset($image[0]['chemin']))
            <img id="imagePreview" src="{{  asset($image[0]['chemin']) }}" alt="image">
   
            @else
            <img id="imagePreview" src="{{  asset('storage/imagesEvenement/logo-afpa.jpg') }}" alt="sdfsdfsd">
            @endif
        </div>
        <p>{{$evenement[0]['contenu']}}</p>
        <div>
            @if (isset($video[0]['chemin']))
            <iframe id="vidPreview" width="250" height="150" src="https://www.youtube.com/embed/{{ $video[0]['chemin'] }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

            @endif
        </div>
    </div>
</body>

</html>