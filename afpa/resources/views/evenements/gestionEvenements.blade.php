<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="">
        <button>
            < </button>
                <span>Retour à l'index admin</span>
    </a>
    <h1>Gestion des évènements</h1>
    <div>


        <select name="cars" id="cars">
            <option value="all">Filtrer par état...</option>
            <option value="Public">Public</option>
            <option value="Prive">Privé</option>
            <option value="Confidentiel">Confidentiel</option>
        </select>

        <input type="text" placeholder="Rechercher">

        <span><button>+</button><span>Créer un article</span></span>

    </div>

    <div class="flex flex-row ">
        <table>
            <tr>
                <th>Etat</th>
                <th>Visibilité</th>
                <th>Date</th>
                <th>Titre</th>
            </tr>

            @foreach ($evenements as $evenement)

            <tr>
                <td>{{$evenement->etat->nom}}</td>
                <td>{{$evenement->visibilite->nom}}</td>
                <td>{{$evenement->created_at->format('D,M,Y')}}</td>
                <td>{{$evenement['titre']}}</td>
                <td>{{$evenement->id}}</td>

                <td> <a href="{{route ('evenements.edit', ['evenement' => $evenement->id]) }}"><button>modifier</button></a></td>
                <td>
                    <form class="px-5 " action="{{ route('evenements.destroy',$evenement->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button onclick="confirmDelete(event)">Supprimer</button>
                    </form>

                </td>
            </tr>

            @endforeach
        </table>

        <button>Nettoyer</button>
    </div>

    <br><br><br><br><br>

</body>

<script>
   function confirmDelete() {
  if (window.confirm("Confirmer la suppression")) {
 
  } else {
    event.preventDefault();
  }
}
</script>

</html>