@extends('layouts.app')

@section('content')
<div class="container-md">

    @if(session('status'))
    <h6 style="color: rgba(41, 226, 82, 1);">{{session('status')}}</h6>
    @endif
    <div id="cadre" class="container-md">
        <form action="{{Route('topics.store')}}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="form-group">
                <label style="color:white;" class="form-label">Titre du film</label> <br> <input id="champs" class="form-control" type="text" name="titre" placeholder="Entrer le titre du film..." required autocomplete="off">

                <br>
                <label style="color:white;" class="form-label">Date de sortie</label> <br> <input id="champs" class="form-control" type="text" name="date" placeholder="ex: 25 mars 2021" required autocomplete="off">

                <br>
                <label style="color:white;" class="form-label">Réalisateur(s)</label> <br> <input id="champs" class="form-control " type="text" name="realisateur" placeholder="Entrer le/les réalisateur(s)..." required autocomplete="off">

                <br>
                <label style="color:white;" class="form-label">Acteurs</label> <br> <input id="champs" class="form-control " type="text" name="acteur" placeholder="Entrer les acteurs..." required autocomplete="off">

                <br>
                <label style="color:white;" for="floatingSelect">Genre du film</label>
                <br>
                <select id="champs" class="form-select" name="genre" id="floatingSelect" required>
                    <option selected>Choisir le genre...</option>
                    <option id="champs" value="Action">Action</option>
                    <option id="champs" value="Aventure">Aventure</option>
                    <option id="champs" value="Comédie">Comédie</option>
                    <option id="champs" value="Drame">Drame</option>
                    <option id="champs" value="Fantastique">Fantastique</option>
                    <option id="champs" value="Horreur">Horreur</option>
                    <option id="champs" value="Thriller">Thriller</option>
                    <option id="champs" value="Science-fiction">Science-fiction</option>
                </select>

                <br>
                <label style="color:white;" class="form-label">Synopsis</label> <br> <textarea id="champs" class="form-control" type="text" name="synopsis" placeholder="Enter the synopsis..." required autocomplete="off"></textarea>

                <br>
                <label style="color:white;" for="formFile" class="form-label">Affiche du film</label>
                <input id="champs" class="form-control" type="file" id="formFile" name="poster" required accept="image/png, image/jpeg">
                <br>


                <input id="btn" type="submit" value="Ajouter" name="submit">
            </div>
        </form>



    </div>

</div>

<style>
    #cadre {
        background-color: rgba(39, 39, 39, 1);
        margin-left: 150px;
        width: 900px;
        border: 4px solid rgba(44, 117, 255, 1);
        border-radius: 30px;
    }

    form {
        margin-top: 35px;
        width: 500px;
        margin-left: 100px;
    }

    #champs {
        border: 2px solid rgba(44, 117, 255, 1);
        border-radius: 10px;
        width: 650px;
        background-color: black;
        color: white;
    }

    #champs::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }



    #btn {
        margin-left: 535px;
        margin-top: 17px;
        border: 2px solid rgba(44, 117, 255, 1);
        border-radius: 5px;
        background-color: black;
        color: white;
        width: 113px;
        height: 35px;
        margin-bottom: 20px;
    }
</style>
@endsection