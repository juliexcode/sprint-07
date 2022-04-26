@extends('layouts.app')

@section('content')
<div class="container-md">
    @if(session('status'))
    <h6 style="color: rgba(41, 226, 82, 1);">{{session('status')}}</h6>
    @endif
    <div id="cadre" class="container-md">
        <form action="{{Route('topics.update',$topic)}}" method="POST" enctype='multipart/form-data'>
            @csrf
            {{method_field('PUT')}}
            <div class="form-group">
                <label style="color:white;" class="form-label">Titre du film</label> <br> <input id="champs" class="form-control" type="text" name="titre" value="{{$topic->titre}}" required autocomplete="off">

                <br>
                <label style="color:white;" class="form-label">Date de sortie</label> <br> <input id="champs" class="form-control" type="text" name="date" value="{{$topic->date}}" required autocomplete="off">

                <br>
                <label style="color:white;" class="form-label">Réalisateur(s)</label> <br> <input id="champs" class="form-control " type="text" name="realisateur" value="{{$topic->realisateur}}" required autocomplete="off">

                <br>
                <label style="color:white;" class="form-label">Acteurs</label> <br> <input id="champs" class="form-control " type="text" name="acteur" value="{{$topic->acteur}}" required autocomplete="off">

                <br>
                <label style="color:white;" for="floatingSelect">Genre du film</label>
                <br>
                <select id="champs" class="form-select" name="genre" id="floatingSelect" required>
                    <option id="champs" selected>{{$topic->genre}}</option>
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
                <label style="color:white;" class="form-label">Synopsis</label> <br> <textarea id="champs" class="form-control" type="text" name="synopsis" required autocomplete="off">{{$topic->synopsis}}</textarea>

                <br>
                <label style="color:white;" class="form-label">Poster du film</label>
                <br>
                <input id="champs" class="form-control" type="file" id="formFile" name="poster" required accept="image/png, image/jpeg">
                <br>
                <img src="{{asset($topic->poster)}}" width="70px" height="70px">
                <br>


                <input id="btn" type="submit" value="Modifier" name="submit">
            </div>
        </form>



    </div>

</div>

<style>
    #cadre {
        background-color: rgba(39, 39, 39, 1);
        margin-left: 150px;
        height: 799px;
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
        color: white;
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
    }
</style>
@endsection